<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Create new booking</h1>

    <form action="{{route('booking.store')}}" method="post">
        @csrf
        <div>
            <label>Dog to book into kennels:</label>
            <select name="dog_id">
                @foreach($all_dogs as $dog)
                    <option value={{$dog->id}}>{{$dog->name}}</option>
                @endforeach
            </select>

            <label>Kennel to book dog into:</label>
            <select name="kennel_id">
                @foreach($all_kennels as $kennel)
                    <option value={{$kennel->id}}>{{$kennel->id}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Booking start date:</label>
            <input type="date" name="booking_start">

            <label>Booking end date</label>
            <input type="date" name="booking_end">
        </div>

        <div>
            <button>
                Create new booking
            </button>
        </div>
    </form>

</div>
