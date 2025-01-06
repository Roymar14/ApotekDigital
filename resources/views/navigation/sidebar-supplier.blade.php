<div class="sidebar" data-color="orange">
      
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        <div class="bg-white rounded-circle">
          <i class="now-ui-icons text-warning users_single-02"></i>
        </div>
        
      </a>
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        CEO Apotek Digital
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
          <span class="hide-menu pl-4 text-white">Home</span>
        </li>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : ''}} mb-2">
          <a href="{{route('dashboard')}}">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
          <span class="hide-menu pl-4 text-white">Data Barang</span>
        </li>
        <li class="{{ request()->routeIs('supplier.stock') ? 'active' : ''}}">
          <a href="{{route('supplier.stock')}}">
          <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
            </svg></i>
          <p>Stock</p>
        </a>
      </li>
       
      </ul>
    </div>
  </div>