<!--start: MAIN JAVASCRIPTS -->
{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('bower_components/components-modernizr/modernizr.js') !!}
{!! Html::script('bower_components/js-cookie/src/js.cookie.js') !!}
{!! Html::script('bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') !!}
{!! HTML::script('bower_components/switchery/dist/switchery.min.js') !!}
{!! Html::script('bower_components/jquery-fullscreen/jquery.fullscreen-min.js') !!}
{!! Html::script('bower_components/jquery.knobe/dist/jquery.knob.min.js') !!}
{!! Html::script('bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js') !!}
{!! Html::script('bower_components/slick.js/slick/slick.min.js') !!}
{!! Html::script('bower_components/jquery-numerator/jquery-numerator.js') !!}
{!! Html::script('bower_components/ladda/dist/spin.min.js') !!}
{!! Html::script('bower_components/ladda/dist/ladda.min.js') !!}
{!! Html::script('bower_components/ladda/dist/ladda.jquery.min.js') !!}

<!-- {!! Html::script('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}
{!! Html::script('assets/plugins/jquery-countto/jquery.countto.js') !!}
{!! Html::script('assets/plugins/jquery-sparkline/jquery.sparkline.js') !!}
{!! Html::script('assets/js/pages/widgets/infobox/infobox-2.js') !!}
{!! Html::script('assets/plugins/node-waves/waves.js') !!} -->
<!-- {!! Html::script('assets/js/admin.js') !!}
{!! Html::script('assets/js/demo.js') !!} -->
{!! Html::script('lib/jquery.dcjqaccordion.2.7.js') !!}
{!! Html::script('lib/jquery.sparkline.js') !!}
{!! Html::script('lib/jquery.scrollTo.min.js') !!}
{!! Html::script('lib/jquery.nicescroll.js') !!}
{!! Html::script('lib/common-scripts.js') !!}
{!! Html::script('lib/gritter/js/jquery.gritter.js') !!}
{!! Html::script('lib/gritter-conf.js') !!}
{!! Html::script('lib/zabuto_calendar.js') !!}
{!! Html::script('lib/jquery-ui-1.9.2.custom.min.js') !!}
{!! Html::script('lib/bootstrap-switch.js') !!}
{!! Html::script('lib/jquery.tagsinput.js') !!}
{!! Html::script('lib/bootstrap-inputmask/bootstrap-inputmask.min.js') !!}
{!! Html::script('lib/form-component.js') !!}
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('pagejs')

<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: JAVASCRIPTS -->
{!! Html::script('assets/js/main.js') !!}
<!-- end: JAVASCRIPTS -->
<script>
    // jQuery(document).ready(function () {
    //     setTimeout(function(){
    //         Main.init();
    //     },300); 
    // });
</script>
<!-- end: JavaScript Event Handlers for this page