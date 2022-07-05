<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="25%">Nama</th>
			<th width="25%">Keterangan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

		foreach ($kategori_product as $kategori_product) { ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $kategori_product['nama_kategori_product'] ?></td>
				<td><?= $kategori_product['keterangan_kategori_product'] ?></td>
				<td>
					<a href="<?= base_url('admin/kategori_product/edit/' . $kategori_product['id_kategori_product']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?= base_url('admin/kategori_product/delete/' . $kategori_product['id_kategori_product']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>