<x-navbar>
</x-navbar>

<div>
    <h1>Dogs with training level of {{$trainingLevel}}</h1>
    <p>Filter by training level:</p>
    <form>
        <select name="training_level" onchange="this.form.submit()">
            <option value="Low">Low</option>
            <option value="Average">Average</option>
            <option value="Well Trained">Well Trained</option>
            <option value="Extremely Well Trained">Extremely Well Trained</option>
        </select>
    </form>


    <table class="index-table">
        <thead>
            <tr>
                <th>Dog ID</th>
                <th>Dog Name</th>
                <th>Dog Owner</th>
                <th>Dog Age</th>
                <th>Dog Temperment</th>
                <th>View Dog</th>
            </tr>
        </thead>
        <tbody>
            @if(count($filteredDogs) > 0)
                @foreach($filteredDogs as $dog)
                    <tr>
                        <td>{{$dog->id}}</td>
                        <td>{{$dog->name}}</td>
                        <td>{{$dog->owner->id}}</td>
                        <td>{{$dog->age}}</td>
                        <td>{{$dog->temperment}}</td>
                        <td>
                            <form action="{{route('dog.show', $dog->id)}}" method="get">
                                @csrf
                                <button>
                                    Show
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No dogs with a training level of: {{$trainingLevel}}</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
