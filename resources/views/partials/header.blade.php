
<nav class="navbar navbar-expand-lg header">
    <a href={{route('data.index')}}>
        <h5 class="my-0 mr-2 font-weight-normal">MindGeek</h5>
    </a>
    <form class="form-inline search" action="{{route('data.search', ['type' => $type])}}" method="POST">
        @csrf
        <div class="input-group input-group-sm">
            <input class="form-control shadow-none" type="search" placeholder="Search by name or alias" name="search" value="{{$search ?? null}}">
            <div class="input-group-append">
                <button class="btn btn-light" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </form>
</nav>
