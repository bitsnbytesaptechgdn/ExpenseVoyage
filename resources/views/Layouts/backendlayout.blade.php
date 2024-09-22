<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'ExpenseVoyage')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    @vite('resources/css/backend/vertical-layout-light/style.css')
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="container-scroller">
        @include('Components.backendcomponents.header')
        <div class="container-fluid page-body-wrapper">
            @include('Components.backendcomponents.sidebar')
            @yield('backend')
        </div>
    </div>
    <script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite([
        'resources/js/backend/dataTables.select.min.js',
        'resources/js/backend/off-canvas.js',
        'resources/js/backend/hoverable-collapse.js',
        'resources/js/backend/template.js',
        'resources/js/backend/settings.js',
        'resources/js/backend/todolist.js',
        'resources/js/backend/dashboard.js',
        'resources/js/backend/Chart.roundedBarCharts.js'
        ])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showAlert(type, title, text) {
    Swal.fire({
        icon: type,
        title: title,
        text: text,
        confirmButtonText: 'OK',
    });
}
@if(session('success'))
            showAlert('success', 'Good job!', "{{ session('success') }}");
        @endif

        @if(session('error'))
            showAlert('error', 'Oops...', "{{ session('error') }}");
        @endif

</script>
</body>

</html>