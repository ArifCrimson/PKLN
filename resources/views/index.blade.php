@include('partials.header')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('partials.sidebar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row transparent">
                        @role('admin')
                            <div class="col-sm-6 col-lg-3 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Total User</p>
                                        <p class="fs-30 mb-2 text-center">{{ $totalUser }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Approved</p>
                                        <p class="fs-30 mb-2 text-center">{{ $totalApproved }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Declined</p>
                                        <p class="fs-30 mb-2 text-center">{{ $totalDeclined }}</p>
                                    </div>
                                </div>
                            </div>
                        @endrole
                        <div class="col-sm-6 col-lg-3 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Permohonan Hari ini</p>
                                    <p class="fs-30 mb-2 text-center">{{ $todayCreated }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-4 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Permohonan Bulan ini</p>
                                    <p class="fs-30 mb-2 text-center">{{ $todayCreatedMonth }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <p class="card-title mb-0">Senarai Permohonan</p> <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Profile Info</th>
                                        <th>Permohonan Status</th>
                                        <th>Date Permohonan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permohonanAssociate as $p)
                                        <tr>
                                            <td>
                                                <strong>Nama : </strong>{{ $p->profiles->name }} <br>
                                                <strong>Emel : </strong>{{ $p->profiles->email }} <br>
                                                <strong>No.KP : </strong>{{ $p->profiles->no_kp }}
                                            </td>
                                            <td>
                                                @if ($p->status_permohonan_id == 2)
                                                    <div class="badge badge-info">{{ $p->status_name->name }}</div>
                                                @elseif($p->status_permohonan_id == 3)
                                                    <div class="badge badge-warning">{{ $p->status_name->name }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="font-weight-medium">
                                                <div class="">{{ $p->created_at }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th,
                    td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    td:first-child {
                        width: 40%;
                    }

                    .badge {
                        padding: 4px 8px;
                        border-radius: 4px;
                    }
                </style>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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
