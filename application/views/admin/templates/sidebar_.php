<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon">
    <i class="fas fa-chess-rook"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Admin Page</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Administrator
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('admin'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <i class="fas fa-fw fa-address-card"></i>
    <span>Tentang</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Profil</a>
      <a class="collapse-item" href="cards.html">SDM</a>
      <a class="collapse-item" href="cards.html">Mitra</a>
      <a class="collapse-item" href="cards.html">Laporan Tahunan</a>
      <a class="collapse-item" href="cards.html">Laporan Kinjera</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-newspaper"></i>
    <span>Berita Agenda</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Berita</a>
      <a class="collapse-item" href="cards.html">Agenda</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-paperclip"></i>
    <span>Penelitian</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fas fa-fw fa-paper-plane"></i>
    <span>Publikasi</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">P2E Media</a>
      <a class="collapse-item" href="cards.html">Publikasi Eksternal</a>
      <a class="collapse-item" href="cards.html">Link Publikasi</a>
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-paste"></i>
    <span>Kolom</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
    <i class="fas fa-fw fa-images"></i>
    <span>Galeri</span>
  </a>
  <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Foto</a>
      <a class="collapse-item" href="cards.html">Video</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
    <i class="fas fa-fw fa-comment"></i>
    <span>Komentar Pesan</span>
  </a>
  <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Komentar</a>
      <a class="collapse-item" href="cards.html">Pesan</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
    <i class="fas fa-fw fa-user-lock"></i>
    <span>Akses</span>
  </a>
  <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html">Role Akses</a>
      <a class="collapse-item" href="cards.html">Master Role</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  User
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-user"></i>
    <span>My Profile</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-pencil-alt"></i>
    <span>Tulis Berita</span></a>
</li>
<!-- Nav Item - Utilities Collapse Menu -->

 <!-- Divider -->
 <hr class="sidebar-divider">

 <!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->