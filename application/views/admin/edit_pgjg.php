<div class="content-wrapper">
	<section class="content">
		<?php foreach ($pgjg as $c_pgjg) {?>
		<form action="<?php echo base_url().'admin/update_pgjg'; ?>" method="post">
			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $c_pgjg->kdPengunjung ?>">
				<input type="text" name="nama" class="form-control" value="<?php echo $c_pgjg->nmPengunjung ?>">
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" name="kontak" class="form-control" value="<?php echo $c_pgjg->kontak ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $c_pgjg->email ?>">
			</div><br>
			
		<?php } ?>	
			<button class="btn btn-primary" type="submit">Simpan </button>
		</form>
	</section>
</div>