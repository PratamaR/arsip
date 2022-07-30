<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="{{ ($title === 'Dashboard')? "active" : "" }}"><a class="nav-link" href="/"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Starter</li>
              <li class="nav-item dropdown {{ ($title === 'Surat Masuk')? "active" : ($title === 'Surat Keluar')? "active" : "" }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Arsip Surat</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ ($title === 'Surat Masuk')? "active" : "" }}"><a class="nav-link" href="/masuk-list">Surat Masuk</a></li>
                  <li class="{{ ($title === 'Surat Keluar')? "active" : "" }}"><a class="nav-link" href="/keluar-list">Surat Keluar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>
      </ul>
    </aside>
  </div>
