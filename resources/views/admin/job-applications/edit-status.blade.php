<div class="modal-header">
    <h4 class="modal-title">
        <i class="icon-plus"></i> Edit Status
    </h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="fa fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form id="updateStatus" class="ajax-form" method="post">
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                        <label class="d-block control-label">Nama Status</label>
                        <input type="text" id="status_name" name="status_name" class="form-control" value="{{$status->status}}">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label class="d-block control-label">Warna Status</label>
                    <div id="cp2" class="input-group">
                        <input type="text" class="form-control input-lg" name="status_color" value="{{$status->color}}"/>
                        <span class="input-group-append">
                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label class="d-block control-label">Posisi Status</label>
                    <select name="status_position" id="status_position" class="select2 form-control">
                        <option selected value="no_change">Tidak Ada Perubahan</option>
                        @if ($status->position > 1)
                            <option value="before_first">{{'Before '.ucwords($firstStatus->status)}}</option>
                        @endif
                        @foreach ($statuses as $stat)
                            <option @if($stat->position === $status->position-1) selected @endif value="{{$stat->position}}">{{'After '.ucwords($stat->status)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Tutup</button>
    <button type="button" class="btn btn-success" onclick="javascript:updateStatus({{$status->id}});">Kirim</button>
</div>

<script>
    $(function() {
        $('#cp2').colorpicker();
    });
</script>