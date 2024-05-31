<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{
    public function langSwitch($lang)
    {
        if (in_array($lang, config('app.available_locales'))) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }

}
