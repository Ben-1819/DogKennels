<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Dog Menu</h1>

    <div>
        <button>
            <a href="{{route('dog.create')}}">
                Create new dog
            </a>
        </button>
    </div>

    <div>
        <button>
            <a href="{{route('dog.index')}}">
                View all dogs
            </a>
        </button>
    </div>
</div>
