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
                                    <form class="form-sample"
                                        action="{{ route('tetapanuser.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <p class="card-description">
                                            Maklumat Pengguna
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Pengguna</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Sila isi nama penuh anda"
                                                            value="{{ old('name', $user->name) }}" />
                                                        @error('name')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Emel Pengguna</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="email"
                                                            placeholder="adam123@gmail.com"
                                                            value="{{ old('email', $user->email) }}" />
                                                        @error('email')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Password Pengguna</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="password"
                                                             />
                                                        @error('password')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Pengesahan Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="password_confirmation"
                                                             />
                                                        @error('password_confirmation')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Peranan Pengguna</label>
                                                    <div class="col-sm-9">
                                                        <select name="roles[]" class="form-control" multiple required>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->name }}"
                                                                    {{ in_array($role->name, $userRoles) ? 'selected' : '' }}>
                                                                    {{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-icon-text">
                                            <i class="ti-file btn-icon-prepend"></i>
                                            Submit Pengguna
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
