<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="sistema de gestão do shazzam">
    <meta name="author" content="Developers infosi">

    <title>@yield('titulo') - Gestão do shazzam</title>

    {{-- sweetalert --}}
    <link rel="stylesheet" href="/css/sweetalert2.css">
    <script src="/js/sweetalert2.all.min.js"></script>


    {{-- Editor de Texto Ckeditor --}}
    <script src="/ckeditor/ckeditor.js"></script>

    <!-- plugins:css -->
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/dashboard/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->

    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/dashboard/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="/dashboard/css/shared/style.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="/dashboard/css/demo_1/style.css">
    <!-- End Layout styles -->

    <link rel="shortcut icon" href="/dashboard/images/favicon.ico" />

</head>

<body>

    <div class="container-scroller">

        @include('layouts._includes.dashboard.Navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
