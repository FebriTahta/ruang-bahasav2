<!--Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">a</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="/">
                        <i class="si si-fire text-primary"></i>
                        <span class="font-size-xl text-dual-primary-dark">ruang</span><span class="font-size-xl text-primary">bahasa</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="be_pages_generic_profile.html">
                    <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html">{{ auth()->user()->name }}</a>
                    </li>                    
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{ 'logout' }}">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>                    
                    <a href="{{ route('dashboard') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Papan Instrumen</span></a>                    
                    <a href="{{ route('forums') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Forum Diskusi</span></a>
                    @if (auth()->user()->role=='admin')
                    <a href="{{ route('news') }}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Berita</span></a>
                    @endif                    
                </li>                
                <li class="nav-main-heading"><span class="sidebar-mini-visible">MU</span><span class="sidebar-mini-hidden">Menu Utama</span></li>                            
                <li class="open">                                
                    <ul>                                    
                        <li>
                            @if (auth()->user()->role=='admin')
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">PENGATURAN</span></a>
                            <ul>
                                <li>
                                    <a href="{{ route('daftar_user.index') }}">daftar pengguna</a>
                                </li>
                                <li>
                                    <a href="{{ route('daftarKategori') }}">daftar Pelajaran</a>
                                </li>
                                <li>
                                    <a href="{{ route('daftarKursus') }}">daftar kelas</a>
                                </li>
                                <li>
                                    <a href="{{ route('slides') }}">daftar slider</a>
                                </li>
                                <li>
                                    <a href="{{ route('aboutUs') }}">tentang kami</a>
                                </li>
                            </ul>
                            @endif
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">KONTEN</span></a>
                            <ul>
                                @if (auth()->user()->role=='admin')                                
                                <li>
                                    <a href="{{ route('my-video') }}">Daftar Vidio</a>
                                </li>
                                <li>
                                    <a href="{{ route('my-book') }}">Daftar Artikel</a>
                                </li>
                                <li>
                                    <a href="{{ route('my-kuis') }}">Daftar Kuis</a>
                                </li>
                                
                                @else
                                <li>
                                    <a href="{{ route('my-kursus') }}">Kelas Saya</a>
                                </li>
                                <li>
                                    <a href="{{ route('my-video') }}">Vidio Saya</a>
                                </li>
                                <li>
                                    <a href="{{ route('my-book') }}">Artikel Saya</a>
                                </li>
                                <li>
                                    <a href="{{ route('my-kuis') }}">Kuis Saya</a>
                                </li>                                
                                @endif
                            </ul>
                        </li>                                                                                                                                                
                    </ul>
                </li>                                                                                       
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->