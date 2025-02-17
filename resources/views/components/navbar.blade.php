@vite(['resources/css/app.css', 'resources/js/app/js'])
<div class="topnav">
    <a href="{{route('welcome')}}">Home</a>
    {{$slot}}
</div>
