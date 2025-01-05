<?= $this->extend('Layout/Layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="text" value="<?= $id ?>" name="id" hidden>
                            <div class="col-12" id="input-group">
                                <div class="form-group p-2">
                                    <div class="d-flex justify-content-between">
                                        <h3>Nama</h3>
                                    </div>
                                    <input type="text"
                                        class="form-control"
                                        name="nama"
                                        value="<?= $nama ?>"
                                        placeholder="" />
                                </div>
                                <div class="form-group p-2">
                                    <div class="d-flex justify-content-between">
                                        <h3>Harga</h3>
                                    </div>
                                    <input type="number"
                                        class="form-control"
                                        name="harga"
                                        value="<?= $harga ?>"
                                        placeholder="" />
                                </div>
                                <div class="form-group p-2">
                                    <div class="d-flex justify-content-between">
                                        <h3>Deskripsi</h3>
                                    </div>
                                    <input type="text"
                                        class="form-control"
                                        name="deskripsi"
                                        value="<?= $deskripsi ?>"
                                        placeholder="" />
                                </div>
                                <div class="form-group p-2">
                                    <div class="d-flex justify-content-between">
                                        <h3>Gambar</h3>
                                    </div>
                                    <input type="file" class="form-control" id="inputGroupFile02" name="img">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 pt-2">
                                <div class="d-flex flex-row-reverse">
                                    <a href="<?= site_url("/") ?>"
                                        class="btn btn-primary btn-round ms-1">
                                        Kembali
                                    </a>
                                    <button class="btn btn-primary btn-round ms-1"
                                        type="submit">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>