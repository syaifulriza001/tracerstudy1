      <!-- Footer -->
      <footer class="main-footer">
      	<div class="footer-left">
      		Copyright &copy; Trace Study <div class="bullet"></div>
      		<?php 
			foreach($website as $web): ?>
      		<p class="section-lead"><?=$web->prodi?> - <?=$web->universitas?></p>
      		<?php endforeach; ?>
      	</div>
      </footer>
      </div>
      </div>

      <!-- General JS Scripts -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"
      	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="<?=base_url();?>assets/backend/js/stisla.js"></script>

      <!-- Template JS File -->
      <script src="<?=base_url();?>assets/backend/js/scripts.js"></script>
      <script src="<?=base_url();?>assets/backend/js/custom.js"></script>

      <!-- Page Specific JS File -->
      <script src="<?=base_url();?>assets/backend/js/page/index-0.js"></script>

      <!-- Bootstrap alert auto dissmiss -->
      <script>
      	$(document).ready(function () {
      		window.setTimeout(function () {
      			$(".alert").fadeTo(500, 0).slideUp(500, function () {
      				$(this).remove();
      			});
      		}, 1000);
      	});

      </script>
      </body>

      </html>
