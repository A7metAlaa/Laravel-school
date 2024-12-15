
 
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
  @php 
    $currentRouteName = request()->route()->getName();
    $currentPrefixName = request()->route()->getprefix();
  @endphp
 

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">    
        
 	    <li class="{{ ($currentRouteName == '/dashboard' ? 'active' : '') }}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			      <span>Dashboard</span>
          </a>
        </li>  
  

      
      <li class="treeview {{ ($currentPrefixName == '/users' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Manage User</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View user</a></li>
              <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add user</a></li>
            </ul>
      </li> 
		  
      <li class="treeview {{ ($currentPrefixName == '/profile' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profile.view')}}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{route('password.view')}}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            
  
      </ul>
    </section>
	
 
  </aside>