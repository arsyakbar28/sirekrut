<div class="modal-header">
    <h4 class="modal-title">Buat Item Tugas</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <form id="createTodoItem" class="ajax-form" method="POST" autocomplete="off">
        <?php echo csrf_field(); ?>
        <div class="form-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Judul</label>

                        <input type="text" class="form-control form-control-lg" id="title" name="title">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="create-todo-item" class="btn btn-success">Buat <i class="fa fa-arrow-right"></i></button>
        </div>
    </form>
</div>
<?php /**PATH D:\kuliah\Belajar\web\laravel\SiRekrutV1\resources\views/admin/todo-list/todo-item-create.blade.php ENDPATH**/ ?>