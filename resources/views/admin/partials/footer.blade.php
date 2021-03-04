        <!-- Main Wrapper -->
    <div class="page-footer">
      <p class="no-s">{{date('Y')}} &copy;</p>
    </div>
  </div>
  <!-- Page Inner --> 
</main><!-- Page Content -->
       
<div class="cd-overlay"></div>
        
<!-- Javascripts-->
<script src="{{ asset('assets/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pace-master/pace.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/uniform/jquery.uniform.min.js') }}"></script>
<script src="{{ asset('assets/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
<script src="{{ asset('assets/plugins/offcanvasmenueffects/js/main.js') }}"></script>
<script src="{{ asset('assets/plugins/waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/plugins/3d-bold-navigation/js/main.js') }}"></script>
<script src="{{ asset('assets/plugins/summernote-master/summernote.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mockjax-master/jquery.mockjax.js') }}"></script> 
 <script src="{{ asset('assets/plugins/datatables/js/jquery.datatables.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js') }}"></script> 
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/modern.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-elements.js') }}"></script>
<script src="{{ asset('assets/js/pages/table-data.js') }}"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        <script>
        $(document).ready(function(){
            $(".confirmdel").click(function(){
                if(confirm("Are you sure you want to Delete!")){
                    var href = $(this).attr("href");
                    //alert(href);
                    window.location.href=href;
                }
                return false;
            });
            $(".simpleDataTable").DataTable();
        });
        
        </script>
