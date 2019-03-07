<?php /* /home/alex/code/forum/resources/views/welcome.blade.php */ ?>
<?php $__env->startSection('title', 'Forum pentru case'); ?>

<?php $__env->startSection('content'); ?>
    <aside>
        <p>Subiecte recente</p>
        <?php $__currentLoopData = $recentSubtopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentSubtopic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><a href="/topic/<?php echo e($recentSubtopic->topic_id); ?>/subtopic/<?php echo e($recentSubtopic->id); ?>/message"><?php echo e($recentSubtopic->title); ?></a></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </aside>
    <table id="main">
        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="topic">
                <i class="fa fa-comments"></i>
                <a href="/topic/<?php echo e($topic->id); ?>"><?php echo e($topic->title); ?></a>
                <?php if(Illuminate\Support\Facades\Auth::check() &&  
                    Illuminate\Support\Facades\Auth::user()->name == 'admin'): ?>
                    <form action="/topic/<?php echo e($topic->id); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                    </form>
                    <form action="/topic/<?php echo e($topic->id); ?>/edit" method="GET">
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    </form>
                <?php endif; ?>
            </td>
            <td class="info"><span>Subiecte</span><span><?php echo e(count($topic->subtopics)); ?></span></td>
            <td class="info"><span>Mesaje</span><span><?php echo e(count($topic->messages)); ?></span></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php if(Illuminate\Support\Facades\Auth::check() &&  
        Illuminate\Support\Facades\Auth::user()->name == 'admin'): ?>
        <div class="create-link"><a href="/topic/create" class="btn btn-primary">Creează topic</a></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>