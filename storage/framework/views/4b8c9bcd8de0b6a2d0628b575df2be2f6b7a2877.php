<?php /* /home/alex/code/forum/resources/views/topic.blade.php */ ?>
<?php $__env->startSection('title', 'Creează topic'); ?>

<?php $__env->startSection('content'); ?>

	<?php if(isset($topic)): ?>
		<form action="/topic/<?php echo e($topic->id); ?>" method="POST" class="form">
			<?php echo csrf_field(); ?>
			<?php echo method_field('PATCH'); ?>
			<div class="form-group">
				<label for="title">Titlu topic: </label>
				<input type="text" name="title" class="form-control" id="title" value="<?php echo e($topic->title); ?>">
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	<?php else: ?>
		<form action="/topic" method="POST" class="form">
			<?php echo csrf_field(); ?>
			<div class="form-group">
				<label for="title">Titlu topic: </label>
				<input type="text" name="title" class="form-control" id="title">
			</div>
			<button type="submit" class="btn btn-primary">Creează</button>
		</form>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>