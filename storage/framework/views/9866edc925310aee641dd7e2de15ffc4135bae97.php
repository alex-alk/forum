<?php /* /home/alex/code/forum/resources/views/ansambluri.blade.php */ ?>
<?php $__env->startSection('title', 'Ansambluri rezidențiale'); ?>

<?php $__env->startSection('content'); ?>
	<table>
		<tr>
			<td>Dată</td>
			<td>Replici</td>
			<td><a href="/ansambluri/create">Creează post</a></td>
		</tr>
		<tr>
			<td> Style Resodence</td>
		</tr>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>