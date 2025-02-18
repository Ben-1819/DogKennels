<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Booking: {{$booking->id}}</h1>

    <div>
        <table class="index-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Owners name</th>
                    <th>Dogs name</th>
                    <th>Kennel number</th>
                    <th>Booking start</th>
                    <th>Booking end</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$owner->name}}</td>
                    <td>{{$dog->name}}</td>
                    <td>{{$kennel->id}}</td>
                    <td>{{$booking->booking_start}}</td>
                    <td>{{$booking->booking_end}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{route('owner.show', $owner->id)}}" method="get">
            @csrf
            <button>
                Show Owner Details
            </button>
        </form>

        <form action="{{route('dog.show', $dog->id)}}" method="get">
            @csrf
            <button>
                Show Dog Details
            </button>
        </form>

        <form action="{{route('kennel.show', $kennel->id)}}" method="get">
            @csrf
            <button>
                Show Kennel Details
            </button>
        </form>
    </div>

    <div>
        <form action="{{route('booking.edit', $booking->id)}}" method="get">
            @csrf
            <button>
                Edit Booking
            </button>
        </form>

        <form action="{{route('booking.destroy', $booking->id)}}" method="post">
            @csrf
            @method('delete')
            <button>
                DELETE
            </button>
        </form>
    </div>
</div>
