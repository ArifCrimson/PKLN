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
                                    <div><img
                                            src="{{ asset('storage/photo-user/' . $permohonan->profiles->gambar_attach_1) }}"
                                            alt=""></div>
                                    </p>
                                    <p><strong>Nama Penuh:</strong>
                                        {{ $permohonan->profiles->name }}
                                    </p>
                                    <p><strong>No Kad Pengenalan:</strong>
                                        {{ $permohonan->profiles->no_kp }}
                                    </p>
                                    <p><strong>Emel:</strong>
                                        {{ $permohonan->profiles->email }}
                                    </p>
                                    <p><strong>No Telefon:</strong>
                                        {{ $permohonan->profiles->no_hp }}
                                    </p>
                                </div><br>
                                <div class="card-body text-center">
                                    <h4 class="card-title">Maklumat Perjalanan Ke Luar Negara</h4>
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

                                    <p><strong>Tempoh Cuti Bermula dan Tamat :</strong>
                                        <td> {{ $permohonan->tempoh_lawatan_start }} hingga
                                            {{ $permohonan->tempoh_lawatan_end }} </td>
                                    </p>
                                    <p><strong>Jumlah Hari Cuti :</strong>
                                        {{ $permohonan->jumlah_hari }}
                                    </p>
                                    <p><strong>Tarikh Kembali Bertugas :</strong>
                                        {{ $permohonan->tarikh_kembali }}
                                    </p>
                                    <p><strong>Negara yang Dilawat :</strong>
                                        {{ $permohonan->negara->name }}
                                    </p>
                                    <p><strong>Tujuan Bercuti/Lawatan:</strong>
                                        {{ $permohonan->tujuan_lawatan }}
                                    </p>
                                    <p><strong>Alamat :</strong>
                                        {{ $permohonan->address_1 }}
                                    </p>
                                    @if ($permohonan->status_permohonan_id == 4)
                                        <p><strong>Catatan Pelulus: {{ $permohonan->catatan_pelulus }}</strong></p>
                                    @endif
                                </div><br>
                                @if ($permohonan->status_permohonan_id == 2)
                                    <div class="card-body text-center">
                                        <hr>
                                        <p><strong>TINDAKAN</strong></p>
                                        <form action="{{ route('permohonan.urusetiaterima', $permohonan->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-primary btn-rounded btn-fw">Terima</button>
                                            {{-- <a href="" class="btn btn-danger btn-rounded btn-fw">Tolak</a> --}}
                                        </form>
                                        <form action="{{ route('permohonan.urusetiamenolak', $permohonan->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <br><br>
                                            <div class="form-group mt-3">
                                                <label for="exampleTextarea1">Catatan(optional) :</label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Sila isikan nama dengan betul"
                                                    name="catatan_urusetia"></textarea>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-danger btn-rounded btn-fw">Menolak</button>
                                        </form>
                                    </div>
                                @endif

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
