<x-navbar>
</x-navbar>

<div>
    <h1 class="title">Dog Kennel</h1>

    <div>
        <button>
            <a href="{{route('menu.owner')}}">
                Owner menu
            </a>
        </button>

        <button>
            <a href="{{route('menu.dog')}}">
                Dog menu
            </a>
        </button>
    </div>

    <div>
        <button>
            <a href="{{route('menu.kennel')}}">
                Kennel menu
            </a>
        </button>

        <button>
            <a href="{{route('menu.booking')}}">
                Booking menu
            </a>
        </button>
    </div>

</div>
