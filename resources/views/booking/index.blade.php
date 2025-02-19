<?php
    use App\Models\Dog;
    use App\Models\Owner;
?>
<x-navbar>
</x-navbar>

<div>
    <h1 class="title">All Bookings</h1>

    <div>
        <table class="index-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Owner ID</th>
                    <th>Dog ID</th>
                    <th>Kennel Number</th>
                    <th>Booking start</th>
                    <th>Booking end</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @if(count($all_bookings) > 0)
                    @foreach($all_bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <?php
                                $owner = Owner::find($booking->owner_id);
                            ?>
                            <td>{{$owner->name}}</td>
                            <?php
                                $dog = Dog::find($booking->dog_id);
                            ?>
                            <td>{{$dog->name}}</td>
                            <td>{{$booking->kennel_id}}</td>
                            <td>{{$booking->booking_start}}</td>
                            <td>{{$booking->booking_end}}</td>
                            <td>
                                <form action="{{route('booking.show', $booking->id)}}" method="get">
                                    @csrf
                                    <button>
                                        View
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No Bookings made</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
