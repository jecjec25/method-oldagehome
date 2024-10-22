<?= $this->extend('dashboard/layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Update Product Details</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/products') ?>" class="btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('Main/product_edit/' . (isset($product['id']) ? $product['id'] : '')) ?>" method="POST" enctype="multipart/form-data">
                <?php if ($session->getFlashdata('error')): ?>
                    <div class="alert alert-danger rounded-0">
                        <?= $session->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if ($session->getFlashdata('success')): ?>
                    <div class="alert alert-success rounded-0">
                        <?= $session->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="code" class="control-label">Code</label>
                    <input type="text" class="form-control rounded-0" id="code" name="code" autofocus placeholder="Company Code" value="<?= !empty($product['code']) ? $product['code'] : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control rounded-0" id="name" name="name" autofocus placeholder="Product Name" value="<?= !empty($product['name']) ? $product['name'] : '' ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Prodpic" class="control-label">Product Pic</label>
                    <input type="file" class="form-control rounded-0" id="Prodpic" name="Prodpic" placeholder="Image" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="mb-3">
                    <!-- Thumbnail for the current product image -->
                    <img id="imagePreview" 
                         src="<?= !empty($product['prodpic']) ? base_url('upload/product/' . $product['prodpic']) : '' ?>" 
                         alt="Image Preview" 
                         class="img-thumbnail rounded-0" 
                         style="display: <?= !empty($product['prodpic']) ? 'block' : 'none' ?>; max-width: 100px; cursor: pointer;"
                         onclick="openModal()">
                </div>

                <div class="mb-3">
                    <label for="description" class="control-label">Description</label>
                    <textarea rows="3" class="form-control rounded-0" id="description" name="description" placeholder="(optional)"><?= !empty($product['description']) ? $product['description'] : '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="control-label">Quantity</label>
                    <input type="number" class="form-control rounded-0" id="quantity" name="quantity" disabled placeholder="Current Quantity" value="<?= !empty($product['quantity']) ? $product['quantity'] : '' ?>" required>
                    <input type="number" class="form-control rounded-0" id="addstock" name="addstock" value="0" placeholder="Add Stock">
                </div>
                <div class="mb-3">
                    <label for="price" class="control-label">Price</label>
                    <input type="number" step="any" class="form-control rounded-0" id="price" name="price" placeholder="Price" value="<?= !empty($product['price']) ? $product['price'] : '' ?>" required>
                </div>
                <div class="d-grid gap-1">
                    <button class="btn rounded-0 btn-primary bg-gradient">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for image preview -->
<div id="imageModal" class="modal" style="display: none;">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="caption"></div>
</div>

<script>
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        };
        
        reader.readAsDataURL(file);
    } else {
        imagePreview.src = '';
        imagePreview.style.display = 'none';
    }
}

function openModal() {
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const imagePreview = document.getElementById("imagePreview");

    modal.style.display = "block";
    modalImage.src = imagePreview.src;
}

function closeModal() {
    const modal = document.getElementById("imageModal");
    modal.style.display = "none";
}
</script>

<style>
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%; /* Set the width of the image */
    max-width: 700px; /* Max width of the image */
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
</style>

<?= $this->endSection() ?>
