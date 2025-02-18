<?php
use App\Http\Controllers\WeatherController;
    $weatherData = WeatherController::getWeather();
?>
<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Dog Kennel</h1>

    <div>
        <button>
            <a href="{{route('menu.owner')}}">
                Owner menu
            </a>
        </button>

        <button>
            <a href="{{route('menu.dog')}}">
                Dog menu
            </a>
        </button>
    </div>

    <div>
        <button>
            <a href="{{route('menu.kennel')}}">
                Kennel menu
            </a>
        </button>

        <button>
            <a href="{{route('menu.booking')}}">
                Booking menu
            </a>
        </button>
    </div>


    <div>
        <button>
            <a href="{{route('weather')}}">
                View Weather
            </a>
        </button>
    </div>

    <div>
        <h1>I can show the weather</h1>
    </div>
    <div>
        <div>
            <p>Main weather: {{$weatherData['weather'][0]['main']}}</p>
            <p>Description: {{$weatherData['weather'][0]['description']}}</p>
            <p>Cloud coverage: {{$weatherData['clouds']['all']}}%</p>
        </div>

        <div>
            <p>Temperature: {{$weatherData['main']['temp']}}</p>
            <p>High of: {{$weatherData['main']['temp_max']}}</p>
            <p>Low of: {{$weatherData['main']['temp_min']}}</p>
            <p>Feels like: {{$weatherData['main']['feels_like']}}</p>
        </div>
    </div>
</div>
