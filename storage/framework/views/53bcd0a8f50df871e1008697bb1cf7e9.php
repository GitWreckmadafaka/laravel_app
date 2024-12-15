<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .edit-profile-container {
            margin-top: 30px;
            padding: 30px;
            border: 2px solid #007bff; /* Border color for the edit profile container */
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="edit-profile-container">
            <h1 class="text-center">Edit Profile</h1>

            <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(url('/profile/edit')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo e(Auth::user()->firstname); ?>" required>
                </div>
                <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo e(Auth::user()->middlename); ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo e(Auth::user()->lastname); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="<?php echo e(Auth::user()->age); ?>" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo e(Auth::user()->birthdate); ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male" <?php echo e(Auth::user()->gender == 'male' ? 'selected' : ''); ?>>Male</option>
                        <option value="female" <?php echo e(Auth::user()->gender == 'female' ? 'selected' : ''); ?>>Female</option>
                        <option value="other" <?php echo e(Auth::user()->gender == 'other' ? 'selected' : ''); ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo e(Auth::user()->address); ?>" required>
                </div>
                <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo e(Auth::user()->zipcode); ?>" required>
                </div>
                <div class="form-group">
                    <label for="profile_image">Profile Image</label>
                    <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                    <?php if(Auth::user()->profile_image): ?>
                        <p>Current Image: <img src="<?php echo e(asset('storage/' . Auth::user()->profile_image)); ?>" alt="Profile Image" width="100"></p>
                    <?php else: ?>
                        <p>No image uploaded</p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank if you don't want to change">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Leave blank if you don't want to change">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>

            <div class="mt-4 text-center">
                <a href="/home" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\LABWORKSY\resources\views/profile/edit_profile.blade.php ENDPATH**/ ?>