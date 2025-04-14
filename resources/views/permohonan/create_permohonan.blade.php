@include('partials.header')

<body>
    @include('sweetalert::alert')
    
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
                        {{-- @if (session('success'))
                            <div id="flash-message-container" class="position-fixed top-0 start-50 translate-middle-x"
                                style="z-index: 1000; display: none;">
                                <div id="flash-message" class="alert alert-success alert-dismissible fade show"
                                    role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                            </div>
                            <script>
                                // Show the flash message
                                function showFlashMessage(message) {
                                    $('#flash-message').html(message);
                                    $('#flash-message-container').fadeIn().delay(3000).fadeOut();
                                }

                                // Example usage
                                $(document).ready(function() {
                                    showFlashMessage('{{ session('success') }}');
                                });
                            </script>
                            <style>
                                #flash-message-container {
                                    max-width: 400px;
                                    padding: 15px;
                                    border-radius: 5px;
                                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                    background-color: #f0f0f0;
                                }
                            </style>
                        @endif --}}
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Permohonan Perjalanan Ahli Majlis Mesyuarat Kerajaan Negeri
                                        dan ADUN Ke Luar Negara Atas Urusan Persendirian</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="forms-sample" id="" action="{{ route('permohonan.store') }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Sila Pilih Profile Pemohon</label>
                                            <select class="js-example-basic-single w-100" id="selectProfile"
                                                name="profil">
                                                <option value="">Pilih Profile</option>
                                                @foreach ($profiles as $p)
                                                    <option value="{{ $p->id }}" data-fname="{{ $p->name }}"
                                                        data-ic="{{ $p->no_kp }}" data-email="{{ $p->email }}"
                                                        data-phone="{{ $p->no_hp }}">{{ $p->name }}
                                                        ({{ $p->no_kp }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('profil')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Penuh</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="fname" id="fname"
                                                            class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No.Kad Pengenalan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="ic" id="ic"
                                                            class="form-control" readonly />
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
                                                            class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No.Telefon</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phone" id="phone"
                                                            class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tempoh
                                                        Lawatan/Bercuti</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tempohLawatan"
                                                            class="form-control" />
                                                        @error('tempohLawatan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Hingga</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control"
                                                            name="tempohLawatantamat" id="tempohLawatantamat" />
                                                        @error('tempohLawatantamat')
                                                            <div class="alert alert-danger">{{ $message }}</div>
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
                                                        <input type="number" name="jumlahcuti"
                                                            class="form-control" />
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
                                                            id="tarikh_balik" />
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
                                                        {{ old('negara') == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('negara')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Tujuan Lawatan</label>
                                            <input type="text" class="form-control" id="exampleInputCity1"
                                                placeholder="Bercuti" name="tujuan">
                                            @error('tujuan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 1</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat"></textarea>
                                            @error('alamat')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 2 (Optional)</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Alamat semasa bercuti 3 (Optional)</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="Taman Permint 4, Kuala Terengganu"
                                                name="alamat3"></textarea>
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
                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail3">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail3"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword4"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Gender</label>
                                            <select class="form-control" id="exampleSelectGender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img[]" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled
                                                    placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">City</label>
                                            <input type="text" class="form-control" id="exampleInputCity1"
                                                placeholder="Location">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Textarea</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                        </div> --}}
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
