<?php
use Carbon\Carbon;
    $date = Carbon::now()
?>

<x-navbar>
    <label>{{$date}}</label>
</x-navbar>


<div>
    <h1 class="title">Weather for: {{$date}}</h1>

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

