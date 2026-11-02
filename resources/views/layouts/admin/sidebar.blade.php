  <div class="sidebar-wrapper" id="sidebar">
    <!-- Brand Logo / Identity -->
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
      <img src="{{ asset('assets-admin/images/logosigudang.png') }}" alt="Logo SiGudang" style="width: 32px; height: 32px; object-fit: contain;">
      <span>SiGudang</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menu</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="sidebar-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" id="menu-overview" title="Overview">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Group: Components -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Components</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item {{ request()->routeIs('items.*') ? 'active' : '' }}">
            <a href="{{ route('items.index') }}" class="sidebar-menu-link {{ request()->routeIs('items.*') ? 'active' : '' }}" id="menu-basictables" title="Data Barang">
              <i class="bi bi-box-seam"></i>
              <span>Data Barang</span>
            </a>
          </li>
          <li class="sidebar-menu-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}" class="sidebar-menu-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" id="menu-categories" title="Data Kategori">
              <i class="bi bi-tags"></i>
              <span>Data Kategori</span>
            </a>
          </li>
          <li class="sidebar-menu-item {{ request()->routeIs('items.create') ? 'active' : '' }}">
            <a href="{{ route('items.create') }}" class="sidebar-menu-link {{ request()->routeIs('items.create') ? 'active' : '' }}" id="menu-uiforms" title="Tambah Barang">
              <i class="bi bi-plus-circle"></i>
              <span>Tambah Barang</span>
            </a>
          </li>
          <li class="sidebar-menu-item {{ request()->routeIs('user.*') || request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="sidebar-menu-link {{ request()->routeIs('user.*') || request()->routeIs('users.*') ? 'active' : '' }}" id="menu-users" title="Data User">
              <i class="bi bi-people-fill"></i>
              <span>Data User</span>
            </a>
          </li>
        </ul>
      </div>

    </div>

    <!-- Sidebar Profile Card (Dynamic Footer) -->
    <div class="sidebar-profile">
      <img src="{{ asset('assets-admin/images/avatar.png') }}" alt="Administrator" class="sidebar-profile-img"
        onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">Administrator</div>
        <div class="sidebar-profile-email">admin@email.com</div>
      </div>
    </div>
  </div>
