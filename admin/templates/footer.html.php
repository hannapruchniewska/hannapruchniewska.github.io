				</section>
			</aside>
		</div>
		<!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="<?php echo $domain; ?>/assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $domain; ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo $domain; ?>/assets/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $domain; ?>/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo $domain; ?>/assets/js/AdminLTE/app.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $domain; ?>/assets/js/AdminLTE/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo $domain; ?>/assets/js/AdminLTE/app.js" type="text/javascript"></script> -->
    <script src="<?php echo $domain; ?>/assets/js/AdminLTE/demo.js" type="text/javascript"></script>
    <!-- CKEditor -->
    <script src="<?php echo $domain; ?>/assets/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

		<script type="text/javascript">
		  $(function() {
		    // Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    
			    CKEDITOR.replace('editor1');
			    //bootstrap WYSIHTML5 - text editor
			    $(".textarea").wysihtml5();
			  
		  });
  	</script>
  </body>
</html>