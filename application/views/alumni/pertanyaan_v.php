
<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
				<div class="row">
						<div class="col-sm-12 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="my-3 ml-5">
									<h2 class="text-dark font-weight-bold mb-2">Tracer Study 2020</h2>
									<h3 class="font-weight-normal mb-2"> Silahkan Jawab Pertanyaan Berikut ini dengan baik </h3>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card card-data sale-diffrence-border">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="card-title"><?= $surveyPertanyaanLimit->pertanyaan ?> ?</h4>
											<form  action="<?= base_url('lakukanSurvey/'.$idSurvei.'/'.$idPertanyaan) ?>" method="post" class="forms-sample needs-validation"  novalidate>
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<?php 
															$numItems = count($surveyJawaban);
															$i = 0;
															foreach($surveyJawaban as $jawaban): ?>
															<div class="form-check radio custom-control custom-radio">
															<input type="radio" class="custom-control-input form-check-input" id="<?= $jawaban->id ?>" value="<?= $jawaban->id ?>" name="jawaban" required>
															<label class=" custom-control-label form-check-label" for="<?= $jawaban->id ?>"><?= $jawaban->jawaban; ?></label>
																<?php 
															if(++$i == $numItems): ?>
																<div class="invalid-feedback">
																Anda harus mengisi form untuk melanjutkan
																</div>
															  <?php endif; ?>
															</div><?php
															endforeach; ?>
														</div>
													</div>
												</div>
												<div class="form-row">
												<?php

														if ($surveyPertanyaanLast == $idPertanyaan){
													?>	
													 <input type="submit" class="btn btn-lg text-right btn-inverse-primary btn-fw mb-2"  name="back" value="Sebelumnya">
													<? } 
													 if ($surveyPertanyaanLimitStart->num_rows() == 0) {
													?>
															<input type="submit" class="btn btn-lg text-left position-absolute btn-inverse-primary btn-fw" name="save" value="Save">
															
													<?php     
														}else{

													?>
															<input type="submit" class="btn btn-lg text-left position-absolute btn-inverse-primary btn-fw" name="submit" value="Next">
													<?php
														}
													
													?>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
