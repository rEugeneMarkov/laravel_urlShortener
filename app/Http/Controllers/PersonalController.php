<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PersonalController extends Controller
{
    public function index(): View
    {
        return view('personal.main.index');
    }

    public function profile(): View
    {
        $user = auth()->user();

        return view('personal.main.profile', compact('user'));
    }
}
