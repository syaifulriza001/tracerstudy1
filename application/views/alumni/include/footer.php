	<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <?php foreach($website as $web) : ?>
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Trace Study - <?= $web->prodi ?></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <?= $web->universitas ?> </span>
            <?php endforeach; ?>
            </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
    <!-- base:js -->
    <script src="<?=base_url();?>assets_alumni/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?=base_url();?>assets_alumni/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
		<script src="<?= base_url('assets/frontend/alumni')?>/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/aos/aos.js"></script>
    <!-- End plugin js for this page -->
    <script src="<?=base_url();?>assets_alumni/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>assets_alumni/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="<?=base_url();?>assets_alumni/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="<?=base_url();?>assets_alumni/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="<?=base_url();?>assets_alumni/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="<?=base_url();?>assets_alumni/js/dashboard.js"></script>
    <!-- End custom js for this page-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js" type="text/javascript"></script>
  <script>
	 $(function () {
            $("#datepicker").datepicker({ 
                    autoclose: true, 
                    format: 'dd MM yyyy'
            });
            $("#datepicker1").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
            $("#datepicker2").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
            $("#datepicker3").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
        });
	</script>
	</body>
</html>
