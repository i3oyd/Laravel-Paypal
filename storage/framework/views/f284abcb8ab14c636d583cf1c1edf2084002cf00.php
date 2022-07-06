

<?php $__env->startSection('content'); ?>
<section class="text-gray-700 body-font">
        <div class="container flex flex-col px-5 py-24 mx-auto">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full mb-4">
                    <a class="block relative h-48 rounded overflow-hidden" href= "/products/<?php echo e($product->id); ?>">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full mb-4">
                    <!-- <router-link
                        class="block relative h-48 rounded overflow-hidden"
                        :to="{name: 'products.show', params: {slug: product.slug}}"
                    >
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                    </router-link> -->
                    <div class="mt-4">
                        <h2
                            class="text-gray-900 title-font text-lg font-medium"
                        ><?php echo e($product->name); ?></h2>
                        <p class="mt-1"><?php echo e($product->price); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</section>

<?php if(auth()->guard()->check()): ?>
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-indigo-600 text-white h-24 mt-24 opacity-90 md:justify-center">
    <a href="/product/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add Product</a>
</footer>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\project\test\laravel-paypal-api\resources\views/products/index.blade.php ENDPATH**/ ?>