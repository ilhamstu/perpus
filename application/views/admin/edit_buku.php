<div class="content-wrapper">
	<section class="content">
		<?php foreach ($buku as $c_buku) {?>
		<form action="<?php echo base_url().'admin/update_buku'; ?>" method="post">
			<div class="form-group">
				<label>Judul Buku</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $c_buku->kdBuku ?>">
				<input type="text" name="jdl" class="form-control" value="<?php echo $c_buku->jdlBuku ?>">
			</div>
			<div class="form-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $c_buku->stok ?>">
			</div>
			<div class="form-group">
				<label>Rak</label>
				<input type="text" name="rak" class="form-control" value="<?php echo $c_buku->rak ?>">
			</div><br>
			<select class="custom-select" id="inputGroupSelect01" name="kategori">
                            <option selected>Pilih Kategori</option>
                            <?php 
                              $no=1;
                              foreach ($ktgr as $c_ktgr) {
                              ?>
                            <option value="<?php echo $c_ktgr->kdKategori ?>"><?php echo $no++.". ".$c_ktgr->nmKategori ?></option>
                            <?php } ?>
                          </select><br><br>
		<?php } ?>	
			<button class="btn btn-primary" type="submit">Simpan </button>
		</form>
	</section>
</div>