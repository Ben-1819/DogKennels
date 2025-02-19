<x-navbar>
</x-navbar>


<div>
    <h1 class="title">Editing Kennel number: {{$kennel->id}}</h1>

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
        <form action="{{route('kennel.update', $kennel)}}" method="post">
            @csrf
            @method('put')

            <div>
                <label>Kennel size: {{$kennel->kennel_size}}</label>
                <select name="kennel_size" value={{$kennel->kennel_size}}>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>
            <div>
                <label>Kennel type: {{$kennel->kennel_type}}</label>
                <select name="kennel_type" value={{$kennel->kennel_type}}>
                    <option value="Regular">Regular</option>
                    <option value="High Quality">High Quality</option>
                    <option value="Luxury">Luxury</option>
                </select>
            </div>

            <button>
                Update
            </button>
        </form>
    </div>
</div>
