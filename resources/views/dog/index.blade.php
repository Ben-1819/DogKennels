<x-navbar>
</x-navbar>

<div>
    <h1 class="title">All Dogs</h1>

    <div>
        <table class="index-table-large">
            <thead>
                <tr>
                    <th>Dog ID</th>
                    <th>Owner ID</th>
                    <th>Dog Name</th>
                    <th>Dog Breed</th>
                    <th>Dog Size</th>
                    <th>Dog Age</th>
                    <th>Dog Training</th>
                    <th>Dog Temperment</th>
                    <th>Extra Info</th>
                    <th>Times fed per day</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @if(count($all_dogs) > 0)
                    @foreach($all_dogs as $dog)
                        <tr>
                            <td>{{$dog->id}}</td>
                            <td>{{$dog->owner_id}}</td>
                            <td>{{$dog->name}}</td>
                            <td>{{$dog->breed}}</td>
                            <td>{{$dog->size}}</td>
                            <td>{{$dog->age}}</td>
                            <td>{{$dog->training_level}}</td>
                            <td>{{$dog->temperment}}</td>
                            <td>{{$dog->extra_info}}</td>
                            <td>{{$dog->feed_per_day}}</td>
                            <td>
                                <button>
                                    <a href="{{route('dog.show', $dog->id)}}">
                                        View
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No Dogs yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div>
        <label>Filter dogs by training level</label>
        <form action="{{route('filter.dog')}}" method="get">
            @csrf
            <select name="training_level" onchange="this.form.submit()">
                <option value="Low">Low</option>
                <option value="Average">Average</option>
                <option value="Well Trained">Well Trained</option>
                <option value="Extremely Well Trained">Extremely Well Trained</option>
            </select>
        </form>
    </div>
</div>
