<?php /* /home/alex/code/forum/resources/views/message-create.blade.php */ ?>
<?php $__env->startSection('title', 'Creează articol'); ?>

<?php $__env->startSection('content'); ?>
<form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message" method="POST">
	<?php echo csrf_field(); ?>
	<div class="form-group">
		<label for="body">Titlul: </label>
		<input type="text" name="body" class="form-control" id="body">
	</div>
	<input type="hidden" name="subtopic" value="<?php echo e($subtopic->id); ?>">
	<button type="submit" class="btn btn-primary">Creează</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>