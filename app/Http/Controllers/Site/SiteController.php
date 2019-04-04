<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagseguro_Model;

class SiteController extends Controller
{

    public function index(){

        return view('store.checkout');

    }

}
