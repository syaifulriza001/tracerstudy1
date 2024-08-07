
				<?php 
				foreach($website as $web): ?>
<footer>
<p class="footer__copy">&#169; copyright <?php echo date("Y"); ?>
 <?=$web->prodi?> - <?=$web->universitas?>. All right reserved</p>
</footer>
<!--========== SCROLL REVEAL ==========-->
<script src="https://unpkg.com/scrollreveal"></script>
<!--========== MAIN JS ==========-->
<script src="<?=base_url();?>asset_user/assets/js/main.js"></script>
</body>
</html>
<?php endforeach; ?>
