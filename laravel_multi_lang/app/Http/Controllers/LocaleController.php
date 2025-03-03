<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
        public function setLocale($language)
        {
          if(in_array($language,['en','fr'])){
            App::setLocale($language);
            Session::put('locale', $language);

          }
          return redirect()->back();
        }
}
