<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Kennel number: {{$kennel->id}}</h1>

    <div>
        <table class="index-table">
            <thead>
                <tr>
                    <th>Kennel Number</th>
                    <th>Kennel Size</th>
                    <th>Kennel Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$kennel->id}}</td>
                    <td>{{$kennel->kennel_size}}</td>
                    <td>{{$kennel->kennel_type}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{route('kennel.edit', $kennel->id)}}" method="get">
            @csrf
            <button>
                Edit kennel
            </button>
        </form>
    </div>

    <div>
        <form action="{{route('kennel.destroy', $kennel->id)}}" method="post">
            @csrf
            <button>
                DELETE
            </button>
        </form>
    </div>
</div>
