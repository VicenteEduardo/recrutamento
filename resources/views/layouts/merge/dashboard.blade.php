@include('layouts._includes.dashboard.Header')
@include('layouts._includes.dashboard.Menu')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        @yield('content')

    </div>
    <!-- content-wrapper ends -->

    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Todos os Direitos Reservados ao
                <a href="#!" target="_blank">
                    SGCC
                </a>
                ©
                {{ date('Y') }}
            </span>
        </div>
    </footer>
    <!-- partial -->

</div>


@include('layouts._includes.dashboard.Footer')
