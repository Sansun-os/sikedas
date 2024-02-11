<header class="app-header fixed-top">	   	            
    <div class="app-header-inner">  
        <div class="container-fluid py-2">
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center">
                
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div><!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                </div><!--//col-->
                <div class="app-search-box col">
                    <form class="app-search-form">   
                        <input type="text" placeholder="Search..." name="search" class="form-control search-input">
                        <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fa-solid fa-magnifying-glass"></i></button> 
                    </form>
                </div><!--//app-search-box-->
                
                <div class="app-utilities col-auto">
                   <!--//app-utility-item-->
                    <div class="app-utility-item">
                       
                    </div><!--//app-utility-item-->
                    
                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="/" role="button" aria-expanded="false"><img class="rounded-2 " src="{{ asset('images/user.png') }}" alt="user profile"></a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item">Hallo {{ auth()->user()->name }}</a></li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                    </div><!--//app-user-dropdown--> 
                </div><!--//app-utilities-->
            </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel"> 
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="/"><img class="logo-icon me-2" src="{{ asset('images/kendaraan.ico') }}" alt="logo"><span class="logo-text">Kendaraan Dinas KD</span></a>

            </div><!--//app-branding-->  
            
            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    @if (auth()->user()->level=="admin")
                    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }} " href="{{ route('dashboard') }}">
                            <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
      <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
    </svg>
                             </span>
                             <span class="nav-link-text">Dashboard</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    @endif
                  
                    @if (auth()->user()->level=="admin")
                        
                 
                    <li class="nav-item has-submenu ">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle" href="#submenu-1" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                            <span class="nav-icon">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
  <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
</svg>
                             </span>
                             <span class="nav-link-text">Data Master</span>
                             <span class="submenu-arrow">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
                             </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->
                        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item {{ Route::is('kendaraan') ? 'active' : '' }}"><a class="submenu-link" href="{{ route('kendaraan') }}">Data Kendaraan</a></li>
                                <li class="submenu-item {{ Route::is('pegawai') ? 'active' : '' }}"><a class="submenu-link" href="/pegawai">Data Pegawai</a></li>
                               
                            </ul>
                        </div>
                    </li><!--//nav-item-->
                    @endif
                 
                   
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        
                            <a class="nav-link" href="{{ route('peminjaman') }}">
                            <span class="nav-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" id="car"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01l-1.97 5.67c-.07.21-.11.43-.11.66v7.16c0 .83.67 1.5 1.5 1.5S6 20.33 6 19.5V19h12v.5c0 .82.67 1.5 1.5 1.5.82 0 1.5-.67 1.5-1.5v-7.16c0-.22-.04-.45-.11-.66l-1.97-5.67zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.27-3.82c.14-.4.52-.68.95-.68h9.56c.43 0 .81.28.95.68L19 11H5z"></path></svg>
                            </span>
                            <span class="nav-link-text">Peminjaman kendaraan</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                
                   
                    @if (auth()->user()->level=="admin")
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        
                            <a class="nav-link" href="{{ route('riwayatpemakaian') }}">
                            <span class="nav-icon">
                                <span class="material-symbols-outlined">
                                    sync
                                    </span>
                            </span>
                            <span class="nav-link-text">Riwayat Pemakaian</span>
                        </a><!--//nav-link-->
                    </li><!--//nav-item-->
                    {{-- <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle" href="#submenu-2" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-1">
                            <span class="nav-icon">
                                <span class="material-symbols-outlined">
                                    sync
                                    </span>
                            </span>
                             <span class="nav-link-text">Riwayat Pemakaian</span>
                             <span class="submenu-arrow">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
                             </span><!--//submenu-arrow-->
                        </a><!--//nav-link-->
                        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('riwayatpemakaian') }}">Riwayat Peminjaman</a></li>
                                <li class="submenu-item "><a class="submenu-link" href="{{ route('riwayatpengembalian') }}">Riwayat Pengembalian</a></li>
                               
                            </ul>
                        </div>
                    </li><!--//nav-item--> --}}
                    @endif
                    @if (auth()->user()->level=="admin")
                    
                    <div class="app-sidepanel-footer">
                        <nav class="app-nav app-nav-footer">
                            <ul class="app-menu footer-menu list-unstyled">
                              
                                <li class="nav-item">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link" href="{{ route('kelolaadmin') }}">
                                        
                                        <span class="nav-icon">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
          <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
        </svg>
                                        </span>
                                        <span class="nav-link-text">Kelola Admin</span>
                                    </a><!--//nav-link-->
                                </li><!--//nav-item-->
                            </ul><!--//footer-menu-->
                        </nav>
                    </div><!--//app-sidepanel-footer-->		
                    @endif		    
                </ul><!--//app-menu-->
            </nav><!--//app-nav-->
          
           
        </div><!--//sidepanel-inner-->
    </div><!--//app-sidepanel-->
</header><!--//app-header-->