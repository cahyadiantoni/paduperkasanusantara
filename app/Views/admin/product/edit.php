<form action="<?= base_url('admin/product/edit/' . $product['id_product']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<?= csrf_field();
	?>

	<div class="form-group row">
		<label class="col-md-2">Nama Product</label>
		<div class="col-md-10">
			<input type="text" name="nama_product" class="form-control" value="<?= $product['nama_product'] ?>" required>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Upload Gambar product</label>
		<div class="col-md-10">
			<input type="file" name="gambar_product" class="form-control" value="<?= $product['gambar_product'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2">Kategori &amp; Brand</label>
		<div class="col-md-2">
			<select name="id_kategori_product" class="form-control">
				<?php foreach ($kategori_product as $kategori_product) { ?>
					<option value="<?= $kategori_product['id_kategori_product'] ?>" <?php if ($product['id_kategori_product'] === $kategori_product['id_kategori_product']) {
																						echo 'selected';
																					} ?>>
						<?= $kategori_product['nama_kategori_product'] ?>
					</option>
				<?php } ?>
			</select>
			<small class="text-secondary">Brand</small>
		</div>
		<div class="col-md-2">
			<select name="id_brand_product" class="form-control">
				<?php foreach ($brand_product as $brand_product) { ?>
					<option value="<?= $brand_product['id_brand_product'] ?>" <?php if ($product['id_brand_product'] === $brand_product['id_brand_product']) {
																					echo 'selected';
																				} ?>>
						<?= $brand_product['nama_brand_product'] ?>
					</option>
				<?php } ?>
			</select>
			<small class="text-secondary">Brand</small>
		</div>

	</div>

	<div class="form-group row">
		<label class="col-md-2">Keterangan Product</label>
		<div class="col-md-10">
			<textarea name="keterangan_product" class="form-control konten"><?= $product['keterangan_product'] ?></textarea>
		</div>
	</div>


	<div class="form-group row">
		<label class="col-md-2"></label>
		<div class="col-md-10">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

	<?= form_close(); ?>