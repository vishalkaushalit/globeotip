<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\State;
use Illuminate\Contracts\View\View;

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

    public function state(State $state): View
    {
        return view('website.state', ['state' => $state, 'cities' => $state->cities()->orderBy('name')->paginate(6)]);
    }

    public function city(State $state, City $city): View
    {
        $city->setRelation('state', $state);
        return view('website.city', ['city' => $city, 'neighbourhoods' => $city->neighbourhoods()->where('status', true)->orderBy('name')->paginate(6)]);
    }

    public function detail(State $state, City $city, Neighbourhood $neighbourhood): View
    {
        $neighbourhood->setRelation('state', $state)->setRelation('city', $city);
        return view('website.detail', ['area' => $neighbourhood, 'state' => $state->name, 'city' => $city->name, 'neighborhood' => $neighbourhood->name]);
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
