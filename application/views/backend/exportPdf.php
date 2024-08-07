

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Dashboard &mdash; Admin</title>
	<link rel="shortcut icon" href="<?=base_url();?>assets/backend/img/favicon.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
            #table {
                font-family: sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

						#body {
							font-family: sans-serif;
						}

						h3,h4,h5,h6 {
							font-family: sans-serif;
						}

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
								font-family: sans-serif;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #6777ef;
                color: white;
								font-family: sans-serif;
            }
        </style>
		</head>

<body class="bg-light">
	<?php
	foreach($survey as $s):
	?>
        <div style="text-align:center">
            <h3><?=$s->nama_survei?></h3>
			<h4>Laporan Tracer Study</h4>
			<h5>Tanggal : <?=date('d,F Y')?></h5>
			<h6>Jumlah Responden : <?=$s->responden?></h6>
        </div>

		<?php
		$no=1;
		foreach($pertanyaan as $p):
		?>
		<div class="my-3">
			<h3><?=$no++?>. <?=$p->pertanyaan?></h3>
			<table id="table">
				<thead class="bg-primary">
					<tr>
						<th>No.</th>
						<th>Jawaban</th>
						<th>Jumlah Respon</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$num=1;
				foreach($jawaban as $j):
						if($j->id_pertanyaan == $p->id):
					?>
					<tr>
						<td scope="row"><?=$num++?></td>
						<td><?=$j->jawaban?></td>
						<td><?=$j->jlh?></td>
					</tr>
				<?php endif;
				endforeach
				?>
				</tbody>
			</table>
		</div>

		<?php
		endforeach;
		?>
	<?php
	endforeach;
	?>



      <!-- Footer -->
      <footer class="footer main-footer">
      	<div class="footer-left">
      		Copyright &copy; E-Tracer Study
      		<?php
			foreach($website as $web): ?>
      		<p class="section-lead"><?=$web->prodi?> - <?=$web->universitas?></p>
      		<?php endforeach; ?>
      	</div>
      </footer>
      </div>
      </div>

      </body>

      </html>
