<?= $this->extend('Layout/Layout'); ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="mb-3 d-flex">
            <a href="<?= site_url("/tambah") ?>" class="btn btn-secondary rounded ms-2">
                Tambah
            </a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <button class="btn-export rounded-start-2" id="exports3" type="button">
                                Harga
                            </button>
                            <a href="<?= site_url("/") ?>"
                                class="btn-export rounded-end-2 d-flex align-items-center">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </a>
                        </div>
                        <div>
                            <ul class="rounded modal-export" id="modal3">
                                <a href="?sort=asc" asp-action="GenerateExcel">
                                    <li class="py-1 modal-sub">Terkecil</li>
                                </a>
                                <a href="?sort=desc" asp-action="GeneratePdf">
                                    <li class="py-1 modal-sub">Terbesar</li>
                                </a>
                            </ul>
                        </div>
                        <form method="get">
                            <div class="input-group">
                                <input type="text" name="keyword"
                                    class="border border-1 rounded-start p-2">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary rounded-end"><i
                                            class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="cole">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk as $p) : ?>
                                    <tr>
                                        <th><?= $p['nama'] ?></th>
                                        <th><?= $p['harga'] ?></th>
                                        <th><?= $p['deskripsi'] ?></th>
                                        <th><img class="h90" src="<?= base_url("/assets/img/{$p['img']}") ?>" alt=""></th>
                                        <th>
                                            <div class="form-button-action">
                                                <a
                                                    href="<?= site_url("/edit/{$p['id']}") ?>"
                                                    type="button"
                                                    data-bs-toggle="tooltip"
                                                    title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a
                                                    href="<?= site_url("/delete/{$p['id']}") ?>"
                                                    type="button"
                                                    data-bs-toggle="tooltip"
                                                    title=""
                                                    class="btn btn-link btn-danger"
                                                    data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <?= $pager->links('produk', 'produk_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("modal3");
        const exports = document.getElementById("exports3");

        exports.addEventListener("click", () => {
            if (modal.style.display === "block") {
                modal.style.display = "none";
                modal.style.opacity = "1";
                modal.style.top = "8%";
            } else {
                modal.style.display = "block";
                modal.style.opacity = "1";
                modal.style.top = "8%";
            }
        });

        document.addEventListener("click", (event) => {
            if (!modal.contains(event.target) && event.target !== exports) {
                if (modal.style.display === "block") {
                    modal.style.display = "none";
                    modal.style.opacity = "1";
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>