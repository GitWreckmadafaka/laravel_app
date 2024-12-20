<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Brands</h1>

        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addBrandModal">Add Brand</button>
        <a href="/admin/users" class="btn btn-secondary mb-3">Back to Product List</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($brand->name); ?></td>
                        <td><?php echo e($brand->category ? $brand->category->name : 'No Category'); ?></td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editBrandModal"
                                    data-id="<?php echo e($brand->id); ?>"
                                    data-name="<?php echo e($brand->name); ?>"
                                    data-category_id="<?php echo e($brand->category_id); ?>">Edit</button>

                            <form action="<?php echo e(route('admin.brands.destroy', $brand->id)); ?>" method="POST" style="display:inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this brand?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Add Brand Modal -->
    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandModalLabel">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.brands.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="brandName">Brand Name</label>
                            <input type="text" class="form-control" id="brandName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category_id" required>
                                <option value="">Select a Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Brand Modal -->
    <div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBrandForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="editBrandName">Brand Name</label>
                            <input type="text" class="form-control" id="editBrandName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editCategory">Category</label>
                            <select class="form-control" id="editCategory" name="category_id" required>
                                <option value="">Select a Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#editBrandModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var brandId = button.data('id');
            var brandName = button.data('name');
            var brandCategoryId = button.data('category_id');

            var modal = $(this);
            modal.find('#editBrandName').val(brandName);
            modal.find('#editCategory').val(brandCategoryId); // Set selected category for editing
            modal.find('form').attr('action', '/admin/brands/' + brandId);
        });
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/categories/createbrand.blade.php ENDPATH**/ ?>