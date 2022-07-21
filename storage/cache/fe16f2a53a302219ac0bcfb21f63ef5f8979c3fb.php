<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
  <nav class="py-6">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <div class="inline-flex items-center gap-x-3">
        <button id="btn-menu" class="text-white lg:hidden md:hidden sm:hidden">
          <i class="fas fa-bars fa-lg"></i>
        </button>
        <h1 class="lg:text-3xl text-2xl font-semibold text-white">
          <a href="/">Wadahkode</a>
        </h1>
      </div>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center capitalize">
        <li><a href="/">Beranda</a></li>
        <li><a href="tutorial">Tutorial</a></li>
        <li><a href="contact">Kontak kami</a></li>
        <li><a href="about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  <div class="w-full h-screen flex lg:items-start md:items-start items-center cover">
    <div class="lg:container lg:mx-auto lg:mt-24 md:container md:mx-6 md:mt-24 mx-6">
      <?php if(isset($error)): ?>
        <div class="bg-red-600 p-4 text-white font-semibold tracking-wides rounded-md shadow"><?php echo e($error); ?></div>
      <?php endif; ?>
      <form class="lg:inline md:inline" action="/help/changepassword" method="post">
        <h1 class="text-2xl font-semibold tracking-wides text-white mb-2">Help password</h1>
        <input type="email" class="border border-gray-300 px-3 py-2 lg:w-2/4 w-full rounded focus:outline-none text-gray-600" name="email" placeholder="masukan email anda" required>
        <button type="submit" class="bg-green-600 mt-3 px-3 py-2 rounded text-white font-600 tracking-wides">Send request</button>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/framework-id/src/Templates/admin/settings/password.blade.php ENDPATH**/ ?>