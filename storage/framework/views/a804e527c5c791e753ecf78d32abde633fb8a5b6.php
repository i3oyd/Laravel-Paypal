    
    
    <?php $__env->startSection('content'); ?>
    <section class="text-gray-700 body-font overflow-hidden">   
        <div class="container px-12 py-24 mx-auto">
            <div class="lg:w-3/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/600x400">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h2
                        class="text-sm title-font text-gray-500 tracking-widest uppercase inline-block mr-2"
                    ></h2>
                    <h1
                        class="text-gray-900 text-3xl title-font font-medium mb-2"
                    ><?php echo e($product->name); ?></h1>
                    <p
                        class="leading-relaxed"
                    ><?php echo e($product->description); ?></p>
                    <div class="flex mt-6 pt-4 border-t-2 border-gray-200">
                        <span
                            class="title-font font-medium text-2xl text-gray-900"
                        ><?php echo e($product->price); ?></span>
                        <form action="/pay" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="amount" value="<?php echo e($product->price); ?>">
                        <button type="submit"
                            class="flex ml-auto text-yellow-300 bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"
                        >Pay with Paypal</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\project\test\laravel-paypal-api\resources\views/products/show.blade.php ENDPATH**/ ?>