<x-navbar>
</x-navbar>

<div>
    <h1 class="title">All Kennels</h1>

    <table class="index-table">
        <thead>
            <tr>
                <th>Kennel Number</th>
                <th>Kennel Size</th>
                <th>Kennel Type</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @if(count($all_kennels) > 0)
                @foreach($all_kennels as $kennel)
                    <tr>
                        <td>{{$kennel->id}}</td>
                        <td>{{$kennel->kennel_size}}</td>
                        <td>{{$kennel->kennel_type}}</td>
                        <td>
                            <button>
                                <a href="{{route('kennel.show', $kennel->id)}}">
                                    View
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No Kennels</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
