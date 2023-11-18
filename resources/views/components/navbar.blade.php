<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="/#blogs" class="nav-link">Blogs</a>
        @auth
        @can('admin')
        <a href="/admin/blogs" class="nav-link">Dashboard</a>
        @endcan
        <img
        src="{{auth()->user()->avator}}"
        alt=""
        width="40"
        height="40"
        class="rounded-circle"
        >
        <a href="" class="nav-link">{{auth()->user()->name}}</a>
        <form action="/logout" method="POST">
            @csrf
            <button href=""
            class=" btn nav-link btn-link"
            type="submit"
            >Logout</button>
        </form>
        @else
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
        @endauth
      </div>
    </div>
</nav>
