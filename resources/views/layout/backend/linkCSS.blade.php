<link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
    rel="stylesheet">
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
@yield('vendorCSS')
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.min.css') }}">
<!-- END: Theme CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
@yield('pageCSS')
<!-- END: Page CSS-->
