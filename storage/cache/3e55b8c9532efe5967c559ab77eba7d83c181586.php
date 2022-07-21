<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
  <nav class="bg-gray-900 py-3">
    <div class="lg:container lg:mx-auto mx-6 flex items-center gap-x-6">
      <h1 class="lg:text-3xl text-2xl font-semibold text-white">
        <a href="/">Wadahkode</a>
      </h1>

      <ul class="ml-auto text-white gap-x-6 hidden lg:inline-flex md:inline-flex items-center">
        <li><a href="/">Beranda</a></li>
        <li><a href="contact">Kontak kami</a></li>
        <li><a href="about">Tentang kami</a></li>
      </ul>
    </div>
  </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  <div class="grid grid-cols-3 gap-12 mt-20 container mx-auto">
    <div class="col-span-2 inline-grid gap-y-3">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="bg-gray-100 shadow-md p-4 flex rounded-md">
          <picture>
            <img src="<?php echo e($article->foto); ?>" alt="">
          </picture>
          <div class="inline-flex flex-col gap-y-3">
            <div>
              <h3 class="text-xl font-semibold tracking-wides"><?php echo e(ucwords($article->title)); ?></h3>
              <p class="text-xs">
                by <i><?php echo e($article->author); ?></i> -
                <time datetime="<?php echo e($article->updatedAt); ?>">
                  <?php echo e($article->updatedAt); ?>

                </time>
              </p>
            </div>
  
            <div>
              <?php echo e($article->content); ?>

            </div>
          </div>
        </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div>kolom</div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/framework-id/src/Templates/article.blade.php ENDPATH**/ ?>