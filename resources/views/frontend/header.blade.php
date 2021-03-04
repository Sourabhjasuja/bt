
<div class="main">
  <nav class="navbar navbar-expand-lg darkblue">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><img src="{{asset('frontend/images/menu.png')}}" /></span> </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarsExample04">
      <ul class="navbar-nav">
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BILLING, Billing 1</a>
          <div class="dropdown-menu" aria-labelledby="dropdown08"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a> </div>
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->first_name }}</a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown09"> 
            <a class="dropdown-item" href="{{ url('profile') }}">Profile</a> 
            <a class="dropdown-item" href="{{ url('logout') }}">Logout</a> 
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg lightblue">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><img src="{{ asset('frontend/images/menu.png') }}" /></span></span> </button>
    
    
    <div class="collapse navbar-collapse" id="navbarsExample02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('dashboard') }}">Home <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item {{ request()->is('inventory*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('inventory') }}">Inventory</a> </li>
        <li class="nav-item {{ request()->is('order*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('order') }}">Ordering</a> </li>
        <li class="nav-item {{ request()->is('billing*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('billing') }}">Billing</a> </li>
        <li class="nav-item {{ request()->is('documents*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('documents') }}">Documents</a> </li>
        <li class="nav-item {{ request()->is('receipts*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('receipts') }}">Receipts</a> </li>
        <li class="nav-item {{ request()->is('armanage*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('armanage') }}">AR Management</a> </li>
        <li class="nav-item {{ request()->is('retail*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('retail') }}">Retail</a> </li>
        <li class="nav-item {{ request()->is('reports*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('reports') }}">Reports</a> </li>
        <li class="nav-item {{ request()->is('system*') ? 'active' : '' }}"> <a class="nav-link" href="{{ url('system') }}">System Setup</a> </li>
      </ul>
      <form class="d-none d-sm-inline-block col-sm-2 custom-form">
        <div class="input-group input-group-navbar">
          <input type="text" class="form-control" placeholder="How may we help you?" aria-label="Search">
          <button class="btn search" type="button"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg> </button>
          <button class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16.591" height="15.879" viewBox="0 0 16.591 15.879">
          <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M8.847.551,6.822,4.657l-4.531.661a.993.993,0,0,0-.549,1.693L5.02,10.205l-.775,4.512a.992.992,0,0,0,1.439,1.045l4.053-2.13,4.053,2.13a.993.993,0,0,0,1.439-1.045l-.775-4.512,3.278-3.194a.993.993,0,0,0-.549-1.693l-4.531-.661L10.627.551A.993.993,0,0,0,8.847.551Z" transform="translate(-1.441 0.001)" fill="#fff"/>
          </svg> </button>
        </div>
      </form>
    </div>
  </nav>
</div>