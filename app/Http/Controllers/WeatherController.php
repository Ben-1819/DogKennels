<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weatherForecast(){
        $apiKey = config('weather.key');

        $client = new Client();

        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=Lisburn&units=metric&appid={$apiKey}";

        $response = $client->get($apiUrl);

        $data = json_decode($response->getBody(), true);

        return view('weather', ['weatherData' => $data]);
    }
}
