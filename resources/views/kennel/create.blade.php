<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Add new kennel</h1>

    <form action="{{route('kennel.store')}}" method="post">
        @csrf
        <div>
            <label>Kennel Size:</label>
            <select name="kennel_size">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
        </div>

        <div>
            <label>Kennel type:</label>
            <select name="kennel_type">
                <option value="Regular">Regular</option>
                <option value="High Quality">High Quality</option>
                <option value="Luxury">Luxury</option>
            </select>
        </div>

        <div>
            <button>
                Add new kennel
            </button>
        </div>
    </form>
</div>
