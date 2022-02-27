<?php
static $title = "E-commerce Inventory 1.0";
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h1><?php echo $title; ?></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="../cis480/view/index.php">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cis480/view/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cis480/view/amazon_listings.php">Amazon Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cis480/view/ebay_listings.php">EBay Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cis480/view/images.php">Images</a>
                </li>

            </ul>

        </div>
    </div>
</nav>