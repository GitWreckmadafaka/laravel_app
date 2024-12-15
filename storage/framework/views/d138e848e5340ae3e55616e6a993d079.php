<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container my-4">
        <h1>Your Wishlist</h1>


        <?php if($wishlist->isEmpty()): ?>
            <div class="alert alert-warning" role="alert">
                Your wishlist is empty.
            </div>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo e(asset('storage/' . $product->image_url)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                <p class="card-text"><?php echo e($product->description); ?></p>
                                <p class="card-text"><strong>Price:</strong> ₱<?php echo e(number_format($product->price, 2)); ?></p>

                            </div>
                            <div class="card-footer d-flex justify-content-between">

                                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                </form>


                                <form action="<?php echo e(route('wishlist.remove', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        <a href="<?php echo e(url('/home')); ?>" class="btn btn-secondary mt-3">Back to Home</a>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/wishlist/index.blade.php ENDPATH**/ ?>