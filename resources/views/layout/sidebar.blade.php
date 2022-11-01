<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">
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
    <a class="nav-link" href="/dashboard">
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
    <a class="nav-link {{ $main_menu == 'dailyreport' ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="{{ $main_menu == 'dailyreport' ? 'true' : 'false' }}" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-table"></i>
        <span>Daily Report</span>
    </a>
    <input type="hidden" id="wilayah" value="{{ $wilayah }}">
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
            <a class="collapse-item {{ $slug == '/summary/langkat' ? 'active' : '' }} {{ $LGT_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/langkat">Langkat</a>
            <a class="collapse-item {{ $slug == '/summary/labuanbatu' ? 'active' : '' }} {{ $LBB_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/labuanbatu">Labuhanbatu</a>
            <a class="collapse-item {{ $slug == '/summary/asahan' ? 'active' : '' }} {{ $ASA_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/asahan">Asahan</a>
        </div>
    </div>
</li>
<li class="nav-item {{ $main_menu == 'parsing' ? 'active' : '' }}">
    <a class="nav-link {{ $main_menu == 'parsing' ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#MenuParsing"
        aria-expanded="{{ $main_menu == 'parsing' ? 'true' : 'false' }}" aria-controls="MenuParsing">
        <i class="fas fa-fw fa-table"></i>
        <span>Heart Beat</span>
    </a>
    <input type="hidden" id="wilayah" value="{{ $wilayah }}">
    <div id="MenuParsing" class="collapse {{ $main_menu == 'parsing' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Wilayah</h6>
            <a class="collapse-item {{ $slug == '/parsing/medan' ? 'active' : '' }} {{ $MDN_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/medan">Medan</a>
            <a class="collapse-item {{ $slug == '/parsing/batam' ? 'active' : '' }} {{ $BTM_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/batam">Batam</a>
            <a class="collapse-item {{ $slug == '/parsing/bengkulu' ? 'active' : '' }} {{ $BGL_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/bengkulu">Bengkulu</a>
            <a class="collapse-item {{ $slug == '/parsing/binjai' ? 'active' : '' }} {{ $BJI_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/binjai">Binjai</a>
            <a class="collapse-item {{ $slug == '/parsing/deliserdang' ? 'active' : '' }} {{ $DLS_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/deliserdang">Deliserdang</a>
            <a class="collapse-item {{ $slug == '/parsing/karo' ? 'active' : '' }} {{ $KRO_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/karo">Karo</a>
            <a class="collapse-item {{ $slug == '/parsing/pekanbaru' ? 'active' : '' }} {{ $PKB_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/pekanbaru">Pekanbaru</a>
            <a class="collapse-item {{ $slug == '/parsing/pematangsiantar' ? 'active' : '' }} {{ $PMT_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/pematangsiantar">Pematangsiantar</a>
            <a class="collapse-item {{ $slug == '/parsing/samosir' ? 'active' : '' }} {{ $SMS_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/samosir">Samosir</a>
            <a class="collapse-item {{ $slug == '/parsing/simalungun' ? 'active' : '' }} {{ $SML_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/simalungun">Simalungun</a>
            <a class="collapse-item {{ $slug == '/parsing/tanjungpinang' ? 'active' : '' }} {{ $TJP_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/tanjungpiang">Tanjungpinang</a>
            <a class="collapse-item {{ $slug == '/parsing/langkat' ? 'active' : '' }} {{ $LGT_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/langkat">Langkat</a>
            <a class="collapse-item {{ $slug == '/parsing/labuhanbatu' ? 'active' : '' }} {{ $LBB_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/labuhanbatu">Labuhanbatu</a>
            <a class="collapse-item {{ $slug == '/parsing/asahan' ? 'active' : '' }} {{ $ASA_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/parsing/asahan">Asahan</a>
        </div>
    </div>
</li>
<li class="nav-item {{ $main_menu == 'utility' ? 'active' : '' }}">
    <a class="nav-link {{ $main_menu == 'utility' ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#Menuutility"
        aria-expanded="{{ $main_menu == 'utility' ? 'true' : 'false' }}" aria-controls="Menuutility">
        <i class="fas fa-fw fa-table"></i>
        <span>Utility</span>
    </a>
    <div id="Menuutility" class="collapse {{ $main_menu == 'utility' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tools App</h6>
            <a class="collapse-item {{ $slug == '/utility/doubledata' ? 'active' : '' }} {{ $MDN_IS_ACTIVE == 1 ? '' : 'd-none' }}" href="/utility/doubledata">Check Double Data</a>
        </div>
    </div>
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
