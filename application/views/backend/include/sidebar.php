<!-- Sidebar -->
<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="#">E - Tracer Study<br></a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="#">TS</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="<?php if(current_url() == base_url('admin')){?>active<?php } ?>"><a class="nav-link"
					href="<?=base_url();?>admin"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
			<li class="<?php if(current_url() == base_url('admin/data')){?>active<?php } ?>"><a class="nav-link"
					href="<?=base_url();?>admin/data"><i class="fas fa-users"></i> <span>Data Alumni</span></a></li>
			<li
				class="<?php if(current_url() == base_url('admin/loker')){?>active<?php } elseif(current_url() == base_url('admin/bidang-pekerjaan')){?>active<?php }?>">
				<a class="nav-link has-dropdown" data-toggle="dropdown" href="#">
					<i class="fas fa-briefcase"></i> <span>Lowongan Kerja</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link <?php if(current_url() == base_url('admin/loker')){?>active<?php } ?>"
							href="<?=base_url();?>admin/loker">Data Lowongan</a>
					</li>
					<li>
						<a class="nav-link <?php if(current_url() == base_url('admin/bidang-pekerjaan')){?>active<?php } ?>"
							href="<?=base_url();?>admin/bidang-pekerjaan">Bidang pekerjaan</a>
					</li>
				</ul>
			</li>
			<li
				class="<?php if(current_url() == base_url('admin/survei') || current_url() == base_url('admin/surveiDetail/(:any)') ){?>active<?php } ?>">
				<a class="nav-link" href="<?=base_url();?>admin/survei"><i class="fas fa-tasks"></i>
					<span>Survei Tracer</span></a></li>
			<li
				class="<?php if(current_url() == base_url('admin/testi')){?>active<?php } elseif(current_url() == base_url('admin/kritik-saran')){?>active<?php } ?>">
				<a class="nav-link has-dropdown" data-toggle="dropdown" href="#">
					<i class="fas fa-comment-alt"></i>
					<span>Testimoni</span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="nav-link <?php if(current_url() == base_url('admin/testi')){?>active<?php } ?>"
							href="<?=base_url();?>admin/testi">Testimoni</a>
					</li>
				</ul>
			</li>
			<li
				class="<?php if(current_url() == base_url('admin/report') || current_url() == base_url('admin/reportDetail/(:any)') ){?>active<?php } ?>">
				<a class="nav-link" href="<?=base_url();?>admin/report"><i class="fas fa-flag"></i>
					<span>Report</span></a></li>
			<li class="<?php if(current_url() == base_url('admin/custom')){?>active<?php } ?>"><a class="nav-link"
					href="<?=base_url();?>admin/custom"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
			<li class="<?php if(current_url() == base_url('admin/history')){?>active<?php } ?>"><a class="nav-link"
					href="<?=base_url();?>admin/history"><i class="fas fa-history"></i> <span>Aktifitas</span></a></li>
		</ul>

	</aside>
</div>
