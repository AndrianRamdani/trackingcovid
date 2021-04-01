<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a class="c-sidebar-nav-link {{ request()->is('admin/') ? 'c-active' : '' }}"
                        href="{{ url('/admin') }}">
                            <!-- <img src="../focus/images/logo.png" alt="" /> --><span>Data Coronavirus</span></a></div>
                    <li><a class="sidebar-sub-toggle"><i class="ti-home"></i> Indonesia<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{route ('provinsi.index')}}">Provinsi</a></li>
                            <li><a href="{{route ('kota.index')}}">Kota</a></li>
                            <li><a href="{{route ('kecamatan.index')}}">Kecamatan</a></li>
                            <li><a href="{{route ('kelurahan.index')}}">Kelurahan</a></li>
                            <li><a href="{{route ('rw.index')}}">Rw</a></li>
                            <li><a href="{{route ('tracking.index')}}">Tracking</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role == 'Petugas')
                    @else
                    <li><a href="{{ route('users.index') }}"><i class="ti-user"></i> User Management<span
                        class="sidebar-collapse-icon "></span></a>
                    @endif
                </ul>
            </div>
        </div>
    </div>