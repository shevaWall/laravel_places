<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Street;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(){
        $country = Country::first();
        dump(Street::first());
        dump($country->streets);
    }
}
