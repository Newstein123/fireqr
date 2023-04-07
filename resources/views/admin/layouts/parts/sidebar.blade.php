<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="profile-element">
                    <div class=" d-flex justify-content-between align-items-center">
                        <img src="{{asset("img/logo/".generalSetting('logo'))}}" alt="" class="img-fluid w-50 p-2 rounded-circle">
                        <span class="text-white"> မီးသတ်ဦးစီးဌာန</span>
                    </div>
                </div>
                <div class="logo-element">
                    <img src="{{asset("img/logo/".generalSetting('logo'))}}" alt="" class="img-fluid p-2 rounded-circle">
                </div>
            </li>
            <li class="{{url()->current() == url('/admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            @can('view products')
                <li class="{{url()->current() == url('/admin/product') ? 'active' : '' }}">
                    <a href={{ route('productIndex') }}><i class="fa fa-product-hunt" aria-hidden="true"></i> <span class="nav-label"> Product </span></a>
                </li>
            @endcan
            @can('view users')
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label"> Admin အသုံးပြုသူများ  </span></a>
                </li>
            @endcan
            @can('view setting')
                <li>
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label"> Setting  </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html"> Account Setting </a></li>
                        <li><a href="mail_compose.html"> Grant Permission </a></li>
                        <li><a href="email_template.html"> General Setting </a></li>    
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</nav>