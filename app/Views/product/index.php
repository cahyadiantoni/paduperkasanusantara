<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $title ?></h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><?= $title ?></li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <div class="wrapper">
        <div class="container">
            <div class="py-3">
                <h5 class="font-weight-bold">Kategori</h5>
                <ul class="list-group">
                    <?php foreach ($kategori as $kategori) { ?>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"><a href="<?= base_url('Product/kategori/' . $kategori['id_kategori_product']) ?>"><?= $kategori['nama_kategori_product'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="py-3">
                <h5 class="font-weight-bold">Brand</h5>
                <ul class="list-group">
                    <?php foreach ($brand as $brand) { ?>
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"><a href="<?= base_url('Product/brand/' . $brand['id_brand_product']) ?>"><?= $brand['nama_brand_product'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <br>
            <a href="<?= base_url('Product') ?>"><li  style="padding-left:50%; background-color:#3fbbc0; color:#fff;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">Tampilkan Semua</li></a>
        </div>
        <section id="products">
            <div class="container py-3">
                <div class="row">
                    <?php foreach ($product as $product) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                            <div class="card"> <img class="card-img-top" src="<?= base_url('assets/upload/image/' . $product['gambar_product']) ?>">
                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1"><?= $product['nama_product'] ?></h6>
                                    <div class="text-muted description"><?= $product['keterangan_product'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
    </div>
    </div>