<x-navbar>
</x-navbar>

<div>
    <form action="{{route('owner.store')}}" method="post">
        @csrf

        <div>
            <label>Enter the owners name:</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Enter the owners email:</label>
            <input type="text" name="email">
        </div>

        <div>
            <button type="submit">
                Add new owner
            </button>
        </div>
    </form>
</div>
