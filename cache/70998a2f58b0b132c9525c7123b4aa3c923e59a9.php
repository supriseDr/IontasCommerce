<?php echo $__env->make('./admin/src/views/base/start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('./admin/src/views/base/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
  
  <?php echo $__env->make('./admin/src/views/base/sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    
    <!-- General Report -->
    <?php echo $__env->make('./admin/src/views/index/generalReport', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End General Report -->

    <!-- strat Analytics -->
    <?php echo $__env->make('./admin/src/views/index/analytics-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end Analytics -->

    <!-- Sales Overview -->
    <?php echo $__env->make('./admin/src/views/index/salesOverview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end Sales Overview -->

    <!-- start numbers -->
    <?php echo $__env->make('./admin/src/views/index/numbers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end nmbers -->

    <!-- start quick Info -->
    <?php echo $__env->make('./admin/src/views/index/quickInfo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end quick Info -->
        

  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<?php echo $__env->make('./admin/src/views/base/end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/jing/Documents/IontasCommerce/views/admin/src/views/index.blade.php ENDPATH**/ ?>