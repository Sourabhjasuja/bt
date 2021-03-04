
<div class="overlay"></div>
       
       
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ url('admin/') }}" class="logo-text"><span>Admin</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name">{{ auth()->guard('admin')->user()->name }}<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('assets/images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="{{ url('admin/changepass') }}"><i class="fa fa-user"></i>Change Password</a></li>
                                        <li role="presentation"><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('admin/logout') }}" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                                
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
           <div class="page-sidebar sidebar">
		    <div class="page-sidebar-inner slimscroll">      
		      <ul class="menu accordion-menu">
		        <li class="{{ request()->is('admin') ? 'active' : '' }}"><a href="{{ url('admin/') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span>
		            <p>Dashboard</p>
		            </a>
                </li>
		        <li class="{{ request()->is('admin/application*') ? 'active' : '' }}"><a href="{{ url('admin/applications') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span>
                    <p>Applications</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/user*') ? 'active' : '' }}"><a href="{{ url('admin/users') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span>
		            <p>Users</p>
		            </a>
                </li>
    		    <!-- <li class="{{ request()->is('admin/franchise*') ? 'active' : '' }}"><a href="{{ url('admin/franchise') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span>
                    <p>Franchise</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/plan*') ? 'active' : '' }}"><a href="{{ url('admin/plans') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-file"></span>
                    <p>Plans Management</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/order*') ? 'active' : '' }}"><a href="{{ url('admin/orders') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span>
                    <p>Order Management</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/resource*') ? 'active' : '' }}"><a href="{{ url('admin/resources') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span>
                    <p>Resources</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/setting*') ? 'active' : '' }}"><a href="{{ url('admin/settings') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-cog"></span>
                    <p>Settings</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/coupon*') ? 'active' : '' }}"><a href="{{ url('admin/coupons') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span>
                    <p>Coupons</p>
                    </a>
                </li>
                <li class="{{ request()->is('admin/static*') ? 'active' : '' }}"><a href="{{ url('admin/static') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list"></span>
                    <p>Static Pages</p>
                    </a>
                </li> -->
		      </ul>
		    </div>
		    <!-- Page Sidebar Inner --> 
		  </div>