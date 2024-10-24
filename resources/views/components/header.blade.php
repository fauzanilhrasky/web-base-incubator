@auth
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav ml-auto b">
        <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                <i class="fas fa-bars" style=" color: black; "></i>
            </a>
        </li>
        
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block text-dark">
                    Hello, {{ auth()->check() ? substr(auth()->user()->name, 0, 10) : 'Tamu' }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Welcome, {{ auth()->check() ? substr(auth()->user()->name, 0, 10) : 'Tamu' }}
                </div>
                <a class="dropdown-item has-icon edit-profile" href="{{ route('profile.edit') }}" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i> Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); confirmLogout();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</nav>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out from your account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.isConfirmed) {
                localStorage.clear(); // Clear local storage
                document.getElementById('logout-form').submit(); // Submit the logout form
            }
        });
    }
</script>
@endauth
