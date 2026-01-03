<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function overview(): View
    {
        return view('overview');
    }

    public function tickets(): View
    {
        return view('tickets');
    }

    public function event(): View
    {
        return view('event');
    }

    public function social(): View
    {
        return view('social');
    }

    public function map(): View
    {
        return view('map');
    }

     public function exhibitors(): View
    {
        return view('exhibitors');
    }

    public function merchandise(): View
    {
        return view('merchandise');
    }

    public function news(): View
    {
        return view('news');
    }

    public function business(): View
    {
        return view('business');
    }

     public function login(): View
    {
        return view('login');
    }

    public function register(): View
    {
        return view('register');
    }

    public function admin(): View
    {
        if (auth()->check()) {
        return redirect()->route('admin.dashboard');

        }
         // Jika belum login, redirect ke login page
        return redirect()->route('login');
    }
}
