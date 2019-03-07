<?php /* /home/alex/code/forum/resources/views/subtopic.blade.php */ ?>
<?php $__env->startSection('title'); ?>
	<?php echo e($topic->title); ?>

<?php $__env->stopSection(); ?>

<?php if(!isset($action)): ?>
	<?php $__env->startSection('content'); ?>
		<table id="main">
			<?php $__currentLoopData = $subtopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td class="topic">
					<a href="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message"><?php echo e($subtopic->title); ?></a>
					<span class="under"><?php echo e($subtopic->user->name); ?></span>, 
					<span><?php echo e($subtopic->created_at); ?></span>
					<?php if(Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == 'admin'): ?>
	                    <form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>" method="POST">
	                        <?php echo csrf_field(); ?>
	                        <?php echo method_field('DELETE'); ?>
	                        <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
	                    </form>
	                <?php endif; ?>
				</td>
	            <td class="info"><span>Mesaje</span><span><?php echo e(count($subtopic->messages)); ?></span></td>
	            <td class="info"><span>Vizualizări</span><span><?php echo e($subtopic->views); ?></span></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
		<a href="/topic/<?php echo e($topic->id); ?>/subtopic/create" class="create-link btn btn-primary btn-sm">Creează subiect</a>
		<?php if(isset($message)): ?>
		 <?php echo e($message); ?>

		<?php endif; ?>
	<?php $__env->stopSection(); ?>
<?php else: ?>
	<?php $__env->startSection('content'); ?>
	<form action="/topic/<?php echo e($topic->id); ?>/subtopic" method="POST" class="form">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<label for="title">Titlul subiectului: </label>
			<input type="text" name="title" class="form-control" id="title">
		</div>
		<input type="hidden" name="topic" value="<?php echo e($topic->id); ?>">
		<button type="submit" class="btn btn-primary">Creează</button>
	</form>
	<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>