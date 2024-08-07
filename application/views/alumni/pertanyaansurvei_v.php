
			<style>
			.input-radio{
				position: absolute;
				left: 25px;
				cursor: pointer;
				z-index: 99;
				width: 300px;
			}
			</style>
						<?php
									foreach($survei as $s): ?>
									<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
				<div class="row">
						<div class="col-sm-12 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="my-3 ml-5">
			
									<h2 class="text-dark font-weight-bold mb-2"><?=$s->nama_survei?></h2>
									<h3 class="font-weight-normal mb-2"><?=$s->deskripsi?></h3>

								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-12 grid-margin stretch-card justify-content-center">
							<form  action="<?= base_url('alumni/dashboard/submitSurvei/'.$s->id) ?>" method="post" class="forms-sample needs-validation"  novalidate>
							
							<?php
							$num=0;
							foreach($pertanyaan as $p):
								$num++;
								?>
								<input type="text" class="form-control" value="<?=$p->id?>" name="pertanyaan<?=$num?>" hidden required>
								<div class="card card-data sale-diffrence-border my-2 float-center">
									<div class="card-body">
										<div class="form-row">
											<div class="col-lg-12">
													<h4><?=$p->pertanyaan?></h4>	
													<div class="form-group form-check">
													<?php
													
													foreach($jawaban as $j):
														
														if($j->id_pertanyaan == $p->id):
														?>
														<div class=" radio custom-control custom-radio p-0">
															
															<input type="radio" class="input-radio custom-control-input form-check-input" id="<?=$j->id?>" value="<?=$j->id_jawaban?>" name="jawaban<?=$num?>" required>
															<label class=" custom-control-label form-check-label" for="<?=$j->id?>"><?=$j->jawaban?></label>
															<?php 
															foreach($lastJwb as $last): 
															?>
															<?php 
															if ($last->cek == $j->id_jawaban): ?>
															<div class="invalid-feedback">
															Anda harus mengisi form untuk melanjutkan
															</div>
															<?php endif ?>
															<?php endforeach ?>
															
														</div>
													<?php
													endif;
													endforeach
													?>
													</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;
?>
								<input type="text" class="form-control" value="<?=$num?>" name="jlh" hidden required>
								<input type="submit" class="btn btn-lg text-left float-right btn-primary btn-fw " name="save" value="Save">
							</form>		
						</div>
					</div>
				</div><?php endforeach ?>
				<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    </script>
