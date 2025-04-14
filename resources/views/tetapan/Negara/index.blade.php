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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Senarai Negara </h4>
                                    <form action="" method="GET">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-10 col-form-label">Sila Masukkan Nama:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ request('name') }}" placeholder="Search here">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Cari</button>
                                    </form>
                                    <a href="{{ route('tetapannegara.create') }}" class="btn btn-primary">Create
                                        Negara</a> <br>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        Nama Negara
                                                    </th>
                                                    <th>
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($NegaraResult as $n)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <strong>Nama Negara: </strong>{{ $n->name }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('tetapannegara.show', ['id' => $n->id]) }}"
                                                                class="btn btn-primary">
                                                                View
                                                            </a>
                                                            <a href="{{ route('tetapannegara.edit', ['id' => $n->id]) }}"
                                                                class="btn btn-primary">
                                                                Edit
                                                            </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $n->id }}"
                                                                data-action="{{ route('tetapannegara.delete', ['id' => $n->id]) }}">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $n->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $n->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $n->id }}">Delete
                                                                        Confirmation</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete the profile for
                                                                    {{ $n->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('tetapannegara.delete', ['id' => $n->id]) }}"
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
                                        {{ $NegaraResult->appends(request()->query())->links('pagination::bootstrap-4') }}
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
<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var action = button.data('action'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('#deleteForm').attr('action', action);
    });
</script>
