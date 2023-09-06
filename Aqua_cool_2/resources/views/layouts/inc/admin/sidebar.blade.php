 <!-- partial:partials/_settings-panel.html -->
 <div class="theme-setting-wrapper">
    <div id="settings-trigger"><i class="ti-settings"></i></div>
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close ti-close"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles success"></div>
        <div class="tiles warning"></div>
        <div class="tiles danger"></div>
        <div class="tiles info"></div>
        <div class="tiles dark"></div>
        <div class="tiles default"></div>
      </div>
    </div>
  </div>
  <div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
      </li>
    </ul>
    <div class="tab-content" id="setting-content">
      <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
        <div class="add-items d-flex px-3 mb-0">
          <form class="form w-100">
            <div class="form-group d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
              <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
            </div>
          </form>
        </div>
        <div class="list-wrapper px-3">
          <ul class="d-flex flex-column-reverse todo-list">
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Team review meeting at 3.00 PM
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Prepare for presentation
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Resolve all the low priority tickets due today
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Schedule meeting for next week
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Project review
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
          </ul>
        </div>
        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
        <div class="events pt-4 px-3">
          <div class="wrapper d-flex mb-2">
            <i class="ti-control-record text-primary mr-2"></i>
            <span>Feb 11 2018</span>
          </div>
          <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
          <p class="text-gray mb-0">The total number of sessions</p>
        </div>
        <div class="events pt-4 px-3">
          <div class="wrapper d-flex mb-2">
            <i class="ti-control-record text-primary mr-2"></i>
            <span>Feb 7 2018</span>
          </div>
          <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
          <p class="text-gray mb-0 ">Call Sarah Graves</p>
        </div>
      </div>
      <!-- To do section tab ends -->
      <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
        <div class="d-flex align-items-center justify-content-between border-bottom">
          <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
          <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
        </div>
        <ul class="chat-list">
          <li class="list active">
            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Thomas Douglas</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">19 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <div class="wrapper d-flex">
                <p>Catherine</p>
              </div>
              <p>Away</p>
            </div>
            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
            <small class="text-muted my-auto">23 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Daniel Russell</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">14 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <p>James Richardson</p>
              <p>Away</p>
            </div>
            <small class="text-muted my-auto">2 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Madeline Kennedy</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">5 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Sarah Graves</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">47 min</small>
          </li>
        </ul>
      </div>
      <!-- chat tab ends -->
    </div>
  </div>


<!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{-- ------------------------------------------------------Category----------------------------------------------------------- --}}
        <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">View Category</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> --}}
          </ul>
        </div>
      </li>


{{--
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Form elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
          </ul>
        </div>
      </li> --}}

    {{-- ------------------------------------------------------Brands----------------------------------------------------------- --}}

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Brands</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/brands/create') }}">Add Brands</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/brands') }}">View Brands</a></li>
          </ul>
        </div>
      </li>

 {{-- ------------------------------------------------------Products----------------------------------------------------------- --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#pro-tab" aria-expanded="false" aria-controls="pro-tab">
          <i class="icon-bar-graph menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="pro-tab">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Products</a></li>
          </ul>
        </div>
      </li>

    {{-- ------------------------------------------------------ Suppliers----------------------------------------------------------- --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#suplier" aria-expanded="false" aria-controls="suplier">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Suppliers</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="suplier">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/supplier/create') }}"> Add Supplier </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/supplier') }}"> View Supplier </a></li>
          </ul>
        </div>
      </li>

    {{-- ------------------------------------------------------ Branches----------------------------------------------------------- --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#branch1" aria-expanded="false" aria-controls="branch1">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Branches</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="branch1">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/branch/create')}}"> Add Branch </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/branch') }}"> View Branches </a></li>
          </ul>
        </div>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-grid-2 menu-icon"></i>
          <span class="menu-title">Tables</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
          </ul>
        </div>
      </li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li> --}}

  {{-- ------------------------------------------------------User Pages----------------------------------------------------------- --}}
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}"> Add User </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}"> View User </a></li>
          </ul>
        </div>
      </li>

       {{-- ------------------------------------------------------Home Sliders----------------------------------------------------------- --}}

       <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#home-slid" aria-expanded="false" aria-controls="home-slid">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Home Sliders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="home-slid">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/sliders/create') }}">Add Sliders</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/sliders') }}">View Sliders</a></li>
          </ul>
        </div>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>

      {{-- --------------------------------------------------------------Setting------------------------------------------------------ --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Setting</span>
        </a>
      </li>

    </ul>
  </nav>
