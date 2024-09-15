@auth
<div class="main-sidebar sidebar-style-3">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">
                <img src="{{ asset('img/incubator.png') }}" alt="Logo" style="width: 70px;">
            </a>
        </div>
        
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">
                <img src="{{ asset('img/incubator.png') }}" alt="Logo" style="width: 50px;">
            </a>
        </div>
        
        <ul class="sidebar-menu">
            @if (Auth::user()->role == 'user')
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @endif

            @if (Auth::user()->role == 'superadmin')
            <li class="{{ Request::is('/home-admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home-admin') }}"><i class="fas fa-fire"></i><span>Dashboard Admin</span></a>
            </li>
            @endif

            @if (Auth::user()->role == 'mentor')
            <li class="{{ Request::is('/home-mentor') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home-mentor') }}"><i class="fas fa-fire"></i><span>Dashboard Mentor</span></a>
            </li>
            @endif

            @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Hak Akses</li>
            <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Access Rights</span></a>
            </li>
            @endif

            {{-- @if (Auth::user()->role == 'superadmin') --}}
            <li class="menu-header">Materi Kursus</li>
            <li class="{{ Request::is('/course-admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/course-admin') }}"><i class="fas fa-user-shield"></i> <span>Kursus</span></a>
            </li>
            {{-- @endif --}}

            <!-- Profile and change password -->
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Change Password</span></a>
            </li>

            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>Blank Page</span></a>
            </li>

            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="#"><i class="fas fa-gear"></i> <span>Settings</span></a>

            </li>
            {{-- <footer>
                <div class="mt-auto p-4 text-center text-gray-500">
                    <p>&copy; {{ date('Y') }} Your Company</p>
                    <p><a href="https://yourwebsite.com" target="_blank" class="text-primary">yourwebsite.com</a></p>
                </div>
            </footer> --}}
            
        </ul>

       
       
    </aside>
</div>
@endauth
