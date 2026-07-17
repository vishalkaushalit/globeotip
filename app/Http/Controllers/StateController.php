<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StateController extends Controller
{
    public function index(): View { return view('service-areas.states.index', ['items' => State::withCount('cities')->latest()->paginate(15)]); }
    public function create(): View { return view('service-areas.states.form', ['item' => new State]); }
    public function store(Request $request): RedirectResponse { State::create($this->validateData($request)); return to_route('states.index')->with('success', 'State added successfully.'); }
    public function edit(State $state): View { return view('service-areas.states.form', ['item' => $state]); }
    public function update(Request $request, State $state): RedirectResponse { $state->update($this->validateData($request, $state)); return to_route('states.index')->with('success', 'State updated successfully.'); }
    public function destroy(State $state): RedirectResponse { $state->delete(); return to_route('states.index')->with('success', 'State deleted successfully.'); }
    private function validateData(Request $request, ?State $state = null): array { return $request->validate(['name' => ['required','string','max:255'], 'slug' => ['required','alpha_dash','max:255', Rule::unique('states')->ignore($state)]]); }
}
