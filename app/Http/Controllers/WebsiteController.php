<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    
    public function index(): View
    {
        return view('website.index');
    }

    public function about(): View
    {
        return view('website.about');
    }

    public function state(Request $request): View
    {
        $state = State::where('slug', $request->string('slug'))
            ->orWhere('name', $request->string('name'))->firstOrFail();
        return view('website.state', ['state' => $state, 'cities' => $state->cities()->orderBy('name')->paginate(6)]);
    }

    public function city(Request $request): View
    {
        $city = City::with('state')->where('slug', $request->string('slug'))
            ->orWhere('name', $request->string('name'))->firstOrFail();
        return view('website.city', ['city' => $city, 'neighbourhoods' => $city->neighbourhoods()->where('status', true)->orderBy('name')->paginate(6)]);
    }

    public function detail(Request $request): View
    {
        $area = Neighbourhood::with('state','city')->where('slug', $request->string('slug'))
            ->orWhere('name', $request->string('neighborhood'))->firstOrFail();
        return view('website.detail', ['area' => $area, 'state' => $area->state->name, 'city' => $area->city->name, 'neighborhood' => $area->name]);
    }

    public function contact(): View
    {
        return view('website.contact');
    }

    public function deals(): View
    {
        return view('website.deals');
    }

    public function packages(): View
    {
        return view('website.packages');
    }

    public function privacy(): View
    {
        return view('website.privacy');
    }

    public function serviceArea(): View
    {
        return view('website.serviceArea', ['states' => State::orderBy('name')->paginate(6)]);
    }
}
