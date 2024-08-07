<?php
				foreach($website as $web): ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="<?=base_url();?>asset_user/assets/css/styles.css">
		<link rel="shortcut icon" href="<?=base_url();?>assets_alumni/images/favicon.png" />
        <title> <?=$web->web?></title>
		<style>
			a {
    		color: #c8fad3;
			}
			a:hover {
					color: #7ab186;
			}
			.active-link{
				color:<?=$web->warna?> ;
			}
			.nav__link:hover{
				color:<?=$web->warna2?> ;
			}
			.nav__logo:hover{
				color:<?=$web->warna2?> ;
			}
		</style>
    </head>
    <body>
        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>
        <!--========== HEADER ==========-->
        <br><br><br>
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo"> <b><?=$web->prodi?></b></a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="<?=base_url();?>" class="nav__link active-link" >Beranda</a></li>
                        <li class="nav__item"><a href="#testimoni" class="nav__link">Testimoni</a></li>
                        <li class="nav__item"><a href="#alumni" class="nav__link" >Pengguna Alumni</a></li>
                        <li class="nav__item"><a href="<?= base_url('login')?>" class="nav__link">Akses Aplikasi</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>
<?php endforeach ?>
