    <!-- All JavaScript files
    ================================================== -->
    <script src="<?=$assets?>wedding/js/jquery.min.js"></script>
    <script src="<?=$assets?>wedding/js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

    <!-- Plugins for this template -->
    <script src="<?=$assets?>wedding/js/jquery-plugin-collection.js"></script>
    <script src="<?=$assets?>wedding/js/spirit.js"></script>

    <!-- Custom script for this template -->
    <script src="<?=$assets?>wedding/js/script.js"></script>

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })

            toastr.options = {
          "closeButton": true,
          "debug": false,
          "positionClass": "toast-top-center",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        </script>

        <script src="<?=$assets?>global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?=base_url().'__system/js/'. Pusaka\Encrypt::shortUrl(Pusaka\Encrypt::saveUrlEncode( 'controllers/__ui/core/scripts/ComponentEvent.js' )           )?>"></script>
        <script type="text/javascript" src="<?=base_url().'__system/js/'. Pusaka\Encrypt::shortUrl(Pusaka\Encrypt::saveUrlEncode( 'controllers/__ui/core/scripts/FormController.js' )           )?>"></script>
        <script type="text/javascript" src="<?=base_url().'__system/js/'. Pusaka\Encrypt::shortUrl(Pusaka\Encrypt::saveUrlEncode( 'controllers/'.ucfirstpath($cwdir).'/'.basename($cwdir).'.js' )   )?>"></script>

        <script type="text/javascript">
            function setObjComponent(ObjComponentField, value) {
                ObjComponentField.val(value);
                ObjComponentField.change();
            }
        </script>

        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=$assets?>global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=$assets?>global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-summernote/summernote.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/jquery.mockjax.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>

        <script src="<?=$assets?>global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
        <script src="<?=$assets?>global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=$assets?>global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?=$assets?>pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/form-repeater.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>pages/scripts/form-editable.js" type="text/javascript"></script>

        <script src="<?=$assets?>pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>

        <script src="<?=$assets?>pages/scripts/form-fileupload.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?=$assets?>layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?=$assets?>layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- FROALA -->
        <script type="text/javascript" src="<?=$assets?>froala/js/froala_editor.min.js" ></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/align.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/char_counter.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/code_beautifier.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/code_view.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/colors.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/draggable.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/emoticons.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/entities.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/file.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/font_size.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/font_family.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/fullscreen.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/image.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/image_manager.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/line_breaker.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/link.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/lists.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/quote.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/table.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/save.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/url.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>froala/js/plugins/video.min.js"></script>
        <!-- END FROALA -->

    </body>

</html>