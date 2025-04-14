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
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <style>
                            .table td,
                            .table th {
                                max-width: 300%;
                                /* Adjust the value to your needs */
                                /* white-space: nowrap; */
                                /* Prevent text from wrapping */
                                /* overflow: hidden; */
                                /* Hide the overflow text */
                                /* text-overflow: ellipsis; */
                                /* Show ellipsis (...) for overflow text */
                                /* word-wrap: break-word; */
                                /* Allow long words to break and wrap to the next line */
                                /* word-break: break-all; */
                                /* Break words at arbitrary points to prevent overflow */
                                white-space: normal;
                                /* Allow the text to wrap */
                            }
                        </style>

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

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Senarai Permohonan Pemohon </h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered table-responsive-sm ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        Info Pemohon
                                                    </th>
                                                    <th>
                                                        Tempoh
                                                    </th>
                                                    <th>
                                                        Alamat
                                                    </th>
                                                    {{-- <th>
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
                                                        Status Permohonan
                                                    </th>
                                                    <th>
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permohonanAssociate as $index => $p)
                                                    <tr>

                                                        <td> {{ $permohonanAssociate->firstItem() + $index }} </td>
                                                        <td class="wrap-text"> <strong>Nama : {{ $p->profiles->name }}
                                                                <br><br> KP : {{ $p->profiles->no_kp }} <br><br>
                                                                Emel :
                                                                {{ $p->profiles->email }} <br><br> No.HP :
                                                                {{ $p->profiles->no_hp }}</strong> </td>
                                                        <td><strong>Tempoh lawatan : </strong>
                                                            {{ $p->tempoh_lawatan_start }} -
                                                            {{ $p->tempoh_lawatan_end }} <br><br>
                                                            <strong>Tarikh kembali bertugas :
                                                            </strong>{{ $p->tarikh_kembali }} <br><br>
                                                            <strong>Jumlah Hari Cuti : </strong>{{ $p->jumlah_hari }}
                                                        </td>
                                                        <td class="wrap-text"><strong>Negara :
                                                            </strong>{{ $p->negara->name }} <br><br>
                                                            <strong>Tujuan Lawatan : </strong>{{ $p->tujuan_lawatan }}
                                                            <br><br>
                                                            <strong>Alamat : </strong>{{ $p->address_1 }}
                                                        </td>
                                                        {{-- <td> {{ $p->tarikh_kembali }}</td>
                                                            <td> {{ $p->jumlah_hari }}</td>
                                                            <td> {{ $p->negara->name }} </td>
                                                            <td> {{ $p->tujuan_lawatan }} </td>
                                                            <td> {{ $p->address_1 }} </td> --}}
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
                                                        <td>
                                                            <a href="{{ route('permohonan.edit', ['id' => $p->id]) }}"
                                                                class="btn btn-primary">
                                                                Edit
                                                            </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $p->id }}"
                                                                data-action="{{ route('permohonan.delete', ['id' => $p->id]) }}">
                                                                Delete
                                                            </button>
                                                        </td>

                                                        {{-- <td>
                                                                <button type="button" class="btn btn-primary">View</button>
    
                                                                <form
                                                                    action="{{ route('userprofile.delete', ['id' => $p->id]) }}"
                                                                    method="POST">
    
                                                                    <a href="{{ route('userprofiles.edit', ['id' => $p->id]) }}"
                                                                        class="btn btn-primary">
                                                                        Edit
                                                                    </a>
    
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal" data-target="#deleteModal"
                                                                        data-action="{{ route('userprofile.delete', ['id' => $p->id]) }}">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </td> --}}
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $p->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $p->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $p->id }}">Delete
                                                                        Confirmation</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete the profile for
                                                                    {{ $p->profiles->no_kp }}
                                                                    {{ $p->profiles->portfolio_name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('permohonan.delete', ['id' => $p->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $permohonanAssociate->links('pagination::bootstrap-4') }}
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
