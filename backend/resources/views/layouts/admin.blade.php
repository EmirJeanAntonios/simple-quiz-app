<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quiz App</title>
    
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">


    @yield('css')


    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">

    <link rel="shortcut icon" href="images/favicon.png" />

    <style>
        .swal2-container.swal2-center>.swal2-popup{
            padding: 30px !important;
        }
    </style>
</head>

<body class="sidebar-dark">
    <div class="container-scroller">

        @include('layouts.partials.header')

        <div class="container-fluid page-body-wrapper">


            @include('layouts.partials.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>


                @include('layouts.partials.footer')

            </div>

        </div>

    </div>



    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>


    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>



    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>


    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')

</body>

</html>
