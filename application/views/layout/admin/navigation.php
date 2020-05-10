    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Psb System</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/setting"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>dashboard/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="max-width:50px;" src="<?php echo base_url(); ?>assets/img/profil.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
          <p class="app-sidebar__user-designation"><?php if(isset($this->session->admin_name)) {echo $this->session->admin_name;} ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item <?php if(isset($l_dash)){ echo $l_dash; } ?>" href="<?php echo base_url(); ?>dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item <?php if(isset($l_user)){ echo $l_user; } ?>" href="<?php echo base_url(); ?>dashboard/siswa" ><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Siswa</span></a>
        </li>
        <li><a class="app-menu__item <?php if(isset($l_item)){ echo $l_item; } ?>" href="<?php echo base_url(); ?>dashboard/event"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Data Event</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_peng)){ echo $l_peng; } ?>" href="<?php echo base_url(); ?>dashboard/pengumuman"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Pengumuman</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_pay)){ echo $l_pay; } ?>" href="<?php echo base_url(); ?>dashboard/payment"><i class="app-menu__icon fa fa-question"></i><span class="app-menu__label">Data Pembayaran</span></a></li>
      </ul>
    </aside>