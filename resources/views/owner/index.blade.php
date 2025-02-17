<x-navbar>
</x-navbar>

<div>
    <div>
        <h1 class="title">All Owners</h1>
    </div>

    <table class="index-table">
        <thead>
            <tr>
                <th>Owner ID</th>
                <th>Owner Name</th>
                <th>Owner Email</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @if(count($all_owners) > 0)
                @foreach($all_owners as $owner)
                    <tr>
                        <td>{{$owner->id}}</td>
                        <td>{{$owner->name}}</td>
                        <td>{{$owner->email}}</td>
                        <td>
                            <button>
                                <a href="{{route('owner.show', $owner->id)}}">
                                    View
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No Owners Registered Yet</td>
                </tr>
        </tbody>
    </table>
</div>
