<?php /* /home/alex/code/forum/resources/views/topic-create.blade.php */ ?>
<?php $__env->startSection('title', 'Creează topic'); ?>

<?php $__env->startSection('content'); ?>
<form action="/topic" method="POST">
	<?php echo csrf_field(); ?>
	<div class="form-group">
		<label for="title">Titlu topic: </label>
		<input type="text" name="title" class="form-control" id="title">
	</div>
	<button type="submit" class="btn btn-primary">Creează</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>