<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/logo-sm.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>
    
    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('images/logo-sm.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>
    
    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
    
            <li class="side-nav-title">Main</li>
    
           
    
          
                <li class="side-nav-item">
                <a href="{{ route('users.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>
                <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                    <i class="ri-group-2-line"></i>
                    <span> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUsers">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('users.create')}}">Add User</a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}">User List</a>
                        </li>
                    </ul>
                </div>
            </li>
    
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Books </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('books.create')}}">Add a Book</a>
                        </li>
                        <li>
                            <a href="{{route('books.index')}}">Books List</a>
                        </li>
                    </ul>
                </div>
            </li>
           
          
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarServices" aria-expanded="false" aria-controls="sidebarServices" class="side-nav-link">
                    <i class="ri-pencil-ruler-2-line"></i>
                    <span> Reservations </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarServices">
                    <ul class="side-nav-second-level">
                       
                        <li>
                            <a href="reservations-list.php">Reservations List</a>
                        </li>
                    </ul>
                </div>
            </li>
            
    
            
        </ul>
        <!--- End Sidemenu -->
    </div>
    
    </div>
    
    
        <div class="clearfix"></div>
    </div>
    </div>
    
    
    <!-- ========== Left Sidebar End ========== -->