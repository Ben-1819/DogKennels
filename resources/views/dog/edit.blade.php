<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Edit dog: {{$dog->name}}</h1>

    <div>
        <table class="index-table">
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
                </tr>
            </thead>
            <tbody>
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
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <form action="{{route('dog.update', $dog)}}" method="post">
            @csrf
            @method('put')


            <div>
                <label>Dogs owner:</label>
                <select name="owner_id" value={{$dog->owner_id}}>
                    @foreach($owner as $item)
                        <option value={{$item->id}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label>Dogs name:</label>
                <input type="text" name="name" value={{$dog->name}}>
                <label>Dogs breed:</label>
                <input type="text" name="breed" value={{$dog->breed}}>
            </div>

            <div>
                <label>Dogs size:</label>
                <select name="size" value={{$dog->size}}>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
                <label>Dogs age:</label>
                <input type="int" name="age" value={{$dog->age}}>
            </div>


            <div>
                <label>Dogs training level:</label>
                <select name="training_level" value={{$dog->training_level}}>
                    <option value="Low">Low</option>
                    <option value="Average">Average</option>
                    <option value="Well Trained">Well Trained</option>
                    <option value="Extremely Well Trained">Extremely Well Trained</option>
                </select>
                <label>Dogs temperment:</label>
                <select name="temperment" value={{$dog->temperment}}>
                    <option value="Timid">Timid</option>
                    <option value="Friendly">Friendly</option>
                    <option value="Agressive">Agressive</option>
                </select>
            </div>

            <div>
                <label>Extra info:</label>
                <textarea name="extra_info" value={{$dog->extra_info}}>

                </textarea>
                <label>Feed per day:</label>
                <select name="feed_per_day" value={{$dog->feed_per_day}}>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                </select>
            </div>

            <div>
                <button>
                    Update dog
                </button>
            </div>

        </form>
    </div>
</div>
