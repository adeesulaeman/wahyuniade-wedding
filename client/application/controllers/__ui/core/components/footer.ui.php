<!--end-Footer-part-->

<!--
<script src="<?=$assets?>template/admin/js/excanvas.min.js"></script>
!-->
<script src="<?=$assets?>template/admin/js/jquery.ui.custom.js"></script> 
<script src="<?=$assets?>template/admin/js/bootstrap.min.js"></script> 
<script src="<?=$assets?>template/admin/js/bootstrap-datepicker.js"></script> 

<!-- VENDOR -->
<script src="<?=$assets?>systemvendor/bootstrap/bootstrap-toastr/toastr.min.js"></script> 
<!-- END VENDOR -->

<script type="text/javascript">
    function setObjComponent(ObjComponentField, value) {
        ObjComponentField.val(value);
        ObjComponentField.change();
    }
</script>

<script type="text/javascript">
    toastr.options = {
        "closeButton"     : true,
        "debug"           : false,
        "positionClass"   : "toast-top-right",
        "onclick"         : null,
        "showDuration"    : "1000",
        "hideDuration"    : "1000",
        "timeOut"         : "1000",
        "extendedTimeOut" : "1000",
        "showEasing"      : "swing",
        "hideEasing"      : "linear",
        "showMethod"      : "fadeIn",
        "hideMethod"      : "fadeOut"
    }
</script>

</body>
</html>