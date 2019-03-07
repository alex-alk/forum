<?php /* /home/alex/code/forum/resources/views/message.blade.php */ ?>
<?php $__env->startSection('title'); ?>
	<?php echo e($subtopic->title); ?>

<?php $__env->stopSection(); ?>

<?php if(!isset($action)): ?>
	<?php $__env->startSection('content'); ?>
		<table id="messages">
		<?php $__currentLoopData = $subtopic->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td class="profile">
					<div class="avatar"><?php echo e(strtoupper(substr($message->user->name, 0, 1))); ?></div>
					<div>
						<div><?php echo e($message->user->name); ?></div>
						<div>Înscris: <?php echo e($message->user->created_at); ?></div>
					</div>
				</td>
				<td class="body">
					<?php echo $message->body; ?>

					<?php if(Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == 'admin'): ?> 
						<form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/<?php echo e($message->id); ?>" method="POST">
				            <?php echo csrf_field(); ?>
				            <?php echo method_field('DELETE'); ?>
				            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
				        </form>
				    <?php elseif(Illuminate\Support\Facades\Auth::check() &&  
	                    Illuminate\Support\Facades\Auth::user()->name == $message->user->name): ?>
	                    <form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/<?php echo e($message->id); ?>" method="POST">
				            <?php echo csrf_field(); ?>
				            <?php echo method_field('DELETE'); ?>
				            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
				        </form>
				        <form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/<?php echo e($message->id); ?>/edit" method="GET">
				            <button type="submit" class="btn btn-warning btn-sm">Editare</button>
				        </form>
				    <?php else: ?>
				    <?php endif; ?>

			    </td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<table>
		<a href="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/create" class="create-link-messages btn btn-primary btn-sm">Scrie răspuns</a>
	<?php $__env->stopSection(); ?>
<?php elseif( $action == 'create'): ?>
	<?php $__env->startSection('content'); ?>
	    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
	    <script>tinymce.init({ selector:'textarea' });</script>
		<form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message" method="POST" class="form">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<label for="body">Mesaj: </label>
			<textarea name="body" class="form-control" id="body"></textarea>
		</div>
		<input type="hidden" name="subtopic" value="<?php echo e($subtopic->id); ?>">
		<button type="submit" class="btn btn-primary">Creează</button>
	</form>
	<?php $__env->stopSection(); ?>
<?php else: ?>
	<?php $__env->startSection('content'); ?>
		<form action="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/<?php echo e($message->id); ?>" method="POST" class="form">
			<?php echo csrf_field(); ?>
			<?php echo method_field('PATCH'); ?>
			<div class="form-group">
				<label for="body">Mesaj: </label>
				<textarea name="body" class="form-control" id="body"><?php echo e($message->body); ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>