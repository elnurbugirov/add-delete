<?php

namespace App\Http\Controllers;

use App\Models\PickVisa;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Test extends Controller
{
    public function index() {
        $data = PickVisa::all();
        return view('welcome', ['data'=>$data]);
    }
}
