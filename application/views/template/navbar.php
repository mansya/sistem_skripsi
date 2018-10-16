<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<title>Sistem Skripsi Online</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/fix/book.ico');?>" />

	<script src="<?php echo base_url('assets/js/fontawesome-all.js');?>"></script> 
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/sweetalert.min.js');?>"></script>
	

	<script type="text/javascript">

		$("#slide").animate({width:'toggle'},350);
		$(document).ready(function() {
			$("#ubahPassword").on('submit', function() {
				var form = $(this);
				var formdata = false;
				if (window.FormData) {
					formdata = new FormData(form[0]);
				}
				var formAction = $(this).attr('action');

				if (!$("input").val()) {

					$("#warning").show('fast').delay(2000).hide('fast');
					return false;

				} else {
					$.ajax({
						type: "POST",
						url: formAction,
						data: formdata ? formdata : form.serialize(),
						contentType: false,
						processData: false,
						cache: false,
						success: function(result) {
							if(result == 1) {
								$("#success").show('fast').delay(1000).hide('slow', function() {
									$("#Ubah").modal('toggle');						
								});;
							}
							else {
								$("#failed").show('fast').delay(1000).hide('fast');
								$('input').val('');
								return false;
							}
						}
					});
					return false;
				}

			});

		});
	</script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/myStyle.css');?>">

</head>
<div class="modal fade ubah" id="Ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form id="ubahPassword" method="POST" action="<?= base_url('ControllerGlobal/ubahPassword/'.$_SESSION['ID'].'/users');?>">
					<div class="content">
						<div id="success" class="alert alert-success alert-white rounded" style="display:none;">
							<strong><i class="fas fa-check"></i> Password Berhasil di Ubah !</strong>
						</div>
						<div id="warning" class="alert alert-warning alert-white rounded" style="display:none;">
							<strong> <i class="fas fa-exclamation"></i> Peringatan !</strong>
							<br>Kata Sandi Tidak Boleh Kosong
						</div>
						<div id="failed" class="alert alert-danger alert-white rounded"style="display:none;">
							<strong><i class="fas fa-user-times"></i> Password Salah !</strong>
							<br>Kata Sandi Lama Salah!
						</div>						
					</div>

					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Password Lama</label>
						<input type="password" class="form-control pass_lama" name="pass_lama">
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Password Baru</label>
						<input type="Password" name="pass_baru" class="form-control pass_baru">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
						<button type="submit" class="btn btn-primary" id="buttonPassword"> <i class="fas fa-sign-in-alt"></i> Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<body>
	<nav class="navbar navbar-expand-lg mb-3 border-bottom-1 border">
		
		<div class="navbar-brand navbar-nav m-1">
			<h5><i class="fas fa-book"></i> SISTEM SKRIPSI ONLINE</h5>
		</div>
		<div class="navbar-collapse collapse">
			<span class="text-right col"><i class="fas fa-calendar-alt"> </i>   
				<?php echo longdate_indo(date('Y-m-d'));?> </span>	
			</div>
			<div class="m-1 float-right">
				<a <?= $_SESSION['Status'] === 'Admin' ? 'style="display: none"' : '' ?> href="#" data-target="#Ubah" data-toggle="modal" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit fa-xs"></i> Ganti Password </a>	
				<a href="<?php echo base_url('Home/Logout');?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-sign-out-alt"></i> Keluar </a>
			</div>
		</nav>
		<div id="beranda">

		</div>
	</body>
	</html>