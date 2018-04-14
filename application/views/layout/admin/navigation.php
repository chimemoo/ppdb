    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Zonajasa</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
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
          <p class="app-sidebar__user-designation">Root</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item <?php if(isset($l_dash)){ echo $l_dash; } ?>" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_user)){ echo $l_user; } ?>" href="index.html"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_item)){ echo $l_item; } ?>" href="index.html"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Item</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_topup)){ echo $l_topup; } ?>" href="index.html"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Topup</span></a></li>
        <li><a class="app-menu__item <?php if(isset($l_abit)){ echo $l_abit; } ?>" href="index.html"><i class="app-menu__icon fa fa-question"></i><span class="app-menu__label">Abitrase</span></a></li>
      </ul>
    </aside>