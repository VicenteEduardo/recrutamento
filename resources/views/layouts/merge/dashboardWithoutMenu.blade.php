<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="sistema de gestão do shazzam">
    <meta name="author" content="Developers vicente Eduardo">

    <title>@yield('titulo') - Gestão do shazzam</title>


    <!-- plugins:css -->
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dashboard/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/dashboard/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->

    <!-- inject:css -->
    <link rel="stylesheet" href="/dashboard/css/shared/style.css">
    <!-- endinject -->

    <link rel="shortcut icon" href="/dashboard/images/favicon.ico" />

</head>
<body>

<div class="container-scroller">

@yield('content')
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/dashboard/vendors/js/vendor.bundle.base.js"></script>
<script src="/dashboard/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->


<!-- inject:js -->
<script src="/dashboard/js/shared/off-canvas.js"></script>
<script src="/dashboard/js/shared/misc.js"></script>
<!-- endinject -->

</body>

</html>
