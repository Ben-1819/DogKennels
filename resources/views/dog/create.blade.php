<x-navbar>
</x-navbar>

<div>
    <form action="{{route('dog.store')}}" method="post">
        @csrf

        <div>
            <label>Dogs owner:</label>
            <select name="owner_id">
                @foreach($owner as $item)
                    <option value={{$item->id}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Dogs name:</label>
            <input type="text" name="name">
            <label>Dogs breed:</label>
            <input type="text" name="breed">
        </div>

        <div>
            <label>Dogs size:</label>
            <select name="size">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>
            <label>Dogs age:</label>
            <input type="int" name="age">
        </div>

        <div>
            <label>Dogs training level:</label>
            <select name="training_level">
                <option value="Low">Low</option>
                <option value="Average">Average</option>
                <option value="Well Trained">Well Trained</option>
                <option value="Extremely Well Trained">Extremely Well Trained</option>
            </select>
            <label>Dogs temperment:</label>
            <select name="temperment">
                <option value="Timid">Timid</option>
                <option value="Friendly">Friendly</option>
                <option value="Agressive">Agressive</option>
            </select>
        </div>

        <div>
            <label>Extra info:</label>
            <textarea name="extra_info">

            </textarea>
            <label>Feed per day:</label>
            <select name="feed_per_day">
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
            </select>
        </div>

        <div>
            <button>
                Add new dog
            </button>
        </div>
    </form>
</div>
