<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Your Cart</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <?php if($cart && count($cart) > 0): ?>
            <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img src="<?php echo e(asset('storage/' . $item['image'])); ?>" alt="<?php echo e($item['name']); ?>" width="50" />
                                <?php echo e($item['name']); ?>

                            </td>
                            <td>₱<?php echo e(number_format($item['price'], 2)); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo e($id); ?>]" value="<?php echo e($item['quantity']); ?>" min="1" class="form-control" style="width: 60px;" />
                            </td>
                            <td>₱<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="removeItem(<?php echo e($id); ?>)">Remove</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Update Cart</button>
                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success">Proceed to Checkout</a>
                <a href="<?php echo e(url('/home')); ?>" class="btn btn-secondary">Back to Home</a>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>

    <script>
        function removeItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to remove this item from your cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Remove!',
                cancelButtonText: 'No, Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("<?php echo e(route('cart.remove', '')); ?>/" + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        },
                        body: JSON.stringify({
                            _method: 'POST'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Removed!',
                                text: data.message,
                                icon: 'success'
                            }).then(() => {
                                location.reload(); // Reload the page to update the cart
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => console.log('Error:', error));
                }
            });
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/cart/index.blade.php ENDPATH**/ ?>