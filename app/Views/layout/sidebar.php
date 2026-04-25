  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == '' ? '' : 'collapsed' ?>" href="<?= base_url('/') ?>">
          <i class="bi bi-grid"></i>
          <span>Daftar Berita</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= uri_string() == 'profile' ? '' : 'collapsed' ?>" href="<?= base_url('/profile') ?>">
          <i class="bi bi-person"></i>
          <span>Profile Pembuat</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->
