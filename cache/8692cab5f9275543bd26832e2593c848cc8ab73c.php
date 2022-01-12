
<!doctype html>
<html>
    
    <?php echo $__env->make('./components/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>  
    
    <script src="assets/js/alpine.min.js" defer></script>
    
    <?php echo $__env->make('./components/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('./components/products-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1 class="text-3xl font-bold underline">    Hello <?php echo e($foo); ?> ! </h1>

    </body>
</html><?php /**PATH /home/jing/Documents/IontasCommerce/views/homepage.blade.php ENDPATH**/ ?>