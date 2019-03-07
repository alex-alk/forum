<?php /* /home/alex/code/forum/resources/views/creeaza-post.blade.php */ ?>
<?php $__env->startSection('title', 'Creează articol'); ?>

<?php $__env->startSection('content'); ?>
<form action="/topic/<?php echo e($topic->id); ?>/subtopic" method="POST">
	<?php echo csrf_field(); ?>
	<div class="form-group">
		<label for="title">Titlul: </label>
		<input type="text" name="title" class="form-control" id="title">
	</div>
	<input type="hidden" name="topic" value="<?php echo e($topic->id); ?>">
	<button type="submit" class="btn btn-primary">Creează</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>