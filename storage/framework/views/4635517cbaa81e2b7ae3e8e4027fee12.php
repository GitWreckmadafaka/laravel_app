

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Hello <?php echo e($user->name); ?>,</h1>
    <p>Thank you for registering! Please verify your email address by clicking the link below:</p>
    <a href="<?php echo e($url); ?>">Verify Email</a>
    <p>If you did not create an account, no further action is required.</p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/emails/verify.blade.php ENDPATH**/ ?>