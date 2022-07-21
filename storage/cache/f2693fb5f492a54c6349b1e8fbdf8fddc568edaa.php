<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
  <nav class="py-4 bg-gray-800">
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
        <li><a href="/tutorial">Tutorial</a></li>
        <li><a href="/contact">Kontak kami</a></li>
        <li><a href="/about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  <div class="w-full h-screen flex lg:items-start md:items-start items-center _cover">
    <?php if(isset($message)): ?>
      <div class="lg:container lg:mx-auto lg:mt-24 md:container md:mx-6 md:mt-24 mx-6">
        <div class="lg:w-1/2 md:1/2 w-full bg-red-600 p-4 text-white font-semibold tracking-wides rounded-md shadow"><?php echo e($message); ?></div>
      </div>
    <?php else: ?>
      <div class="lg:container lg:mx-auto lg:mt-24 md:container md:mx-6 md:mt-24 mx-6">
        <?php if(isset($reset)): ?>
          <form class="lg:inline md:inline" action="/admin/help/password/save" method="post">
            <h1 class="text-2xl font-semibold tracking-wides text-gray-600 mb-2">Create new password</h1>

            <div>
              <input type="password" class="border border-gray-300 px-3 py-2 lg:w-2/4 w-full rounded focus:outline-none text-gray-600" name="password" placeholder="kata sandi baru" required>
            </div>
            <button type="submit" class="bg-green-600 mt-3 px-3 py-2 rounded text-white font-600 tracking-wides">Confirm</button>
          </form>
        <?php else: ?>
          <form class="lg:inline md:inline" action="/admin/help/password/request" method="post">
            <h1 class="text-2xl font-semibold tracking-wides text-gray-600 mb-2">Help password</h1>
            <input type="email" class="border border-gray-300 px-3 py-2 lg:w-2/4 w-full rounded focus:outline-none text-gray-600" name="email" placeholder="masukan email anda" required>
            <button type="submit" class="bg-green-600 mt-3 px-3 py-2 rounded text-white font-600 tracking-wides">Send request</button>
          </form>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/framework-id/src/Templates/password.blade.php ENDPATH**/ ?>