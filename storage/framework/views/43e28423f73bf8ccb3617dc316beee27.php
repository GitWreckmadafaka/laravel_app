<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP for Profile Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .otp-verification-container {
            margin-top: 30px;
            padding: 30px;
            border: 2px solid #007bff; /* Border color for the OTP verification container */
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .back-link {
            margin-left: auto; /* Aligns the link to the far right */
            margin-top: 0; /* Removes default margin-top */
            display: inline-block; /* Makes the link align nicely */
            padding: 6px 12px; /* Add some padding for better aesthetics */
            color: #007bff; /* Bootstrap primary color */
            text-decoration: none; /* Removes underline */
        }
        .back-link:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="otp-verification-container">
            <h2 class="text-center">"Please check your email for the One-Time Password that has been sent, and enter it in the box provided."</h2>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('otp.profile.update.verify')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="otp">One-Time Password</label>
                    <input type="text" class="form-control" id="otp" name="otp" required>
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Verify OTP</button>
                    <a href="<?php echo e(route('profile.edit')); ?>" class="back-link">Back to Edit Profile</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/auth/otp_profile_update.blade.php ENDPATH**/ ?>