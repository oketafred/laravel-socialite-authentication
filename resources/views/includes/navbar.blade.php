<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Sentinel::getUser()->full_name }}
                <i class="fas fa-caret-down ml-2"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> User Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit()"
                    class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> Logout
                </a>
            </div>

            <form action="{{ route("logout") }}" method="POST" id="form-logout">
                {{ csrf_field() }}
            </form>

        </li>
    </ul>
</nav>


<!-- Navbar -->
{{-- <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Sentinel::getUser()->full_name }}
<i class="fas fa-caret-down ml-2"></i>
</a>
<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
    <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i> User Profile
    </a>
    <div class="dropdown-divider"></div>
    <a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit()" class="dropdown-item">
        <i class="fas fa-users mr-2"></i> Logout
    </a>
</div>

<form action="{{ route("logout") }}" method="POST" id="form-logout">
    {{ csrf_field() }}
</form>

</li>
</ul>
</nav> --}}
<!-- /.navbar -->