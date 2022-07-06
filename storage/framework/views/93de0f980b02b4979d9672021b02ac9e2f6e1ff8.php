


<?php $__env->startSection('content'); ?>
  <div class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Add a Product</h2>
      <p class="mb-4">Create a new product</p>
    </header>

    <form method="POST" action="/products" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">Product Name</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
          value="<?php echo e(old('name')); ?>" />

        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-indigo-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <div class="mb-6">
        <label for="price" class="inline-block text-lg mb-2">Price</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
          value="<?php echo e(old('price')); ?>" />

        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-indigo-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <!-- <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Comma Separated)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="<?php echo e(old('tags')); ?>" />

        <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div> -->

      <div class="mb-6">
        <label for="image" class="inline-block text-lg mb-2">
          Product Image
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-indigo-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Product Description
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
          placeholder="Include usage, specifications, size etc."><?php echo e(old('description')); ?></textarea>

        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-indigo-500 text-xs mt-1"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-indigo-500 text-white rounded py-2 px-4 hover:bg-black">
          Create Product
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\project\test\laravel-paypal-api\resources\views/products/create.blade.php ENDPATH**/ ?>