<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Profile of dog: {{$dog->name}}</h1>

    <div>
        <table class="index-table">
            <thead>
                <tr>
                    <th>Dog ID</th>
                    <th>Owner Name</th>
                    <th>Dog Name</th>
                    <th>Dog Breed</th>
                    <th>Dog Size</th>
                    <th>Dog Age</th>
                    <th>Dog Training</th>
                    <th>Dog Temperment</th>
                    <th>Extra Info</th>
                    <th>Times fed per day</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$dog->id}}</td>
                    <td>{{$owner->name}}</td>
                    <td>{{$dog->name}}</td>
                    <td>{{$dog->breed}}</td>
                    <td>{{$dog->size}}</td>
                    <td>{{$dog->age}}</td>
                    <td>{{$dog->training_level}}</td>
                    <td>{{$dog->temperment}}</td>
                    <td>{{$dog->extra_info}}</td>
                    <td>{{$dog->feed_per_day}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{route('dog.edit', $dog->id)}}" method="get">
            @csrf
            <button>
                Edit Dog
            </button>
        </form>
    </div>

    <div>
        <form action="{{route('dog.destroy', $dog->id)}}" method="post">
            @csrf
            @method('delete')
            <button>
                DELETE
            </button>
        </form>
    </div>
</div>
