@auth
<div class="main-sidebar sidebar-style-3 ">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>
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
                <a class="nav-link" href="{{ url('home') }}"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            @endif

            {{--  SuperAdmin --}}
            @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home-admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home-admin') }}"><i class="fa fa-tachometer-alt"></i><span>Dashboard Admin</span></a>
            </li>
            @endif
            
           

            {{-- Mentor --}}
            @if (Auth::user()->role == 'mentor')
            <li class="{{ Request::is('home-mentor') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home-mentor') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard Mentor</span></a>
            </li>
            @endif

            {{-- Mentor --}}
            @if (Auth::user()->role == 'mentor' || Auth::user()->role == 'superadmin')
            <li class="menu-header">mentor material</li>
            <li class="{{ Request::is('mentor') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('mentor') }}"><i class="fas fa-book"></i> <span>mentor material</span></a>
            </li>

            {{-- <li class="#">
                <a class="nav-link" href="{{ url('assignments.review') }}"><i class="fas fa fa-check-square"></i> <span>Course Assessment</span></a>
            </li> --}}
            @endif

            {{--  SuperAdmin --}}
            @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Access</li>
            <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Access Rights</span></a>
            </li>

            <li class="{{ Request::is('/payment/pending') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/payment/pending') }}"><i class="fas fa-credit-card fa-lg"></i><span>Customer Payment</span></a>
            </li>
            @endif

            @if (Auth::user()->role == 'superadmin') 
            <li class="menu-header">Course materials</li>
            <li class="{{ Request::is('course-admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('course-admin') }}"><i class="fas fa-graduation-cap"></i> <span>Course</span></a>
            </li> 
            <li class="{{ Request::is('course.material.create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('course.material.create') }}"><i class="fas fa-user-shield"></i> <span>Materi Pelajaran</span></a>
            </li>
             @endif 

             @if (Auth::user()->role == 'user') 
            <li class="menu-header">Learning</li>
            <li class="{{ Request::is('my.courses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('my.courses') }}"><i class="fas fa-university"></i> <span>My Course</span></a>
            </li>
            </li>
            @endif

            <!-- Profile and change password -->
            <li class="menu-header">PROFILE</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Change Password</span></a>
            </li>


            <li class="menu-header">Starter</li>
            
            <li class="{{ Request::is('Settings') ? 'active' : '' }}">
                <a class="nav-link" href="#"><i class="fas fa-tag"></i> <span>Settings</span></a>

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
