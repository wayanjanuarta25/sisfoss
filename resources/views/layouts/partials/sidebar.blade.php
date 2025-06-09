<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <div class="sb-nav-link-icon">
              <i class="fas fa-tachometer-alt"></i>
            </div>
            Dashboard
          </a>
          <a
            class="nav-link collapsed"
            href="#"
            data-bs-toggle="collapse"
            data-bs-target="#collapseLayouts"
            aria-expanded="false"
            aria-controls="collapseLayouts"
          >
            <div class="sb-nav-link-icon">
              <i class="fas fa-columns"></i>
            </div>
            Data Master
            <div class="sb-sidenav-collapse-arrow">
              <i class="fas fa-angle-down"></i>
            </div>
          </a>
          <div
            class="collapse"
            id="collapseLayouts"
            aria-labelledby="headingOne"
            data-bs-parent="#sidenavAccordion"
          >
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="#">Satuan Pelaksana</a>
              <a class="nav-link" href="#">Jabatan</a>
              <a class="nav-link" href="#">Akun User</a>
            </nav>
          </div>
          <a class="nav-link {{ request()->routeIs('personel.*') ? 'active' : '' }}" href="{{ route('personel.index') }}">
            <div class="sb-nav-link-icon">
              <i class="fas fa-chart-area"></i>
            </div>
            Personel
          </a>
        </div>
      </div>
    </nav>
  </div>
