<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('backend/survey') ?>">Survey </a></li>
              <li class="breadcrumb-item active">Detail Survey</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php 
            if(empty($survey)){
        ?>
            <div class="card">
                <h3>Hasil survey belum tersedia !</h3>
            </div>
            <?php
            }else{
            foreach($survey as $survey): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-dark">
                        <div class="card-header"><?= strtoupper($survey->nama_survei) ?></div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($surveyPertanyaan as $sp ): 
                                        if($sp->id_survei == $survey->id){
                                ?>
                                <div class="col-md-6">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title"> <span class="font-weight-bold">PERTANYAAN : </span> <?= $sp->pertanyaan ?></h3>
                                            
                                        </div>
                                        <div class="card-body">
                                            <canvas id="pieChart<?= $sp->id ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <?php 
                                            $pertanyaan = array();
                                            $jmlhJawaban = array();
                                            $warnaAll = array('#4addac', '#00a65a','#FC4A1A','#F7B733','#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#FFFF00','#FFD700','#FF69B4','#4B0082','#B0C4DE','#00FF00','#9370DB','#191970','#000080','#FF4500','#B0E0E6','#8B4513');
                                            foreach($surveyJawaban as $sj):
                                            $jawaban = 0;
                                                if($sj->id_pertanyaan == $sp->id && $sj->id_survey == $survey->id){
                                                    $jdl = "'".$sj->jawaban."'";
                                                    array_push($pertanyaan, $jdl);
                                                    foreach($cekJawabanUser as $cju):
                                                        if($cju->jawaban == $sj->id && $cju->id_pertanyaan== $sp->id && $cju->id_survei==$survey->id){
                                                            $jawaban += 1;
                                                        }
                                                    endforeach;
                                                    array_push($jmlhJawaban,$jawaban);
                                                }
                                            endforeach;
                                            $j = sizeof($pertanyaan);
                                            $pilihWarna = array();
                                            for($x=0; $x<$j; $x++){
                                                $wrn = "'".$warnaAll[$x]."'";
                                                array_push($pilihWarna,$wrn);
                                            }
                                            
                                        ?>
                                        <!-- /.card-body -->
                                        <script src="<?= base_url('assets/backend/') ?>plugins/jquery/jquery.min.js"></script>

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>

                                        <script>
                                            $(function(){
                                                var pieChart ='#pieChart<?= $sp->id ?>';
                                                var pieChartCanvas = $(pieChart).get(0).getContext('2d');
                                                var donutData        = {
                                                labels: [<?= join($pertanyaan,',') ?>],
                                                datasets: [
                                                    {
                                                    data: [<?= join($jmlhJawaban,',') ?>],
                                                    backgroundColor : [<?= join($pilihWarna,',') ?>],
                                                    }
                                                ]
                                                }
                                                var pieData        = donutData;
                                                var pieOptions     = {
                                                maintainAspectRatio : false,
                                                responsive : true,
                                                }
                                                //Create pie or douhnut chart
                                                // You can switch between pie and douhnut using the method below.
                                                var pieChart = new Chart(pieChartCanvas, {
                                                type: 'pie',
                                                data: pieData,
                                                options: pieOptions      
                                                });
                                            });

                                            
                                        </script>
                                        <?php
                                            $p = sizeof($jmlhJawaban); 
                                            $jmlh = 0;
                                            for($l=0; $l<$p; $l++){
                                                $jmlh += $jmlhJawaban[$l];
                                            }

                                        ?>
                                        <h5 class="p-3">Jumlah Responden : <span class="font-weight-bold"> <?= $jmlh ?> </span> Responden </h5>
                                    </div>
                                </div>
                                <?php } endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; } ?>
        </div>
    </section>
</div>