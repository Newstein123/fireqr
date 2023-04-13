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
                <li class="{{request()->is('admin/product*') ? 'active' : '' }}">
                    <a href={{ route('productIndex') }}><i class="fa fa-product-hunt" aria-hidden="true"></i> <span class="nav-label"> Product </span></a>
                </li>
            @endcan
            @can('view users')
                <li class="{{request()->is('admin/user*') ? 'active' : ''}}">
                    <a href="{{route('userIndex')}}"><i class="fa fa-users"></i> <span class="nav-label"> Admin အသုံးပြုသူများ  </span></a>
                </li>
            @endcan
            @can('view setting')
                <li class ="{{request()->is('admin/setting*') ? 'active' : '' }}">
                    <a href=""><i class="fa fa-cogs"></i> <span class="nav-label"> Setting  </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href=""> Account Setting </a></li>
                        @can('view permissions')
                            <li class="{{request()->is('admin/setting/permission*') ? 'active' : ''}}"><a href="{{route('permissionIndex')}}"> Permissions </a></li>
                        @endcan
                        @can('view general setting')
                            <li class="{{request()->is('admin/setting/general*') ? 'active' : ''}}"><a href="{{route('generalIndex')}}"> General Setting </a></li> 
                        @endcan   
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</nav>