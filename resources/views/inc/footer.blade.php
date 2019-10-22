<!-- Vendor -->
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery/jquery.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/ios7-switch/ios7-switch.js"></script>

<!-- Specific Page Vendor -->
<script src="{{URL::to('/')}}/theme/assets/vendor/iziToast/dist/js/iziToast.min.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/select2/select2.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-appear/jquery.appear.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/flot/jquery.flot.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/flot/jquery.flot.pie.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/flot/jquery.flot.categories.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/flot/jquery.flot.resize.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/raphael/raphael.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/morris/morris.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/gauge/gauge.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/snap-svg/snap.svg.js"></script>
<script src="{{URL::to('/')}}/theme/assets/vendor/liquid-meter/liquid.meter.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{URL::to('/')}}/theme/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="{{URL::to('/')}}/theme/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="{{URL::to('/')}}/theme/assets/javascripts/theme.init.js"></script>

{{-- Theme Fileupload --}}
<script src="{{URL::to('/')}}/theme/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Examples -->

<script type="text/javascript">
    const _TOKEN = $('meta[name="csrf-token"]').attr('content');
			// const _APP_URL = "{{URL::to('/')}}";
			const _APP_URL = "{{url('/')}}";
</script>

<script src="{{URL::to('/')}}/scripts/helper/index.js"></script>

@yield('custom-script')