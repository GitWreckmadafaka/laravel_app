<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5><?php echo e($user->name); ?></h5>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                <p><strong>Age:</strong> <?php echo e($user->age); ?></p>
                <p><strong>Birthdate:</strong> <?php echo e($user->birthdate); ?></p>
                <p><strong>Gender:</strong> <?php echo e(ucfirst($user->gender)); ?></p>
                <p><strong>Status:</strong> <?php echo e($user->is_active ? 'Active' : 'Inactive'); ?></p>
                <p><strong>Last Login:</strong> <?php echo e($user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('Y-m-d H:i:s') : 'Never'); ?></p>

                <form action="<?php echo e(route('admin.users.toggleAdmin', $user->id)); ?>" method="POST" class="mb-3">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-warning">
                        <?php echo e($user->is_admin ? 'Remove Admin' : 'Make Admin'); ?>

                    </button>
                </form>

                <!-- Delete User Button -->
                <form action="<?php echo e(route('admin.users.delete', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary">Back to User List</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/users/show.blade.php ENDPATH**/ ?>