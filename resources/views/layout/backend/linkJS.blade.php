<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js') }}"></script>
<script src="{{ asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
@yield('vendorJS')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/scripts/configs/vertical-menu-light.min.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/components.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/footer.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('pageJS')
<!-- END: Page JS-->
