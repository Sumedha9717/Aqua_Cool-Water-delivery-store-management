<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        {{-- <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> --}}
        <a class="nav-link" href="{{ url('/user/category') }}">
          <i class="mdi mdi-menu menu-icon"></i>
          <span class="menu-title">Category</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
        {{-- <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div> --}}
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/brands') }}">
          <i class="mdi mdi-menu menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/supplier') }}">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Suppliers</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/user/branch') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Our Branches</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/orders') }}">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Oders</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Settings</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>
