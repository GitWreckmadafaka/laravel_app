<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Carousel</h1>
        <form action="<?php echo e(route('carousels.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="caption" class="form-label">Caption</label>
                <input type="text" class="form-control" id="caption" name="caption">
            </div>
            <button type="submit" class="btn btn-primary">Add to Carousel</button>
            <a href="/admin/users" class="btn btn-secondary">Back</a>
        </form>

        <hr>


        <h2>Existing Carousel Items</h2>
        <ul class="list-group">
            <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <img src="<?php echo e(asset('storage/' . $carousel->image_path)); ?>" alt="Image" style="max-width: 100px; height: auto;">
                        <?php echo e($carousel->caption ?? 'No caption'); ?>

                    </div>
                    <form action="<?php echo e(route('carousels.destroy', $carousel->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/carousels/index.blade.php ENDPATH**/ ?>