<?php

?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/graphchart.js"></script>
<script src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script>
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.min.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/fontawesome.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>
	</body>
	<script>
	$(document).ready(function() {
   $('#menu_icon').click(function() {
      if ($('.page-sidebar').hasClass('expandit')){
          $('.page-sidebar').addClass('collapseit');
          $('.page-sidebar').removeClass('expandit');
          $('.profile-info').addClass('short-profile');
          $('.logo-area').addClass('logo-icon');
          $('#main-content').addClass('sidebar_shift');
          $('.menu-title').css("display", "none");
  } else {
    $('.page-sidebar').addClass('expandit');
    $('.page-sidebar').removeClass('collapseit');
    $('.profile-info').removeClass('short-profile');
      $('.logo-area').removeClass('logo-icon');
      $('#main-content').removeClass('sidebar_shift');
      $('.menu-title').css("display", "inline-block");
  }
});

});
	
</script>
	