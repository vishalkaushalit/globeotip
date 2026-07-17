<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NeighbourhoodController extends Controller
{
    public function index(): View { return view('service-areas.neighbourhoods.index', ['items' => Neighbourhood::with('state','city')->latest()->paginate(15)]); }
    public function create(): View { return $this->form(new Neighbourhood); }
    public function store(Request $request): RedirectResponse { $data = $this->validateData($request); $this->storeImages($request, $data); Neighbourhood::create($data); return to_route('neighbourhoods.index')->with('success', 'Neighbourhood added successfully.'); }
    public function edit(Neighbourhood $neighbourhood): View { return $this->form($neighbourhood); }
    public function update(Request $request, Neighbourhood $neighbourhood): RedirectResponse { $data = $this->validateData($request, $neighbourhood); $this->storeImages($request, $data, $neighbourhood); $neighbourhood->update($data); return to_route('neighbourhoods.index')->with('success', 'Neighbourhood updated successfully.'); }
    public function destroy(Neighbourhood $neighbourhood): RedirectResponse { foreach ($this->imageFields() as $field) $this->deleteStoredImage($neighbourhood->$field); $neighbourhood->delete(); return to_route('neighbourhoods.index')->with('success', 'Neighbourhood deleted successfully.'); }
    public function destroyImage(Neighbourhood $neighbourhood, string $field): \Illuminate\Http\JsonResponse
    {
        abort_unless(in_array($field, $this->imageFields(), true), 404);
        $this->deleteStoredImage($neighbourhood->$field);
        $neighbourhood->update([$field => null]);
        return response()->json(['message' => 'Image deleted successfully.']);
    }
    private function form(Neighbourhood $item): View { return view('service-areas.neighbourhoods.form', ['item' => $item, 'states' => State::orderBy('name')->get(), 'cities' => City::orderBy('name')->get()]); }
    private function validateData(Request $request, ?Neighbourhood $item = null): array
    {
        $data = $request->validate([
            'state_id' => ['required','exists:states,id'], 'city_id' => ['required', Rule::exists('cities','id')->where(fn($q) => $q->where('state_id',$request->integer('state_id')))],
            'name' => ['required','string','max:255'], 'slug' => ['required','alpha_dash','max:255', Rule::unique('neighbourhoods')->where(fn($q) => $q->where('city_id',$request->integer('city_id')))->ignore($item)],
            'summary' => ['nullable','string','max:255'], 'banner_image' => ['nullable','image','max:4096'], 'main_image' => ['nullable','image','max:4096'], 'side_image_one' => ['nullable','image','max:4096'], 'side_image_two' => ['nullable','image','max:4096'],
            'days' => ['required','integer','min:1','max:365'], 'nights' => ['required','integer','min:0','max:365'], 'price' => ['required','numeric','min:0'], 'description' => ['nullable','string'], 'overview' => ['nullable','string'],
            'tour_plan' => ['nullable','array'], 'tour_plan.*.title' => ['nullable','string','max:255'], 'tour_plan.*.description' => ['nullable','string','max:5000'],
            'highlights' => ['nullable','array'], 'highlights.*' => ['nullable','string','max:500'],
            'inclusions' => ['nullable','array'], 'inclusions.*' => ['nullable','string','max:500'],
            'exclusions' => ['nullable','array'], 'exclusions.*' => ['nullable','string','max:500'], 'status' => ['required','boolean'],
        ]);
        $data['tour_plan'] = array_values(array_filter($data['tour_plan'] ?? [], fn (array $row) => filled($row['title'] ?? null) || filled($row['description'] ?? null)));
        foreach (['highlights','inclusions','exclusions'] as $field) {
            $data[$field] = array_values(array_filter(array_map('trim', $data[$field] ?? [])));
        }
        $data['status'] = $request->boolean('status');
        return $data;
    }

    private function storeImages(Request $request, array &$data, ?Neighbourhood $item = null): void
    {
        foreach ($this->imageFields() as $field) {
            unset($data[$field]);
            if ($request->hasFile($field)) {
                $this->deleteStoredImage($item?->$field);
                $data[$field] = $request->file($field)->store('neighbourhoods', 'public');
            }
        }
    }

    private function deleteStoredImage(?string $path): void
    {
        if ($path && ! str_starts_with($path, 'http://') && ! str_starts_with($path, 'https://')) Storage::disk('public')->delete($path);
    }

    private function imageFields(): array { return ['banner_image','main_image','side_image_one','side_image_two']; }
}
