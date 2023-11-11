<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#blogs" class="nav-link">Blogs</a>
        @if (!auth()->check())
        <a href="/register" class="nav-link">Register</a>
        @else
        <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
        @endif
        
        @if (auth()->check())
        <form action="/logout" method="POST">
            @csrf
            <button href=""
            class=" btn nav-link btn-link"
            type="submit"
            >Logout</button>
        </form>

        @endif
        <a href="#subscribe" class="nav-link">Subscribe</a>
      </div>
    </div>
</nav>
