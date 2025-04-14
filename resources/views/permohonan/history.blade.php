@include('partials.header')

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Sejarah Permohonan Pemohon </h4>
                                    <form action="{{ route('permohonan.report') }}" method="GET">
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
                                                    {{-- <th>
                                                        Tempoh Lawatan Bermula dan Tamat
                                                    </th>
                                                    <th>
                                                        Tarikh Kembali Bertugas
                                                    </th>
                                                    <th>
                                                        Jumlah Hari Cuti
                                                    </th>
                                                    <th>
                                                        Negara Yang Dilawat
                                                    </th>
                                                    <th>
                                                        Tujuan Lawatan
                                                    </th>
                                                    <th>
                                                        Alamat Bercuti
                                                    </th> --}}
                                                    <th>
                                                        Detail
                                                    </th>
                                                    <th>
                                                        Status Permohonan
                                                    </th>
                                                    <th>Tarikh Permohonan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permohonanAssociate as $index => $p)
                                                    <tr>
                                                        <td> {{ $permohonanAssociate->firstItem() + $index }} </td>
                                                        <td> <strong>Nama : {{ $p->profiles->name }}
                                                                <br><br> KP : {{ $p->profiles->no_kp }} <br><br>
                                                                Emel :
                                                                {{ $p->profiles->email }} <br><br> No.HP :
                                                                {{ $p->profiles->no_hp }}</strong> </td>
                                                        {{-- <td> {{ $p->tempoh_lawatan_start }} -
                                                                {{ $p->tempoh_lawatan_end }} </td>
                                                            <td> {{ $p->tarikh_kembali }}</td>
                                                            <td> {{ $p->jumlah_hari }}</td>
                                                            <td> {{ $p->negara->name }} </td>
                                                            <td> {{ $p->tujuan_lawatan }} </td>
                                                            <td> {{ $p->address_1 }} </td> --}}
                                                        <td>
                                                            <a href="{{ route('permohonan.semak', ['id' => $p->id]) }}"
                                                                class="btn btn-primary">Detail Permohonan</a>
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
                                                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $permohonanAssociate->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        {{-- {{ $permohonanAssociate->appends(request()->query())->links() }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('partials.footer')
                <style>
                    .table td,.table th{
                        white-space: normal !important;
                        word-wrap: break-word;
                    }
                </style>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('partials.plugins')
</body>

</html>
