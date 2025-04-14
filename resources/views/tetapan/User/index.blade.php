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
                                    <h4 class="card-title">Senarai Pengguna Sistem </h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered table-responsive-sm ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        Nama
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Peranan
                                                    </th>
                                                    <th>
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $index => $u)
                                                    <tr>

                                                        <td> {{ $users->firstItem() + $index }} </td>
                                                        <td class="wrap-text"> <strong>Nama : {{ $u->name }}</td>
                                                        <td class="wrap-text"> <strong>Emel : {{ $u->email }}</td>
                                                        <td class="wrap-text"> <strong>Peranan :
                                                                {{ implode(', ', $u->roles->pluck('name')->toArray()) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{route('tetapanuser.edit', ['id' => $u->id])}}"
                                                                class="btn btn-primary">
                                                                Edit
                                                            </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $u->id }}"
                                                                data-action="{{ route('tetapanuser.delete', ['id' => $u->id]) }}">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $u->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="deleteModalLabel{{ $u->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteModalLabel{{ $u->id }}">Delete
                                                                        Confirmation</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete the profile for
                                                                    {{ $u->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('tetapanuser.delete', ['id' => $u->id]) }}"
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
                                        {{ $users->links('pagination::bootstrap-4') }}
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
