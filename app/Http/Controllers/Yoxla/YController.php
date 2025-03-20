<?php

namespace App\Http\Controllers\Yoxla;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YController extends Controller
{
    public function sendFunction(){
        return view('contact');
    }
}
