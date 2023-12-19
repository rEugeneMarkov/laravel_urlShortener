<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function change(Request $request)
    {
        $locale = $request->locale;
        session(['locale' => $locale]);

        return redirect()->back();
    }
}
