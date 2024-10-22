<?= $this->extend('dashboard/layouts/main') ?>

<?= $this->section('content') ?>
<style>
    /* Ensure images fit well within the table cells and are centered */
    .table td img {
        width: 100px;        /* Set a fixed width */
        height: auto;       /* Maintain aspect ratio */
        object-fit: cover;  /* Cover the area while maintaining aspect ratio */
        border-radius: 4px; /* Optional: Adds rounded corners to images */
    }

    /* Center align the table cell */
    .table td {
        text-align: center; /* Center align text and images in the cell */
        vertical-align: middle; /* Align vertically in the middle */
    }
</style>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Product Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Product Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">List of Products</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/product_add') ?>" class="btn btn-primary bg-gradient rounded-0">
                    <i class="fa fa-plus-square"></i> Add Product
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-striped table-bordered">
                <colgroup>
                    <col width="5%">
                    <col width="10%">
                    <col width="40%">
                    <col width="15%">
                    <col width="10%">
                    <col width="10%"> <!-- Added for image column -->
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="p-1 text-center">Code</th>
                        <th class="p-1 text-center">Product Name</th>
                        <th class="p-1 text-center">Description</th>
                        <th class="p-1 text-center">Quantity</th>
                        <th class="p-1 text-center">Price</th>
                        <th class="p-1 text-center">Product Image</th>
                        <th class="p-1 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $row): ?>
                        <tr>
                            <td class="px-2 py-1 align-middle"><?= $row['code'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['description'] ?></td>
                            <td class="px-2 py-1 align-middle"><?= $row['quantity'] ?></td>
                            <td class="px-2 py-1 align-middle text-end"><?= number_format($row['price'], 2) ?></td>
                            <td class="px-2 py-1 align-middle">
                                <img 
                                    src="<?= base_url() . 'upload/product/' . $row['prodpic'] ?>" 
                                    alt="product" 
                                    style="cursor: pointer;" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#imageModal"
                                    onclick="document.getElementById('modalImage').src='<?= base_url() . 'upload/product/' . $row['prodpic'] ?>';"
                                >
                            </td>
                            <td class="px-2 py-1 align-middle text-center">
                                <a href="<?= base_url('Main/product_edit/'.$row['id']) ?>" class="mx-2 text-decoration-none text-primary"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('Main/product_delete/'.$row['id']) ?>" class="mx-2 text-decoration-none text-danger" onclick="if(confirm('Are you sure to delete <?= $row['code'] ?> - <?= $row['name'] ?> from list?') !== true) event.preventDefault()"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($products) <= 0): ?>
                        <tr>
                            <td class="p-1 text-center" colspan="7">No result found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div>
                <?= $pager->makeLinks($page, $perPage, $total) ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CSS and JS (Ensure to include these in your layout if not already) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>
