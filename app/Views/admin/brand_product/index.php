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

		foreach ($brand_product as $brand_product) { ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $brand_product['nama_brand_product'] ?></td>
				<td><?= $brand_product['keterangan_brand_product'] ?></td>
				<td>
					<a href="<?= base_url('admin/brand_product/edit/' . $brand_product['id_brand_product']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?= base_url('admin/brand_product/delete/' . $brand_product['id_brand_product']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>