

<?php $__env->startSection('content'); ?>
  <div class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
      <p class="mb-4">Create an account</p>
    </header>

    <form method="POST" action="/users">
      <?php echo csrf_field(); ?>
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2"> Name </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="<?php echo e(old('name')); ?>" />

        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="<?php echo e(old('email')); ?>" />

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
          Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
          value="<?php echo e(old('password')); ?>" />

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <label for="password2" class="inline-block text-lg mb-2">
          Confirm Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
          value="<?php echo e(old('password_confirmation')); ?>" />

        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-indigo-500 text-white rounded py-2 px-4 hover:bg-black">
          Sign Up
        </button>
      </div>

      <div class="mt-8">
        <p>
          Already have an account?
          <a href="/login" class="text-indigo-500">Login</a>
        </p>
      </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\project\test\laravel-paypal-api\resources\views/auth/register.blade.php ENDPATH**/ ?>