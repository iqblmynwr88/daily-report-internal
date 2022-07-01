<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Monitoring</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item {{ $main_menu == 'dashboard' ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Monitoring
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ $main_menu == 'dailyreport' ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-table"></i>
        <span>Daily Report</span>
    </a>
    <div id="collapseTwo" class="collapse {{ $main_menu == 'dailyreport' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Wilayah</h6>
            <a class="collapse-item {{ $slug == '/summary/medan' ? 'active' : '' }} {{ $MDN_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/medan">Medan</a>
            <a class="collapse-item {{ $slug == '/summary/batam' ? 'active' : '' }} {{ $BTM_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/batam">Batam</a>
            <a class="collapse-item {{ $slug == '/summary/bengkulu' ? 'active' : '' }} {{ $BGL_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/bengkulu">Bengkulu</a>
            <a class="collapse-item {{ $slug == '/summary/binjai' ? 'active' : '' }} {{ $BJI_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/binjai">Binjai</a>
            <a class="collapse-item {{ $slug == '/summary/deliserdang' ? 'active' : '' }} {{ $DLS_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/deliserdang">Deliserdang</a>
            <a class="collapse-item {{ $slug == '/summary/karo' ? 'active' : '' }} {{ $KRO_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/karo">Karo</a>
            <a class="collapse-item {{ $slug == '/summary/pekanbaru' ? 'active' : '' }} {{ $PKB_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/pekanbaru">Pekanbaru</a>
            <a class="collapse-item {{ $slug == '/summary/pematangsiantar' ? 'active' : '' }} {{ $PMT_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/pematangsiantar">Pematangsiantar</a>
            <a class="collapse-item {{ $slug == '/summary/samosir' ? 'active' : '' }} {{ $SMS_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/samosir">Samosir</a>
            <a class="collapse-item {{ $slug == '/summary/simalungun' ? 'active' : '' }} {{ $SML_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/simalungun">Simalungun</a>
            <a class="collapse-item {{ $slug == '/summary/tanjungpinang' ? 'active' : '' }} {{ $TJP_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/tanjungpinang">Tanjungpinang</a>
        </div>
    </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>
<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<!-- Sidebar Message -->
<!-- <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->
</ul>