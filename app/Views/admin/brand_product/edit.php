<?= form_open(base_url('admin/brand_product/edit/' . $brand_product['id_brand_product']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Brand Product</label>
	<div class="col-9">
		<input type="text" name="nama_brand_product" class="form-control" placeholder="Nama brand_product" value="<?= $brand_product['nama_brand_product'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Keterangan Brand product</label>
	<div class="col-9">
		<input type="text" name="keterangan_brand_product" class="form-control" placeholder="Keterangan brand_product" value="<?= $brand_product['keterangan_brand_product'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>