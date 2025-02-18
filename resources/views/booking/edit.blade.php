<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Editing booking: {{$booking->id}}</h1>

    <div>
        <h1>Current Booking Information</h1>

        <table class="index-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Dog on booking</th>
                    <th>Dogs Owner</th>
                    <th>Kennel on booking</th>
                    <th>Booking Start</th>
                    <th>Booking End</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$dogname->name}}</td>
                    <td>{{$ownername->name}}</td>
                    <td>{{$booking->kennel_id}}</td>
                    <td>{{$booking->booking_start}}</td>
                    <td>{{$booking->booking_end}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{route('booking.update', $booking)}}" method="post">
            @csrf
            @method('put')

            <div>
                <label>Dog on booking:</label>
                <select name="dog_id" value={{$booking->dog_id}}>
                    @foreach($dog)
                        <option value={{$dog->id}}>{{$dog->name}}</option>
                    @endforeach
                </select>

                <label>Kennel on booking:</label>
                <select name="kennel_id" value={{$booking->kennel_id}}>
                    @foreach($kennel)
                        <option value={{$kennel->id}}>{{$kennel->id}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Booking start date:</label>
                <input type="date" name="booking_start" value={{$booking->booking_start}}>

                <label>Booking end date:</label>
                <input type="date" name="booking_end" value={{$booking->booking_end}}>
            </div>

            <div>
                <button>
                    Update booking
                </button>
            </div>
        </form>
    </div>
</div>
