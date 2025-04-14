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
                                    <form class="form-sample" action="{{route('userprofiles.update',['id' => $data->id])}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
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
                                                            value="{{ $data->name }}" />
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
                                                            value="{{ $data->portfolio_name }}" />
                                                        @error('portname')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Panggilan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="panggilan">
                                                            <option value="">Pilih Panggilan</option>
                                                            @foreach ($panggilan as $item)
                                                            {{-- <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option> --}}
                                                            <option value="{{$item->id}}" {{$data->panggilan_id == $item->id? 'selected' : ''}}>{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('panggilan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Panggilan</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="panggilan">
                                                            <option value="">Pilih Panggilan</option>
                                                            @foreach ($panggilan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('panggilan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">No Kad Pengenalan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ic"
                                                            placeholder="tanpa '-' contoh: 033331112334" value="{{ $data->no_kp }}" />
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
                                                            placeholder="adam123@gmail.com" value="{{ $data->email }}" />
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
                                                            placeholder="0119999888" value="{{ $data->no_hp }}" />
                                                        @error('phone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">YB Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="yb_categories_id">
                                                            <option value="">Pilih Kategori YB</option>
                                                            @foreach ($ybcategories as $yb)
                                                                {{-- <option value="{{ $yb->id }}">
                                                                    {{ $yb->name }}
                                                                </option> --}}
                                                                <option value="{{$yb->id}}" {{$data->yb_categories_id == $yb->id? 'selected' : ''}}>{{$yb->name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        @error('yb_categories_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">YB Category</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="yb_categories_id">
                                                            <option value="">Pilih Kategori YB</option>
                                                            @foreach ($ybcategories as $yb)
                                                                <option value="{{ $yb->id }}">
                                                                    {{ $yb->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('yb_categories_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jawatan Hakiki</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" placeholder="Jawatan"
                                                            name="jawatan" value="{{ $data->jawatan_hakiki }}"/>
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
                                                            name="gelaran" value="{{ $data->gelaran_di_jawatan }}" />
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
                                                        <input type="text" class="form-control" name="alamat1" value="{{ $data->address_1 }}" />
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
                                                            placeholder="optional" name="alamat2" value="{{ $data->address_2 }}"/>
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
                                                            placeholder="optional" name="alamat3" value="{{ $data->address_3 }}"/>
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
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-icon-text">
                                            <i class="ti-file btn-icon-prepend"></i>
                                            Submit Pemohon
                                        </button>
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
