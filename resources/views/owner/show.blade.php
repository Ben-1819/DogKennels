<x-navbar>
</x-navbar>

<div>
    <div>
        <h1 class="title">Profile of owner: {{$owner->name}}</h1>
    </div>

    <table class="index-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$owner->id}}</td>
                <td>{{$owner->name}}</td>
                <td>{{$owner->email}}</td>
            </tr>
        </tbody>
    </table>

    <div>
        <form action="{{route('owner.edit', $owner->id)}}" method="get">
            @csrf
            <button>
                Edit
            </button>
        </form>
    </div>

    <div>
        <form action="{{route('owner.destroy', $owner->id)}}" method="post">
            @csrf
            @method('delete')
            <button>
                DELETE
            </button>
        </form>
    </div>
</div>
