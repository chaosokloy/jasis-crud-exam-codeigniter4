<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('bootstrap-5.0.2-dist/css/bootstrap.min.css') ?> " ;>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://www.pixelstalk.net/wp-content/uploads/images2/One-Piece-Background-Desktop.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-repeat: no-repeat;
        }

        body .container .pagination a.pager-link {
            color: yellow !important;
            background-color: transparent !important;
            /* Add other styles as needed */
        }

        body.bg-white {
            /* Add any other styles you need for the body with a white background */
            background-color: white !important;
        }

        .table th {
            background-color: white !important;
            color: dark !important;
        }
    </style>

</head>
<!-- Rest of your HTML code -->
</html>

<body class="bg-white">
    <div class="container">
        <center>
        <h1 class="fw-bold text-primary"><strong>Welcome Nakama!</strong></h1>

        </center>
        <button type="button" class="btn border-0 btn-success"><a href="<?= site_url('main/logout'); ?>"
                class="btn text-decoration-none text-black">Logout</a></button>
        <hr class="bg text-warning">

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary mb-2 float-end" data-toggle="modal"
            data-target="#myProductModal">
            Add Product
        </button>

        <table class="table table-bordered table-warning" id="ProductTbl">
            <tr class="table-white">
                <th class="d-none">-Id-</th>
                <th class="fw-bold bg-white text-dark"><center>Product Name</th>
                <th class="fw-bold bg-white text-dark"><center>Unit</th>
                <th class="fw-bold bg-white text-dark"><center>Quantity</th>
                <th class="fw-bold bg-white text-dark"><center>Price</th>
                <th class="fw-bold bg-white" colspan="2"></th>
            </tr>
            <?php foreach($product as $product_list):?>
            <tr class="table-white">
                <td class="d-none"><?= esc($product_list['id']) ?></td>
                <td class="fw-bold bg-white text-dark"><strong><?= esc($product_list['product_name']) ?></strong></td>
                <td class="fw-bold bg-white text-dark"><?= esc($product_list['unit']) ?></td>
                <td class="fw-bold bg-white text-dark"><?= esc($product_list['quantity']) ?></td>
                <td class="fw-bold bg-white text-dark"><?= esc($product_list['price']) ?></td>
                <td class="fw-bold bg-white text-dark"><center><button class="btn btn-info btnUpdateProduct"
                            data-toggle="modal" data-target="#updateProductModal">Update</button></td>
                <td class="fw-bold bg-white text-dark"><center><button class="btn btn-danger btnDeleteProduct"
                            data-toggle="modal" data-target="#deleteProductModal">Delete</button></td>
            </tr>
            <?php endforeach?>
        </table>

        <?= $pager->links()?>

    </div>
    <center>



        <!-- The Add Product Modal -->
        <div class="modal" id="myProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('admin/add_new_product')?>" method="POST" class="p-3">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit" class="form-control" id="">
                                    <option value="pcs">pcs</option>
                                    <option value="klg">klg</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="quantity">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price">
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Add Product Model -->


        <!-- The Update Product Model -->
        <div class="modal" id="updateProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('admin/update_product')?>" method="POST" class="p-3">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group d-none">
                                <label for="id">Id</label>
                                <input type="hidden" class="form-control productId" name="id" readonly>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control productName" name="product_name">
                            </div>

                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit" class="form-control unit" id="">
                                    <option value="pcs">pcs</option>
                                    <option value="klg">klg</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control quantity" name="quantity">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control price" name="price">
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Update Model -->

        <!-- The Delete Product Model -->
        <div class="modal" id="deleteProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('admin/delete_product')?>" method="POST" class="p-3">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group d-none">
                                <label for="id">Id</label>
                                <input type="hidden" class="form-control delProductId" name="id" readonly>
                            </div>
                            <p>Are you sure that you want to delete this product <strong><span
                                        class="delProductName"></span></strong></p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Continue</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- End Delete Product Model -->

</body>
<!-- Include Bootstrap JS (jQuery and Popper.js required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="<?= base_url('bootstrap-5.0.2-dist/js/bootstrap.min.js') ?> "></script>

<script>
    $(document).ready(function () {
        $('#ProductTbl').on('click', '.btnUpdateProduct', function () {
            let currentRow = $(this).closest("tr");

            let productId = currentRow.find("td:eq(0)").text();
            let productName = currentRow.find("td:eq(1)").text();
            let unit = currentRow.find("td:eq(2)").text();
            let quantity = currentRow.find("td:eq(3)").text();
            let price = currentRow.find("td:eq(4)").text();

            console.log('productId:', productId); // Add this line for debugging
            $(".productId").val(productId);
            $(".productName").val(productName);
            $(".unit").val(unit);
            $(".quantity").val(quantity);
            $(".price").val(price);
        });

        $("#ProductTbl").on('click', '.btnDeleteProduct', function () {
            let currentRow = $(this).closest("tr");

            // Correct the capitalization in productId
            let productId = currentRow.find("td:eq(0)").text();
            let productName = currentRow.find("td:eq(1)").text();

            // Correct the capitalization in delProductId
            $(".delProductId").val(productId);
            $(".delProductName").text(productName);
        });
    });
</script>

</html>
