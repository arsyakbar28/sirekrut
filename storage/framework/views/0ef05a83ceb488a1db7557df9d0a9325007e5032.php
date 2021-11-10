<div class="modal-header">
    <h4 class="modal-title"><?php if(isset($noteDetail->id)): ?> <?php echo app('translator')->get('app.edit'); ?> <?php else: ?> <?php echo app('translator')->get('app.addNew'); ?> <?php endif; ?> <?php echo app('translator')->get('app.note'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

</div>
<div class="modal-body">
    <div class="form-group">
        <label for="note-text" class="control-label"><?php echo app('translator')->get('app.note'); ?>:</label>
        <textarea class="form-control" id="notetext" name="notetext"><?php if(isset($noteDetail->note_text)): ?> <?php echo e($noteDetail->note_text); ?> <?php endif; ?></textarea>
        <div class="form-control-focus"> </div>
        <span class="help-block"></span>
        <input type="hidden" id="stickyID" value="<?php if(isset($noteDetail->id)): ?> <?php echo e($noteDetail->id); ?> <?php endif; ?>">
        <input type="hidden" id="stickyColor" value="<?php if(isset($noteDetail->colour)): ?> <?php echo e($noteDetail->colour); ?> <?php endif; ?>">
    </div>
    <div class="skin skin-minimal">
        <div class="form-group">
            <label><?php echo app('translator')->get('modules.sticky.colors'); ?></label>
            <div class="input-group">
                <ul class="icolors">
                    <li id="red" onclick="selectColor('red')" class="red selectColor  <?php if(isset($noteDetail->colour)  && $noteDetail->colour == 'red' ): ?> active <?php endif; ?>"></li>
                    <li id="green" onclick="selectColor('green')"  class="green selectColor  <?php if(isset($noteDetail->colour)  && $noteDetail->colour == 'green' ): ?> active <?php endif; ?>"></li>
                    <li id="blue" onclick="selectColor('blue')"  class="blue selectColor  <?php if(isset($noteDetail->colour)  && $noteDetail->colour == 'blue' ): ?> active <?php endif; ?>"></li>
                    <li id="yellow" onclick="selectColor('yellow')"  class="yellow selectColor  <?php if(isset($noteDetail->colour)  && $noteDetail->colour == 'yellow' ): ?> active <?php endif; ?>"></li>
                    <li id="purple" onclick="selectColor('purple')"  class="purple selectColor  <?php if(isset($noteDetail->colour)  && $noteDetail->colour == 'purple' ): ?> active <?php endif; ?>"></li>
                </ul>
            </div>
            <span class="help-block"><?php echo app('translator')->get('messages.defaultColorNote'); ?></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" onclick="addOrEditStickyNote('<?php if(isset($noteDetail->id)): ?> <?php echo e($noteDetail->id); ?> <?php endif; ?>')" class="btn btn-danger waves-effect waves-light"><?php if(isset($noteDetail->id)): ?> <?php echo app('translator')->get('app.update'); ?> <?php else: ?> <?php echo app('translator')->get('app.save'); ?> <?php endif; ?></button>
</div><?php /**PATH C:\xampp\htdocs\SiRekrutV1\resources\views/admin/sticky-note/create-edit.blade.php ENDPATH**/ ?>