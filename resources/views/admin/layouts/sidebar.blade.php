<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Callie</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Danh mục -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/category') }}">
          <i class="fas fa-folder"></i>
          <span>Danh mục</span>
        </a>
      </li>

      <!-- Danh mục con -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/subcategory') }}">
          <i class="fas fa-folder-open"></i>
          <span>Danh mục con</span>
        </a>
      </li>

      <!-- Bài viết -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/post') }}">
          <i class="fas fa-newspaper"></i>
          <span>Bài viết</span>
        </a>
      </li>

      <!-- Liên hệ -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/contact') }}">
          <i class="fas fa-newspaper"></i>
          <span>Liên hệ</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>