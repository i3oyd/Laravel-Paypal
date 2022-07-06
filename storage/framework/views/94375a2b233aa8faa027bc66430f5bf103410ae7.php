<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container">
        <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH F:\project\test\laravel-paypal-api\resources\views/layouts/app.blade.php ENDPATH**/ ?>