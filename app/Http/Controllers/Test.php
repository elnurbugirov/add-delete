<?php

namespace App\Http\Controllers;

use App\Models\PickVisa;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use function Illuminate\Events\queueable;

class Test extends Controller
{
    public function index() {
        $data = PickVisa::all();
        return view('welcome', ['data'=>$data]);
    }
    public function dataCountry($slug){

        $cache_data = Cache::get('countries');

        if(!$cache_data) $cache_data = [];

        if(!array_key_exists($slug,$cache_data)) {
            $country = $this->countryStoreCache($slug,$cache_data);
        }
        return view('country', ['data'=>$cache_data[$slug]['diplomatic_missions']]);

    }

    public function countryStoreCache($slug,$countries)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://diplomatic-missions.pickvisa.com/api/v1/diplomatic-missions/host-country/'.$slug, [
            'headers' => [
                'Authorization' => 'd8488959-756f-401e-b97c-364cd770db92'
            ]
        ]);
        $getData = json_decode($response->getBody(),true);
        $countries[$slug] = $getData;
        Cache::put('countries',$countries);

        return $getData;
    }
}
