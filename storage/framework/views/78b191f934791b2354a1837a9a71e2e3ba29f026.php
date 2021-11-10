<div class="modal-header">
    <h4 class="modal-title"><?php echo app('translator')->get('modules.module.todos.editTodoItem'); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <form id="editTodoItem" class="ajax-form" method="POST" autocomplete="off">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-sm-12">

                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.module.todos.form.title'); ?></label>

                        <input type="text" class="form-control form-control-lg" id="title" name="title" value="<?php echo e($todoItem->title); ?>">
                    </div>

                    <div class="form-group">
                        <label for="status"><?php echo app('translator')->get('modules.module.todos.form.status'); ?></label>
                        <select id="status" class="form-control" name="status">
                            <option <?php if($todoItem->status == 'pending'): ?> selected <?php endif; ?> value="pending"><?php echo app('translator')->get('modules.module.todos.pending'); ?></option>
                            <option <?php if($todoItem->status == 'completed'): ?> selected <?php endif; ?> value="completed"><?php echo app('translator')->get('modules.module.todos.completed'); ?></option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="update-todo-item" class="btn btn-success" data-id="<?php echo e($todoItem->id); ?>">
                Ubah
                <i class="fa fa-arrow-right"></i>
            </button>
        </div>
    </form>
</div>

<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/todo-list/todo-item-edit.blade.php ENDPATH**/ ?>