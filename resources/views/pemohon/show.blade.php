@include('partials.header')
<style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }
</style>

<body>

    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('partials.navbar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            {{-- @include('partials.settingspanel') --}}
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Personal Info</h4>
                                    <hr>
                                    {{-- <div class="row mb-2">
                                        <div class="col-4"><strong>Gambar profil:</strong></div>
                                        <div class="col-8"><img
                                                src="{{ asset('storage/photo-user/' . $profile->gambar_attach_1) }}"
                                                alt=""></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Name:</strong></div>
                                        <div class="col-8">{{ $profile->name }}</div>
                                    </div> --}}
                                    <p><strong>Gambar profil:</strong>
                                    <div><img src="{{ asset('storage/photo-user/' . $profile->gambar_attach_1) }}"
                                            alt=""></div>
                                    </p>
                                    <p><strong>Nama Penuh:</strong>
                                        {{ $profile->name }}
                                    </p>
                                    <p><strong>Nama Portfolio:</strong>
                                        {{ $profile->portfolio_name }}
                                    </p>
                                    <p><strong>No Kad Pengenalan:</strong>
                                        {{ $profile->no_kp }}
                                    </p>
                                    <p><strong>Emel:</strong>
                                        {{ $profile->email }}
                                    </p>
                                    <p><strong>No Telefon:</strong>
                                        {{ $profile->no_hp }}
                                    </p>
                                </div><br>
                                <div class="card-body text-center">
                                    <h4 class="card-title">Info Pekerjaan Jabatan</h4>
                                    <hr>
                                    {{-- <div class="row mb-2">
                                        <div class="col-4"><strong>Gambar profil:</strong></div>
                                        <div class="col-8"><img
                                                src="{{ asset('storage/photo-user/' . $profile->gambar_attach_1) }}"
                                                alt=""></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Name:</strong></div>
                                        <div class="col-8">{{ $profile->name }}</div>
                                    </div> --}}
                                    
                                    <p><strong>Panggilan di jabatan:</strong>
                                        {{ $profile->panggilan->name }}
                                    </p>
                                    <p><strong>Kategori YB:</strong>
                                        {{ $profile->yb_categories->name }}
                                    </p>
                                    <p><strong>Jawatan Hakiki:</strong>
                                        {{ $profile->jawatan_hakiki }}
                                    </p>
                                    <p><strong>Gelaran:</strong>
                                        {{ $profile->gelaran_di_jawatan }}
                                    </p>
                                </div><br>
                                <div class="card-body text-center">
                                    <h4 class="card-title">Senarai Alamat</h4>
                                    <hr>
                                    {{-- <div class="row mb-2">
                                        <div class="col-4"><strong>Gambar profil:</strong></div>
                                        <div class="col-8"><img
                                                src="{{ asset('storage/photo-user/' . $profile->gambar_attach_1) }}"
                                                alt=""></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Name:</strong></div>
                                        <div class="col-8">{{ $profile->name }}</div>
                                    </div> --}}
                                    
                                    <p><strong>Alamat 1:</strong>
                                        {{ $profile->address_1 }}
                                    </p>
                                    <p><strong>Alamat 2:</strong>
                                        {{ $profile->address_2 }}
                                    </p>
                                    <p><strong>Alamat 3:</strong>
                                        {{ $profile->address_3 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('partials.plugins')
</body>

</html>
