<?php
use Carbon\Carbon;
$date = Carbon::now();
?>

<x-navbar>
    <div>
        <p>{{$date}}</p>
    </div>
</x-navbar>


<div>

    <h1 class="title">Dogs in kennels today</h1>

    <table class="index-table">
        <thead>
            <tr>
                <th>Dog Name</th>
                <th>Kennel Number</th>
            </tr>
        </thead>
        <tbody>
            @if(count($dogs_on_booking) > 0)
                <?php
                   $k = 0;
                ?>
                @foreach($dogs_on_booking as $dog)
                    <tr>

                        <td>{{$dog}}</td>
                        <td>{{$kennels_on_booking[$k]}}</td>
                    </tr>
                    <?php
                        $k += 1;
                    ?>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No Dogs booked in today</td>
                </tr>
            @endif
        </tbody>
    </table>

</div>
