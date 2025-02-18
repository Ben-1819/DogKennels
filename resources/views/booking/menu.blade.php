<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Booking menu</h1>

    <div>
        <button>
            <a href="{{route('booking.create')}}">
                Create new booking
            </a>
        </button>
    </div>

    <div>
        <button>
            <a href="{{route('booking.index')}}">
                View all bookings
            </a>
        </button>
    </div>
</div>
