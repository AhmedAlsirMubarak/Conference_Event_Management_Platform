<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SCW</title>
    <link rel="icon" type="image/webp" href="<?php echo e(asset('images/scw-logo.webp')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-linear-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Saudi Climate Week</h1>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Welcome Back</h2>

            <!-- Error Messages -->
            <?php if($errors->any()): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-700 text-sm font-medium mb-2">Login Failed</p>
                    <ul class="space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-red-600 text-sm"><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="you@example.com">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="••••••••">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full mt-6 bg-linear-to-r from-cyan-500 to-cyan-600 hover:from-cyan-600 hover:to-cyan-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="grow border-t border-gray-300"></div>
                <div class="grow border-t border-gray-300"></div>
            </div>



            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-gray-600">
                <p>© 2025 developed by <a href="https://www.linkedin.com/in/ahmed-alsir-20a3a8151/" target="_blank"
                        rel="noopener noreferrer" class="text-cyan-600 hover:text-cyan-700 font-medium">Ahmed Alsir
                        Mubarak</a>. All rights reserved.</p>
            </div>
        </div>
</body>

</html><?php /**PATH C:\laragon\www\SCW-app\resources\views/auth/login.blade.php ENDPATH**/ ?>