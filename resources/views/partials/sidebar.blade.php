<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @role('user')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Halaman Utama</span>
            </a>
        </li>
        @endrole
        @role('admin|urusetia|pelulus')
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Halaman Utama</span>
                </a>
            </li>
        @endrole
        @role('admin|urusetia|pelulus|user')
            <li class="nav-item">
                <a href="#profilemohon" class="nav-link" data-toggle="collapse" aria-expanded="false"
                    aria-controls="profilemohon">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Profile Pemohon</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="profilemohon">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userprofiles.create') }}">Cipta Profile </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userprofiles.index') }}">Senarai Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endrole
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Memohon</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('permohonan.create') }}">Buat
                            Permohonan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('permohonan.index') }}">Senarai
                            Permohonan</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permohonan.report') }}">Sejarah Permohonan</a>
                    </li>
                </ul>
            </div>
        </li>
        @role('admin|urusetia')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Semak Permohonan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('permohonan.terima') }}">Semak
                                Permohonan</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permohonan.reportUrusetia') }}">Sejarah
                                Semakan</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endrole

        @role('admin|pelulus')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Kelulusan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('permohonan.pelulusIndex') }}">Melulus
                                Permohonan</a></li>
                    </ul>
                </div>
            </li>
        @endrole

        @role('admin')
            <li class="nav-item">
                <a href="#tetapanuser" data-toggle="collapse" class="nav-link" aria-expanded="false"
                    aria-controls="tetapanuser">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tetapanuser">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tetapanuser.index')}}">Senarai User</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">Senarai Peranan User</a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="#tetapan" data-toggle="collapse" class="nav-link" aria-expanded="false"
                    aria-controls="tetapan">
                    <i class="icon-contract menu-icon"></i>
                    <span class="menu-title">Tetapan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tetapan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tetapanpanggilan.index')}}">Senarai Panggilan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tetapanybkategori.index')}}">Senarai Kategori YB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tetapannegara.index')}}">Senarai Negara</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endrole
    </ul>
</nav>
