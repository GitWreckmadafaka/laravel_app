<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container, .product-container {
            margin-top: 30px;
            padding: 20px;
            border: 2px solid #007bff;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .user-info {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        .user-info h3 {
            color: #007bff;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        #productGrid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .product-item {
            margin-bottom: 30px;
        }
        .product-item img {
            width: 100%;
            height: auto;
        }
        .carousel-inner img {
        height: 400px;
        object-fit: cover;
        width: 100px;
        }

    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">❖ Anything</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#productsSection">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cart.index')); ?>">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('wishlist.index')); ?>">Wishlist</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#dashboardModal">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">
                        <img src="<?php echo e(asset('storage/' . $carousel->image_path)); ?>" class="d-block w-100" alt="Image" style="max-height: 500px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo e($carousel->caption); ?></h5>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div><br>

    <div class="modal fade" id="dashboardModal" tabindex="-1" aria-labelledby="dashboardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dashboardModalLabel">PROFILE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center">Welcome, <?php echo e(Auth::user()->name ?? 'Guest'); ?>!</h1>
                    <?php if(session('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="user-info text-center">

                        <div class="profile-image mb-4">
                            <strong>Profile Image:</strong><br>
                            <?php if(Auth::user()->profile_image): ?>
                                <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" alt="Profile Image" width="150" class="rounded-circle"> <!-- Adjusted the image size -->
                            <?php else: ?>
                                <p>N/A</p>
                            <?php endif; ?>
                        </div>
                        <h3>Your Information</h3>
                        <ul class="list-group">

                            <li class="list-group-item"><strong>Name:</strong> <?php echo e(Auth::user()->name ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Email:</strong> <?php echo e(Auth::user()->email ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Age:</strong> <?php echo e(Auth::user()->age ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Birthdate:</strong> <?php echo e(Auth::user()->birthdate ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Gender:</strong> <?php echo e(Auth::user()->gender ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Address:</strong> <?php echo e(Auth::user()->address ?? 'N/A'); ?></li>

                            <li class="list-group-item"><strong>Zip Code:</strong> <?php echo e(Auth::user()->zipcode ?? 'N/A'); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="mr-auto">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-info">Edit Profile</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="carousel-wrapper mx-auto" style="max-width: 1100px;">
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#productCarousel" data-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>"></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

            <div class="text-center mb-4">
                <h3>Featured Products</h3>
                <p class="text-muted" style="font-style: italic;">Explore one of this products.</p>
            </div>

            <div class="row">
                <?php $__currentLoopData = $products->shuffle()->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo e(asset('storage/' . $product->image_url)); ?>"
                                 class="card-img-top"
                                 alt="<?php echo e($product->name); ?>"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                <p class="card-text"><?php echo e($product->description); ?></p>
                                <p class="card-text"><strong>Price:</strong> ₱<?php echo e(number_format($product->price, 2)); ?></p>
                                <p class="card-text"><strong>Category:</strong> <?php echo e($product->category ? $product->category->name : 'N/A'); ?></p>
                                <p class="card-text"><strong>Color:</strong> <?php echo e($product->color ? $product->color->name : 'N/A'); ?></p>
                                <p class="card-text"><strong>Brand:</strong> <?php echo e($product->brand ? $product->brand->name : 'N/A'); ?></p>
                                <p class="card-text"><strong>Stock:</strong> <?php echo e($product->stock); ?> Available</p> <!-- Stock Information -->

                                <?php if($product->stock > 0): ?>
                                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </form>
                                    <form action="<?php echo e(route('wishlist.add', $product->id)); ?>" method="POST" class="mt-2">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-secondary">Add to Wishlist</button>
                                    </form>
                                <?php else: ?>
                                    <p class="text-danger">Sold Out</p> <!-- Sold Out message when stock is zero -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="container my-5">
                <div class="text-center mb-4">
                    <h3>Trending Products</h3>
                    <p class="text-muted" style="font-style: italic;">Explore one of this products.</p>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $topFeaturedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo e(asset('storage/' . $product->image_url)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                    <p class="card-text"><strong>Price:</strong> ₱<?php echo e(number_format($product->price, 2)); ?></p>
                                    <p class="card-text"><strong>Category:</strong> <?php echo e($product->category ? $product->category->name : 'N/A'); ?></p>
                                    <p class="card-text"><strong>Color:</strong> <?php echo e($product->color ? $product->color->name : 'N/A'); ?></p>
                                    <p class="card-text"><strong>Brand:</strong> <?php echo e($product->brand ? $product->brand->name : 'N/A'); ?></p>
                                    <p class="card-text"><strong>Stock:</strong> <?php echo e($product->stock); ?> Available</p>
                                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </form>
                                    <form action="<?php echo e(route('wishlist.add', $product->id)); ?>" method="POST" class="mt-2">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-secondary">Add to Wishlist</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

 <!-- Top Categories Section -->
<div class="container my-5">
    <h3 class="text-center mb-4">Top Categories</h3>
    <div class="row">
        <?php $__currentLoopData = $topCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($category->name); ?></h5>
                        <p class="card-text">Explore top products in this category.</p>
                        <!-- Pass the category name to trigger the filter -->
                        <button class="btn btn-primary shop-now" data-category="<?php echo e(strtolower($category->name)); ?>">Shop Now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- Products Section with Filters -->
<div id="productsSection" class="container mt-5 product-container">
    <h2 class="text-center mb-4">Products</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search for products..." id="productSearch">
        </div>
        <div class="col-md-2">
            <select class="form-control" id="productFilter">
                <option value="all">All Categories</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(strtolower($category->name)); ?>"><?php echo e(ucfirst($category->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="colorFilter">
                <option value="all">All Colors</option>
                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(strtolower($color->name)); ?>"><?php echo e(ucfirst($color->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="brandFilter">
                <option value="all">All Brands</option>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(strtolower($brand->name)); ?>"><?php echo e(ucfirst($brand->name)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div id="productGrid" class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-item"
                 data-category="<?php echo e(strtolower($product->category->name ?? 'none')); ?>"
                 data-color="<?php echo e(strtolower($product->color->name ?? 'none')); ?>"
                 data-brand="<?php echo e(strtolower($product->brand->name ?? 'none')); ?>">
                <div class="card h-100">
                    <img src="<?php echo e(asset('storage/' . $product->image_url)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="card-text"><?php echo e($product->description); ?></p>
                        <p class="card-text"><strong>Price:</strong> ₱<?php echo e(number_format($product->price, 2)); ?></p>
                        <p class="card-text"><strong>Category:</strong> <?php echo e($product->category ? $product->category->name : 'N/A'); ?></p>
                        <p class="card-text"><strong>Color:</strong> <?php echo e($product->color ? $product->color->name : 'N/A'); ?></p>
                        <p class="card-text"><strong>Brand:</strong> <?php echo e($product->brand ? $product->brand->name : 'N/A'); ?></p>
                        <p class="card-text"><strong>Stock:</strong> <?php echo e($product->stock); ?> Available</p> <!-- Stock Information -->

                        <?php if($product->stock > 0): ?>
                            <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>

                            <form action="<?php echo e(route('wishlist.add', $product->id)); ?>" method="POST" class="mt-2">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-secondary">Add to Wishlist</button>
                            </form>
                        <?php else: ?>
                            <p class="text-danger">Sold Out</p> <!-- Sold Out message when stock is zero -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

            <script>
                // When a "Shop Now" button is clicked, filter products by category
                $('.shop-now').on('click', function() {
                    var categoryId = $(this).data('category-id');

                    // Set the category filter to the selected category
                    $('#productFilter').val(categoryId).trigger('change');
                });

                // When the category filter changes
                $('#productFilter').on('change', function() {
                    var categoryId = $(this).val();
                    var color = $('#colorFilter').val();
                    var brand = $('#brandFilter').val();

                    // Show or hide products based on the selected filters
                    $('#productGrid .product-item').each(function() {
                        var productCategory = $(this).data('category');
                        var productColor = $(this).data('color');
                        var productBrand = $(this).data('brand');

                        var categoryMatch = categoryId === 'all' || categoryId === productCategory;
                        var colorMatch = color === 'all' || color === productColor;
                        var brandMatch = brand === 'all' || brand === productBrand;

                        if (categoryMatch && colorMatch && brandMatch) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });

                // When the color filter changes
                $('#colorFilter').on('change', function() {
                    $('#productFilter').trigger('change');
                });

                // When the brand filter changes
                $('#brandFilter').on('change', function() {
                    $('#productFilter').trigger('change');
                });

                // Optional: Search filter for product name
                $('#productSearch').on('input', function() {
                    var query = $(this).val().toLowerCase();

                    $('#productGrid .product-item').each(function() {
                        var productName = $(this).find('.card-title').text().toLowerCase();
                        if (productName.includes(query)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            </script>




    <script>

        document.querySelectorAll('.shop-now').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();


                const category = button.getAttribute('data-category');


                filterProductsByCategory(category);


                updateCategoryDropdown(category);
            });
        });


        function filterProductsByCategory(category) {

            document.querySelectorAll('.product-item').forEach(function(product) {

                const productCategory = product.getAttribute('data-category');


                if (category === 'all' || productCategory === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }


        function updateCategoryDropdown(category) {
            const dropdown = document.getElementById('productFilter');
            dropdown.value = category;
        }
    </script>

<script>
    document.querySelector('a[href="#productsSection"]').addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector('#productsSection').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>




    <script>

        document.getElementById('productFilter').addEventListener('change', applyFilters);
        document.getElementById('colorFilter').addEventListener('change', applyFilters);
        document.getElementById('brandFilter').addEventListener('change', applyFilters);

        // Product search event
        document.getElementById('productSearch').addEventListener('input', applySearch);

        function applyFilters() {
            const filterValue = document.getElementById('productFilter').value.toLowerCase();
            const colorValue = document.getElementById('colorFilter').value.toLowerCase();
            const brandValue = document.getElementById('brandFilter').value.toLowerCase();

            document.querySelectorAll('.product-item').forEach(product => {
                const category = product.getAttribute('data-category');
                const color = product.getAttribute('data-color');
                const brand = product.getAttribute('data-brand');
                const matchesCategory = (filterValue === 'all' || category === filterValue);
                const matchesColor = (colorValue === 'all' || color === colorValue);
                const matchesBrand = (brandValue === 'all' || brand === brandValue);

                // Show or hide the product based on filters
                product.style.display = (matchesCategory && matchesColor && matchesBrand) ? 'block' : 'none';
            });
        }

        function applySearch() {
            const searchQuery = document.getElementById('productSearch').value.toLowerCase();
            document.querySelectorAll('.product-item').forEach(product => {
                const productName = product.querySelector('.card-title').textContent.toLowerCase();
                product.style.display = productName.includes(searchQuery) ? 'block' : 'none';
            });
        }

        $(document).ready(function() {
    // Event listener for Add to Cart button
    $('.add-to-cart-btn').click(function() {
        var productId = $(this).data('id');  // Get the product ID from the button
        var csrfToken = $(this).data('token');  // Get CSRF token

        $.ajax({
            url: '/cart/add',  // Ensure this route matches your Laravel route
            method: 'POST',
            data: {
                product_id: productId,
                _token: csrfToken  // Include CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    alert('Product added to cart!');
                } else {
                    alert('Failed to add product to cart.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred while adding to the cart.');
            }
        });
    });
});


    </script>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/home.blade.php ENDPATH**/ ?>