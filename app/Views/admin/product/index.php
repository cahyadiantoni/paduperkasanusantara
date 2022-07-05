<p>
	<a href="<?= base_url('admin/product/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="8%">Gambar</th>
			<th width="45%">Nama Product</th>
			<th width="15%">Kategori &amp; Brand</th>
			<th width="15%">Keterangan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

		foreach ($product as $product) { ?>
			<tr>
				<td><?= $no ?></td>
				<td>
					<?php if ($product['gambar_product'] === '') {
						echo '-';
					} else { ?>
						<img src="<?= base_url('assets/upload/image/thumbs/' . $product['gambar_product']) ?>" class="img img-thumbnail">
					<?php } ?>
				</td>
				<td><?= $product['nama_product'] ?>
					<small>
						<br><i class="fa fa-image"></i> <?= base_url('assets/upload/image/' . $product['gambar_product']) ?>
					</small>
				</td>
				<td><small><i class="fa fa-tags"></i> <?= $product['nama_kategori_product'] ?>
						<br><i class="fa fa-home"></i> <?= $product['nama_brand_product'] ?></small></td>
				<td><?= $product['keterangan_product'] ?></td>
				<td>

					<a href="<?= base_url('admin/product/edit/' . $product['id_product']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?= base_url('admin/product/delete/' . $product['id_product']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>