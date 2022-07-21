<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <?php if(file_exists('dist/styles.css')): ?>
    <link rel="stylesheet" href="<?php echo e(asset('/dist/styles.css')); ?>">
  <?php endif; ?>
</head>
<body class="antialised bg-gray-200" style="font-family: 'Lato', sans-serif;">
  <div id="root"><?php echo $__env->yieldContent('main'); ?></div>

  <?php if(file_exists('dist/main.js')): ?>
    <script src="<?php echo e(asset('dist/main.js')); ?>"></script>
    <script src="<?php echo e(asset('dist/runtime.js')); ?>"></script>
  <?php endif; ?>
</body>
</html><?php /**PATH /var/www/html/framework-id/src/Templates/layouts/admin.blade.php ENDPATH**/ ?>