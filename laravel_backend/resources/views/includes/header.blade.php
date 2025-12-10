<nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <form action="{{ route('logout') }}" method="POST" class="d-flex">
            @csrf
            <button class="btn btn-danger" type="submit">Đăng xuất</button>
        </form>
    </div>
</nav>
