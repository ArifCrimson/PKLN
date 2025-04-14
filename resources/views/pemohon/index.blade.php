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
                                    <h4 class="card-title">Senarai Profile </h4>
                                    <p class="card-description">
                                        {{-- Add class <code>.table-bordered</code> --}}
                                    </p>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        Profile
                                                    </th>
                                                    {{-- <th>
                                                        Nama Portfolio
                                                    </th> --}}
                                                    {{-- <th>
                                                        Panggilan
                                                    </th> --}}
                                                    {{-- <th>
                                                        IC
                                                    </th>
                                                    <th>
                                                        Emel
                                                    </th>
                                                    <th>
                                                        No.Telefon
                                                    </th>
                                                    <th>
                                                        YB Category
                                                    </th> --}}
                                                    {{-- <th>
                                                        Jawatan Hakiki
                                                    </th>
                                                    <th>
                                                        Gelaran di Jabatan
                                                    </th>
                                                    <th>
                                                        Alamat 1
                                                    </th>
                                                    <th>
                                                        Alamat 2
                                                    </th>
                                                    <th>
                                                        Alamat 3
                                                    </th> --}}
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($profiles as $p)
                                                    <tr>
                                                        <td>
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <strong>Nama : </strong>{{ $p->name }} <br><br>
                                                            <strong>IC : </strong>{{ $p->no_kp }} <br><br>
                                                            <strong>Emel : </strong>{{ $p->email }} <br><br>
                                                            <strong>No HP : </strong> {{$p->no_hp}}
                                                        </td>
                                                        {{-- <td>
                                                            {{ $p->portfolio_name }}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{ $p->panggilan->name }}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{ $p->no_kp }}
                                                        </td>
                                                        <td>
                                                            {{ $p->email }}
                                                        </td>
                                                        <td>
                                                            {{ $p->no_hp }}
                                                        </td>
                                                        <td>
                                                            {{ $p->yb_categories->name }}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{ $p->jawatan_hakiki }}
                                                        </td>
                                                        <td>
                                                            {{ $p->gelaran_di_jawatan }}
                                                        </td> --}}
                                                        {{-- <td>
                                                            {{ $p->address_1 }}
                                                        </td>
                                                        <td>
                                                            {{ $p->address_2 }}
                                                        </td>
                                                        <td>
                                                            {{ $p->address_3 }}
                                                        </td> --}}
                                                        <td>
                                                            {{-- <button type="button" class="btn btn-primary">View</button> --}}
                                                            <a href="{{ route('userprofile.show', ['id' => $p->id]) }}"
                                                                class="btn btn-primary">
                                                                View
                                                            </a>
                                                            <a href="{{ route('userprofiles.edit', ['id' => $p->id]) }}"
                                                                class="btn btn-primary">
                                                                Edit
                                                            </a>
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $p->id }}"
                                                                data-action="{{ route('userprofile.delete', ['id' => $p->id]) }}">
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
                                                                    {{ $p->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('userprofile.delete', ['id' => $p->id]) }}"
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
                                        {{ $profiles->links('pagination::bootstrap-5') }}
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
