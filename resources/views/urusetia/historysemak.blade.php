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
                        @if (session('success'))
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
                        @endif

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"> Sejarah Semakan Oleh Urusetia</h4>
                                    <form action="{{ route('permohonan.reportUrusetia') }}" method="GET">
                                        <div class="form-group row">
                                            <label for="no_kp" class="col-sm-10 col-form-label">Sila Masukkan Kad
                                                Pengenalan:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_kp" id="no_kp"
                                                    value="{{ request('no_kp') }}" placeholder="Search here">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Cari</button>
                                    </form>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        Info Pemohon
                                                    </th>
                                                    <th>
                                                        Status Pemohonan
                                                    </th>
                                                    <th>
                                                        Info Pemohon
                                                    </th>
                                                    {{-- <th>Hantar Emel</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permohonanAssociate as $index => $p)
                                                    <tr>
                                                        <td>
                                                            {{ $permohonanAssociate->firstItem() + $index }}
                                                        </td>
                                                        <td>
                                                            <strong>Nama Pemohon : {{ $p->profiles->name }} <br><br>
                                                                KP
                                                                : {{ $p->profiles->no_kp }} <br><br> No.HP :
                                                                {{ $p->profiles->no_hp }} <br><br> Emel :
                                                                {{ $p->profiles->email }}</strong>
                                                        </td>
                                                        <td>
                                                            @if ($p->status_permohonan_id == 2)
                                                                <label
                                                                    class="badge badge-info">{{ $p->status_name->name }}</label>
                                                            @elseif ($p->status_permohonan_id == 3)
                                                                <label
                                                                    class="badge badge-warning">{{ $p->status_name->name }}</label>
                                                            @elseif ($p->status_permohonan_id == 1)
                                                                <label
                                                                    class="badge badge-success">{{ $p->status_name->name }}</label>
                                                            @elseif ($p->status_permohonan_id == 4)
                                                                <label
                                                                    class="badge badge-danger">{{ $p->status_name->name }}</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('permohonan.semak', ['id' => $p->id]) }}"
                                                                class="btn btn-primary">Detail Permohonan</a>
                                                        </td>
                                                        {{-- @if ($p->status_permohonan_id == 1 || $p->status_permohonan_id == 4)
                                                                <td>
                                                                    <div>
                                                                        <form
                                                                            action="{{ route('permohonan.notifypemohon', ['id' => $p->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Send Emel Kepada
                                                                                Pemohon</button>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            @endif --}}
                                                    </tr>
                                                @endforeach
                                                {{-- @endif --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $permohonanAssociate->appends(request()->query())->links('pagination::bootstrap-4') }}
                                    </div>
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
