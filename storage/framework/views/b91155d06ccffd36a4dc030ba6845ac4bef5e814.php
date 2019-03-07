<?php /* /home/alex/code/forum/resources/views/subtopic-desc.blade.php */ ?>
<?php $__env->startSection('title', 'Ansambluri rezidențiale'); ?>

<?php $__env->startSection('content'); ?>

<?php echo e($subtopic->title); ?>

<p>mesaje</p>
<a href="/topic/<?php echo e($topic->id); ?>/subtopic/<?php echo e($subtopic->id); ?>/message/create">Scrie mesaj</a>


<?php $__currentLoopData = $subtopic->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($message->body); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>