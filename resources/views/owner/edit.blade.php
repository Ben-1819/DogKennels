<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Edit owner: {{$owner->name}}</h1>

    <div>
        <p>Owners current information:</p>
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
    </div>

    <div>
        <p>Enter new owner information here:</p>
    </div>

    <form action="{{route('owner.update', $owner)}}" method="post">
        @csrf
        @method('put')
        <div>
            <label>Owner name:</label>
            <input type="text" name="name" value={{$owner->name}}>
        </div>

        <div>
            <label>Owner email:</label>
            <input type="text" name="email" value={{$owner->email}}>
        </div>
    </form>
</div>
