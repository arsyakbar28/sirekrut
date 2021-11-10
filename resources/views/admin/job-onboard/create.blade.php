@extends('layouts.app')
@push('head-script')
    <link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/multiselect/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/switchery/dist/switchery.min.css') }}">

    <style>
        .p-10{
            padding: 10px;
        }
        .select-file {
            height:40px;
            padding: 6px !important;
        }
        .form-control {
            height:40px !important;
        }
        .ml-10 {
           margin-left: 10px;
        }
    </style>
@endpush
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Pekerjaan Tertampil</h4>
                    <form id="createSchedule" class="ajax-form" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6  col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Nama Calon</label>
                                        <p>{{ $application->full_name }}</p>
                                        <input type="hidden" name="candidate_id" value="{{ $application->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6  col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">No. Handphone Calon </label>
                                        <p>{{ $application->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Email Calon</label>
                                        <p>{{ $application->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6  col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Lokasi Pekerjaan </label>
                                        <p>{{ ucwords($application->job->location->location) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Departemen
                                            <a href="javascript:;" title="Tambah Departemen"
                                               id="addDepartment"
                                               class="btn btn-sm  btn-info btn-outline"><i class="fa fa-gear"></i></a>
                                        </label>
                                        <select class="select2 m-b-10 form-control select2 "
                                                data-placeholder="Pilih Departemen" data-placeholder="Departemen" name="department" id="department">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ ucwords($department->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">@lang('app.designation')
                                            <a href="javascript:;" title="@lang('app.add') @lang('app.designation')"
                                               id="addDesignation"
                                               class="btn btn-sm btn-outline btn-info"><i class="fa fa-gear"></i></a>
                                        </label>
                                        <select class="select2 m-b-10 form-control select2 "
                                                data-placeholder="@lang('app.choose') @lang('app.designation')" data-placeholder="@lang('app.designation')" name="designation" id="designation">
                                            @foreach($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ ucwords($designation->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Gaji Yang Ditawarkan Per Bulan</label>
                                        <input type="number" class="form-control" min="0" name="salary" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Tanggal Bergabung</label>
                                        <input type="text" class="form-control datepicker" name="join_date" id="join_date" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Status Kerja Karyawan</label>
                                        <select class="m-b-10 form-control"
                                                data-placeholder="Status Kerja Karyawan" data-placeholder="Status Kerja Karyawan" name="employee_status">
                                                <option value="part_time">Part Time</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="on_contract">Dalam Kontrak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Melapor Kepada</label>
                                        <select class="select2 m-b-10 form-control select2"
                                                data-placeholder="Melapor Kepada" data-placeholder="Melapor Kepada" name="report_to">
                                            @foreach($users as $emp)
                                                <option value="{{ $emp->id }}">{{ ucwords($emp->name) }} @if($emp->id == $user->id)
                                                        (@lang('app.you')) @endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="d-block">Tanggal Terakhir</label>
                                        <input type="text" class="form-control datepicker" name="last_date" id="last_date" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Kirim Email Penawaran </label>

                                        <div class="col-sm-4">
                                            <div class="switchery-demo">
                                                <input id="nexmo_status" name="send_email" type="checkbox"
                                                       value="yes" class="js-switch change-language-setting"
                                                       data-color="#99d683" data-size="small"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-10">
                                    <label class="d-block ml-10">File Tawaran </label>
                                    <div id="addMoreBox1" class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div id="dateBox" class="form-group ">
                                                            <input type="text" name="name[]" class="form-control file-input" placeholder="Nama File">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input class="form-control select-file file-input" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx,.rtf" type="file" name="file[]"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="margin-top: 66px">

                                            </div>
                                        </div>

                                    </div>
                                    <div id="insertBefore"></div>
                                    <div class="clearfix">

                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" id="plusButton" class="btn btn-sm btn-info" style="margin-bottom: 20px">
                                            Tambahkan Lagi <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="button" class="btn btn-success save-onboard"><i
                                        class="fa fa-check"></i> Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Ajax Modal Start for--}}
    <div class="modal fade bs-modal-md in" id="addDepartmentModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-plus"></i> Departemen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>                
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn blue">Simpan Perubahan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--Ajax Modal Ends--}}
@endsection

@push('footer-script')
<script src="{{ asset('assets/node_modules/moment/moment.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/node_modules/switchery/dist/switchery.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>


<script>

    // Select 2 init.
    $(".select2").select2({
        formatNoMatches: function () {
            return "{{ __('messages.noRecordFound') }}";
        }
    });
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());

    });
    // Datepicker set
    $('#join_date').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: true,
    });

    // Datepicker set
    $('#last_date').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: true,
    });

    // Save Interview Schedule
    $('.save-onboard').click(function () {
        $.easyAjax({
            url: '{{route('admin.job-onboard.store')}}',
            container: '#createSchedule',
            type: "POST",
            file: true,
            success: function (response) {
                if(response.status == 'success'){
                    // window.location.reload();
                }
            }
        })
    })

    $('#addDepartment').click(function () {
        var url = "{{ route('admin.departments.create') }}";
        $('.modal-title').html("<i class='icon-plus'></i> Departemen");
        $.ajaxModal('#addDepartmentModal', url);
    });

    $('#addDesignation').click(function () {
        var url = "{{ route('admin.designations.create') }}";
        $('.modal-title').html("<i class='icon-plus'></i> @lang('app.designation')");
        $.ajaxModal('#addDepartmentModal', url);
    });

    var $insertBefore = $('#insertBefore');
    var $i = 0;

    // Add More Inputs
    $('#plusButton').click(function(){

        $i = $i+1;
        var indexs = $i+1;
        $(' <div id="addMoreBox'+indexs+'" class="col-md-12"> ' +
            '<div class="row">' +
            '<div class="col-md-11">' +
            '<div class="row">' +
            '<div class="col-md-5">' +
            '<div id="dateBox" class="form-group ">' +
            '<input type="text" name="name['+$i+']" class="form-control file-input" placeholder="Nama File">' +
            '</div>' +
            '</div>' +
            '<div class="col-md-5">' +
            '<div class="form-group">' +
            '<input class="form-control select-file file-input" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx,.rtf" type="file" name="file[]"><br>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<button type="button"  onclick="removeBox('+indexs+')"  class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>' +
            '</div>' +
            '</div>').insertBefore($insertBefore);

    });

    // Remove fields
    function removeBox(index){
        $('#addMoreBox'+index).remove();
    }
</script>

@endpush

