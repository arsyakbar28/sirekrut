<?php $__currentLoopData = $stickyNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-12 sticky-note" id="stickyBox_<?php echo e($note->id); ?>">
        <div class="well bg-<?php echo e($note->colour); ?> b-none">
            <p><?php echo nl2br($note->note_text); ?></p>
            <hr>
            <div class="row font-12">
                <div class="col-md-9">
                    <?php echo app('translator')->get("modules.sticky.lastUpdated"); ?>: <?php echo e($note->updated_at->diffForHumans()); ?>

                </div>
                <div class="col-md-3">
                    <a href="javascript:;"  onclick="showEditNoteModal(<?php echo e($note->id); ?>)"><i class="ti-pencil-alt"></i></a>
                    <a href="javascript:;" class="m-l-5" onclick="deleteSticky(<?php echo e($note->id); ?>)" ><i class="ti-close"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/sticky-note/note-ajax.blade.php ENDPATH**/ ?>