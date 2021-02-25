@extends('layouts.layout')

@section('content')
<section id="task_detail">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Chi tiết công việc</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-dark font-weight-bold">Ngày yêu
                                            cầu</span>
                                        <span
                                            class="info-box-number text-center  mb-0 text-primary">{{ date('d-m-Y H:i:s', strtotime($task->required_date)) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-dark font-weight-bold">Ngày hoàn
                                            thành</span>
                                        <span
                                            class="info-box-number text-center  mb-0 text-danger">{{ date('d-m-Y H:i:s', strtotime($task->success_date)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0 text-muted text-uppercase font-weight-bold">Nội dung công việc:
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <label class="col-form-label">Thiết bị:</label>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <p>{{ $task->device->name }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <label class="col-form-label">Chi nhánh:</label>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                <p>{{ $task->branch->name }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <label class="col-form-label">Tình trạng hư hỏng:</label>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                {!! $task->device_damaged !!}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <label class="col-form-label">kết quả:</label>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                @switch($task->result)
                                                    @case(1)
                                                        <span class="badge bg-info">Đang xử lý</span>
                                                        @break
                                                    @case(2)
                                                        <span class="badge bg-success">Đã hoàn thành</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-danger">Đang đặt hàng</span>
                                                @endswitch
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <label class="col-form-label">lưu ý:</label>
                                            </div>
                                            <div class="col-12 col-sm-9">
                                                {!! $task->note !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0">Hình ảnh thiết bị hư hỏng</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="show_image_device_damaged mt-2">
                                            @if ($task->image_device_damaged)
                                                @foreach (explode(',', $task->image_device_damaged) as $img)
                                                <div class="border col-3">
                                                    <img src="{{ $img }}" alt="" class="img-fluid">
                                                </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted">Không có hình ảnh nào.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="m-0">Hình ảnh kết quả</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="show_image_result">
                                            @if ($task->image_result)
                                                @foreach (explode(',', $task->image_result) as $img)
                                                <div class="border col-3">
                                                    <img src="{{ $img }}" alt="" class="img-fluid">
                                                </div>
                                                @endforeach
                                            @else
                                                <p class="text-muted">Không có hình ảnh nào.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div class="card card-widget widget-user-2 shadow-sm"
                            style="border: 1px solid rgba(0, 0, 0, 0.125);">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-primary">
                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2 bg-dark"
                                        src="{{ Avatar::create($task->technician->name)->toBase64() }}"
                                        alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{ $task->technician->name }}</h3>
                                <h5 class="widget-user-desc">{{ $task->technician->permission->name }}</h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-info font-weight-bold">
                                            Công việc <span
                                                class="float-right badge bg-info">{{ $tasks->where('technicians_id', $task->technicians_id)->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-danger font-weight-bold">
                                            Công việc đang xử lý <span
                                                class="float-right badge bg-danger">{{ $tasks->where('technicians_id', $task->technicians_id)->where('result', 1)->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link text-success font-weight-bold">
                                            Công việc đã hoàn thành <span
                                                class="float-right badge bg-success">{{ $tasks->where('technicians_id', $task->technicians_id)->where('result', 2)->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0 text-muted text-uppercase font-weight-bold">Thông tin liên hệ:
                                </h5>
                            </div>
                            <div class="card-body">
                                <h5 class=" text-muted text-uppercase font-weight-bold">Kỹ thuật viên</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                            {{ $task->technician->email}}</a>
                                    </li>
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i
                                                class="far fa-fw fas fa-phone-volume"></i>
                                            {{ $task->technician->phone}}</a>
                                    </li>
                                </ul>
                                <hr>
                                <h5 class="mt-4 text-muted text-uppercase font-weight-bold">Người yêu cầu</h5>
                                <h3 class="text-primary"><img
                                        src="{{ Avatar::create($task->creator->name)->toBase64() }}"
                                        class="img-circle elevation-2 bg-dark" alt="User Image" width="35">
                                    {{ $task->creator->name }}</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                            {{ $task->creator->email}}</a>
                                    </li>
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i
                                                class="far fa-fw fas fa-phone-volume"></i>
                                            {{ $task->creator->phone}}</a>
                                    </li>
                                    <li>
                                        <a href="" class="btn-link text-secondary"><i class="far fa-fw fas fa-briefcase"></i>
                                            {{ $task->creator->permission->name }}</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection

@section('linkcss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"> --}}
@endsection

@section('linkjs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script defer>
    $('#device_damaged, #note').summernote()
    $('#result').select2({
        theme: 'bootstrap4'
    })
    $('#result').val({{ $task->result }}).trigger('change')
</script>
@endsection