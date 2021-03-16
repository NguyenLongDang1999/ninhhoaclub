<!DOCTYPE html>

<html class="loading" lang="vi" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>NinhHoaClub - @yield('title')</title>

    {{-- linkCSS --}}
    @include('layout.backend.linkCSS')
    {{-- end linkCSS --}}
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layout.backend.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layout.backend.navbar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('content-header')
            </div>
            <div class="content-body">
                @yield('content-body')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('layout.backend.footer')
    <!-- END: Footer-->

    {{-- linkJS --}}
    @include('layout.backend.linkJS')
    {{-- end linkJS --}}

</body>
<!-- END: Body-->

</html>
