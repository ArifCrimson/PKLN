@include('partials.header')

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            {{-- @include('partials.settingspanel') --}}
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Permohonan MMKN dan ADUN ke Luar Negara</h4>
                                    <p class="card-description">
                                        {{-- Basic form elements --}}
                                    </p>
                                    <form class="forms-sample" id=""
                                        action="{{ route('permohonan.update', ['id' => $permohonan->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Sila Pilih Profile Pemohon</label>
                                            <select class="js-example-basic-single w-100" id="selectProfile"
                                                name="profil">
                                                <option value="">Pilih Profile</option>
                                                @foreach ($profiles as $p)
                                                    <option
                                                        value="{{ $p->id }}"{{ $permohonan->profiles_id == $p->id ? 'selected' : '' }}
                                                        data-fname="{{ $p->name }}" data-ic="{{ $p->no_kp }}"
                                                        data-email="{{ $p->email }}"
                                                        data-phone="{{ $p->no_hp }}">{{ $p->name }}
                                                        ({{ $p->no_kp }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Penuh</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="fname" id="fname"
                                                            class="form-control" value="{{ $p->name }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No.Kad Pengenalan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="ic" id="ic"
                                                            class="form-control" value="{{ $p->no_kp }}"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" value="{{ $p->email }}"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No.Telefon</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phone" id="phone"
                                                            class="form-control" value="{{ $p->no_hp }}"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tempoh Lawatan</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tempohLawatan" class="form-control"
                                                            value="{{ $permohonan->tempoh_lawatan_start }}" />
                                                        @error('tempohLawatan')
                                                            <div>
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Hingga</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control"
                                                            name="tempohLawatantamat" id="tempohLawatantamat"
                                                            value="{{ $permohonan->tempoh_lawatan_end }}" />
                                                        @error('tempohLawatantamat')
                                                            <div>
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jumlah Hari Bercuti</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="jumlahcuti" class="form-control"
                                                            value="{{ $permohonan->jumlah_hari }}" />
                                                        @error('jumlahcuti')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tarikh kembali
                                                        bertugas</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="tarikhback"
                                                            value="{{ $permohonan->tarikh_kembali }}" id="tarikh_balik"/>
                                                        @error('tarikhback')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Negara yang dilawati</label>
                                            <select class="js-example-basic-single w-100" placeholder="Location"
                                                name="negara">
                                                <option value="">Sila Pilih Negara</option>
                                                @foreach ($negara as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $permohonan->negara_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                                @error('negara')
                                                    <div>
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Tujuan Lawatan</label>
                                            <input type="text" class="form-control" id="exampleInputCity1"
                                                placeholder="Bercuti" name="tujuan"
                                                value="{{ $permohonan->tujuan_lawatan }}">
                                            @error('tujuan')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 1</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat">{{ $permohonan->address_1 }}</textarea>
                                            @error('alamat')
                                                <div>
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 2 (Optional)</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat2">{{ $permohonan->address_2 }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 3 (Optional)</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat3">{{ $permohonan->address_3 }}</textarea>
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                $('#selectProfile').on('change', function() {
                                                    var selectedProfile = $(this).find(':selected');
                                                    $('#fname').val(selectedProfile.data('fname'));
                                                    $('#ic').val(selectedProfile.data('ic'));
                                                    $('#email').val(selectedProfile.data('email'));
                                                    $('#phone').val(selectedProfile.data('phone'));
                                                });

                                                $('#selectProfile').trigger('change');
                                            });

                                            $(document).ready(function() {
                                                $('#tempohLawatantamat').change(function() {
                                                    var StartDate = new Date($('#tempohLawatantamat').val());
                                                    var EndDate = new Date(StartDate);
                                                    EndDate.setDate(StartDate.getDate() + 1);

                                                    var endDateFormatted = EndDate.toISOString().slice(0, 10);
                                                    $('#tarikh_balik').val(endDateFormatted);
                                                });
                                            });
                                        </script>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>


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
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('partials.plugins')
    <!-- End custom js for this page-->
</body>

</html>
