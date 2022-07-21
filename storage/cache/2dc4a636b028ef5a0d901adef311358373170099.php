<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('components._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('components._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  <main id="main" class="px-5 py-2 overflow-hidden">
    <div id="posts-error"></div>
    <h2 class="font-semibold text-lg tracking-wides text-gray-600 mb-3">Edit postingan</h2>

    <form class="lg:grid grid-cols-3 flex flex-col gap-6 publish update draft" method="POST">
      <input type="hidden" name="uuid" id="uuid" value="<?php echo e($posts->id); ?>">
      <div class="col-span-2 lg:inline-grid flex flex-col gap-3">
        <div class="text-gray-600">
          <input type="text" id="title" class="w-full px-3 py-2 border border-gray-300 rounded" name="title" value="<?php echo e($posts->title); ?>" required>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col gap-2">
          <div class="text-gray-600 inline-flex flex-col gap-2" aria-required="true">
            <textarea cols="80" id="editor" rows="10" data-sample-short required><?php echo e(strip_tags(htmlspecialchars_decode($posts->content))); ?></textarea>
            <textarea cols="80" id="content" name="content" class="hidden" rows="10"><?php echo e(strip_tags(htmlspecialchars_decode($posts->content))); ?></textarea>
          </div>

          <div>
            <input type="file" name="foto" id="foto" value="<?php echo e($posts->foto); ?>">
          </div>
        </div>
      </div>

      <div class="bg-white shadow-lg rounded-lg px-4 py-2 flex flex-col gap-2 h-2/3">
        <div class="inline-flex flex-col gap-2 text-gray-600 relative">
          <label for="label">Label</label>
          <input type="text" name="label" id="label" class="w-full px-3 py-2 border border-gray-300 rounded" value="<?php echo e($posts->labels); ?>" autocomplete="off">
        </div>
        <div class="inline-flex flex-col gap-2 text-gray-600">
          <label for="description">Deskripsi</label>
          <textarea name="description" id="description" class="w-full px-3 py-2 border border-gray-300 rounded resize-none"><?php echo e($posts->description); ?></textarea>
        </div>

        <input type="hidden" name="author" id="author" value="<?php echo e($posts->author); ?>">
        <input type="hidden" name="created_at" id="created_at" value="<?php echo e($posts->createdAt); ?>">

        <div class="inline-flex gap-3 mt-3">
          <button type="button" class="hidden bg-red-400 text-white px-3 py-2 rounded-md btn-post" data-target=".draft">Simpan Dahulu</button>
          <button type="button" class="bg-green-400 text-white px-3 py-2 rounded-md btn-post" data-target=".update">Perbarui</button>
        </div>
      </div>
    </form>

  </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/framework-id/src/Templates/admin/posts/edit.blade.php ENDPATH**/ ?>