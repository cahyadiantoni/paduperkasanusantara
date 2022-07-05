<?= form_open(base_url('admin/kategori_product/edit/' . $kategori_product['id_kategori_product']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Kategori Product</label>
	<div class="col-9">
		<input type="text" name="nama_kategori_product" class="form-control" placeholder="Nama kategori_product" value="<?= $kategori_product['nama_kategori_product'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Keterangan Kategori product</label>
	<div class="col-9">
		<input type="text" name="keterangan_kategori_product" class="form-control" placeholder="Keterangan kategori_product" value="<?= $kategori_product['keterangan_kategori_product'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>