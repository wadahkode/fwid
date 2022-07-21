<?php $__env->startSection('title', 'Administrator | Wadahkode'); ?>

<?php $__env->startSection('main'); ?>
  <div>
    <form action="/admin/signin" method="post">
      <div><input type="email" name="email" placeholder="input your email" required></div>
      <div><input type="password" name="password" placeholder="input your password" required></div>
      <div>
        <button type="submit">Signin</button>
      </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/fwid/src/Templates/admin/index.blade.php ENDPATH**/ ?>