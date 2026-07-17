<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View { return view('service-areas.cities.index', ['items' => City::with('state')->withCount('neighbourhoods')->latest()->paginate(15)]); }
    public function create(): View { return view('service-areas.cities.form', ['item' => new City, 'states' => State::orderBy('name')->get()]); }
    public function store(Request $request): RedirectResponse { City::create($this->validateData($request)); return to_route('cities.index')->with('success', 'City added successfully.'); }
    public function edit(City $city): View { return view('service-areas.cities.form', ['item' => $city, 'states' => State::orderBy('name')->get()]); }
    public function update(Request $request, City $city): RedirectResponse { $city->update($this->validateData($request, $city)); return to_route('cities.index')->with('success', 'City updated successfully.'); }
    public function destroy(City $city): RedirectResponse { $city->delete(); return to_route('cities.index')->with('success', 'City deleted successfully.'); }
    private function validateData(Request $request, ?City $city = null): array { return $request->validate(['state_id' => ['required','exists:states,id'], 'name' => ['required','string','max:255'], 'slug' => ['required','alpha_dash','max:255', Rule::unique('cities')->where(fn($q) => $q->where('state_id', $request->integer('state_id')))->ignore($city)]]); }
}
