@include('partials.header')

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
                    <div class="row">
                        @include('sweetalert::alert')


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


                        {{-- @if (session('success'))

                        <div class="alert alert-message">
                            {{session('success')}}
                        </div>
                            
                        @endif --}}


                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Masukkan Maklumat Profil Baru</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="form-sample" action="{{ route('userprofiles.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <p class="card-description">
                                            Maklumat Pemohon
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Penuh</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="fname"
                                                            placeholder="Sila isi nama penuh anda"
                                                            value="{{ old('fname') }}" />
                                                        @error('fname')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Portfolio</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="portname"
                                                            placeholder="Sila isi nama portfolio anda"
                                                            value="{{ old('portname') }}" />
                                                        @error('portname')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Panggilan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="panggilan">
                                                            <option value="">Pilih Panggilan</option>
                                                            @foreach ($panggilan as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('panggilan') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panggilan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Panggilan</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="panggilan">
                                                            <option value="">Pilih Panggilan</option>
                                                            @foreach ($panggilan as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('panggilan') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panggilan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No Kad Pengenalan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ic"
                                                            placeholder="tanpa '-' contoh: 033331112334"
                                                            value="{{ old('ic') }}" />
                                                        @error('ic')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-sm-9">
                                                        <select class="form-control">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Emel</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="adam123@gmail.com"
                                                            value="{{ old('email') }}" />
                                                        @error('email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No.Telefon</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="0119999888" value="{{ old('phone') }}" />
                                                        @error('phone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">YB Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="yb_categories_id">
                                                            <option value="">Pilih Kategori YB</option>
                                                            @foreach ($ybcategories as $yb)
                                                                <option value="{{ $yb->id }}"
                                                                    {{ old('yb_categories_id') == $yb->id ? 'selected' : '' }}>
                                                                    {{ $yb->name }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('yb_categories_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">YB Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100"
                                                            name="yb_categories_id">
                                                            <option value="">Pilih Kategori YB</option>
                                                            @foreach ($ybcategories as $yb)
                                                                <option value="{{ $yb->id }}"
                                                                    {{ old('yb_categories_id') == $yb->id ? 'selected' : '' }}>
                                                                    {{ $yb->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('yb_categories_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jawatan Hakiki</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" placeholder="Jawatan"
                                                            name="jawatan" value="{{ old('jawatan') }}" />
                                                        @error('jawatan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gelaran di Jabatan</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" placeholder="Gelaran"
                                                            name="gelaran" value="{{ old('gelaran') }}" />
                                                        @error('gelaran')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control">
                                                            <option>Category1</option>
                                                            <option>Category2</option>
                                                            <option>Category3</option>
                                                            <option>Category4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div> --}}
                                        <p class="card-description">
                                            Address
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat 1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="alamat1"
                                                            value="{{ old('alamat1') }}" />
                                                        @error('alamat1')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat 2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            placeholder="optional" name="alamat2"
                                                            value="{{ old('alamat2') }}" />
                                                        @error('alamat2')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat 3</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            placeholder="optional" name="alamat3"
                                                            value="{{ old('alamat3') }}" />
                                                        @error('alamat3')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gambar</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control"
                                                            placeholder="optional" name="gambar_attach_1" />
                                                        @error('gambar_attach_1')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="img[]" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info"
                                                        disabled placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary"
                                                            type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-icon-text">
                                            <i class="ti-file btn-icon-prepend"></i>
                                            Submit Pemohon
                                        </button>

                                        {{-- <div class="row"> --}}

                                        {{-- <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Country</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control">
                                                            <option>America</option>
                                                            <option>Italy</option>
                                                            <option>Russia</option>
                                                            <option>Britain</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        {{-- </div> --}}
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
</body>

</html>
