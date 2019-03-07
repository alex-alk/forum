<?php /* /home/alex/code/forum/resources/views/subtopics.blade.php */ ?>
<?php $__env->startSection('title', 'Ansambluri rezidențiale'); ?>

<?php $__env->startSection('content'); ?>
	<table>
		<tr>
			<td>Dată</td>
			<td>Replici</td>
			<td><a href="/topic/<?php echo e($topic->id); ?>/subtopic/create">Creează articol</a></td>
		</tr>
		<?php $__currentLoopData = $subtopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td> <a href="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>"><?php echo e($subtopic->title); ?></a></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>