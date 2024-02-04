  <style>
    .navbar-custom .nav-link {
    font-size: 18px; /* Adjust the font size as needed */
    margin-right: 10px; /* Adjust the margin to move it slightly to the right */
}
  </style>
        <!-- ========== Horizontal Menu Start ========== -->
        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('dash')}}" id="topnav-dashboards" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-dashboard-3-line"></i> Books Collection
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-pages-line"></i>Pages <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                    <div class="dropdown">
                                       
                                        
                                   
                                 
                                    <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                                   
                                    
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ========== Horizontal Menu End ========== -->
