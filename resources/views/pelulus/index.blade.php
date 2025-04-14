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
                                    <h4 class="card-title">Kelulusan Pelulus</h4>
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
                                                        Info Pemohon
                                                    </th>
                                                    <th>Status Urusetia</th>
                                                    <th>
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $counter = 1;
                                                @endphp
                                                @foreach ($permohonan as $index => $p)
                                                    @if ($p->status_permohonan_id == 3)
                                                        <tr>
                                                            <td> {{ $permohonan->firstItem() + $index }} </td>
                                                            <td> <strong>Nama : {{ $p->profiles->name }} <br><br> No.KP
                                                                    : {{ $p->profiles->no_kp }} <br><br> Emel :
                                                                    {{ $p->profiles->email }} <br><br> No.HP :
                                                                    {{ $p->profiles->no_hp }}</strong></td>
                                                            <td>{{ $p->status }}</td>
                                                            <td>
                                                                <a href="{{ route('permohonan.pelulussemak', ['id' => $p->id]) }}"
                                                                    class="btn btn-primary">Detail
                                                                    Permohonan</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
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
