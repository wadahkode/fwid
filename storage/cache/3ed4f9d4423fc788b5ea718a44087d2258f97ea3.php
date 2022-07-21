<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
  <nav class="bg-gray-900 py-3">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <div class="inline-flex items-center gap-x-3">
        <button id="btn-menu" class="text-white lg:hidden md:hidden sm:hidden">
          <i class="fas fa-bars fa-lg"></i>
        </button>
        <h1 class="lg:text-3xl text-2xl font-semibold text-white">
          <a href="/">Wadahkode</a>
        </h1>
      </div>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center">
        <li><a href="/">Beranda</a></li>
        <li><a href="/tutorial">Tutorial</a></li>
        <li><a href="/contact">Kontak kami</a></li>
        <li><a href="/about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  <div class="lg:grid lg:grid-cols-3 lg:gap-12 flex flex-col gap-6 mt-20 lg:container mx-auto lg:p-0 px-5">
    <div class="col-span-2 inline-grid gap-y-3">
      <h1 class="text-2xl font-semibold">Tutorial terbaru</h1>
      <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="bg-white shadow-md lg:p-0 p-4 lg:flex md:flex sm:flex _gap-3 rounded-md">
          <picture class="lg:h-48 lg:w-1/3 md:h-42 md:w-1/3 h-48 w-full inline-flex items-center justify-center p-4">
            <img src="<?php echo e($post->foto); ?>" class="object-cover" alt="">
          </picture>
          <div class="inline-flex flex-col gap-y-3 py-4">
            <div>
              <h3 class="text-xl tracking-wides"><?php echo e(ucwords($post->title)); ?></h3>
              <p class="text-xs mb-2">
                by <i><?php echo e($post->author); ?></i> -
                <time datetime="<?php echo e($post->updatedAt); ?>" lang="en-US" format="id-ID">
                  
                </time>
              </p>
              <div id="label"><?php echo e($post->labels); ?></div>
            </div>
  
            <div class="pr-4">
              <?php echo e(maxviews(strip_tags(htmlspecialchars_decode($post->content)), 100)); ?>

              <a href="tutorial/p/<?php echo e($post->id); ?>" class="text-blue-600">Baca selengkapnya</a>
            </div>
          </div>
        </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="hidden">kolom</div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/apolbox/src/Templates/tutorials/index.blade.php ENDPATH**/ ?>