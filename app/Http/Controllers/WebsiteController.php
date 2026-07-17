<?php

namespace App\Http\Controllers;

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

    public function state(): View
    {
        return view('website.state');
    }

    public function city(): View
    {
        return view('website.city');
    }

    public function neighborhood(): View
    {
        return view('website.neighborhood');
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
        return view('website.serviceArea');
    }
}
