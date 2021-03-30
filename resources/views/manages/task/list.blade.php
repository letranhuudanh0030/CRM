@extends('layouts.layout')

@section('title_page')
Quản lý công việc bảo trì
@endsection

@section('content')
<section id="list-device">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 38px;">{{ $title }}</h3>
                        <button class="btn bg-gradient-success float-right px-4" type="button" data-toggle="modal"
                            data-target="#modal_task" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="float-left" style="width: 30%">
                            <select name="branch_export" id="branch_export" class="form-control">
                                <option value="">Chọn chi nhánh</option>
                                @foreach ($branchs as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <a href="/task/export" class="btn btn-primary float-left">Tải Excel</a> --}}
                        {{-- <a href="/task/export_pdf" class="ml-1 btn btn-danger export-excel" id="pdf_export">Tải PDF</a> --}}
                        <button class="btn btn-primary float-left" id="excel_export">Tải Excel</button>
                        <button class="ml-1 btn btn-danger export-excel" id="pdf_export">Tải PDF</button>
                        <table id="data_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thiết bị</th>
                                    <th>Chi nhánh</th>
                                    <th>Kỹ thuật</th>
                                    <th>Người yêu cầu</th>
                                    <th>Ngày yêu cầu</th>
                                    <th>Ngày hoàn thành</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @foreach ($tasks as $task)
                                <tr class="item-{{ $task->id }}">
                                    <td>{{ $task->id }}</td>
                                    <td class="device-row-{{ $task->id }}" device-id="{{ $task->device['id'] }}">{{ $task->device['name'] }}</td>
                                    <td class="branch-row-{{ $task->id }}">{{ $task->branch['name'] }}</td>
                                    <td class="technician-row-{{ $task->id }}">{{ $task->technician['name'] }}</td>
                                    <td class="creator-row-{{ $task->id }}">{{ $task->creator['name'] }}</td>
                                    <td class="created-row-{{ $task->id }}">
                                        {{ $task->required_date ? date('d-m-Y H:i:s', strtotime($task->required_date)) : date('d-m-Y H:i:s', strtotime($task->created_at)) }}</td>
                                    <td class="success-row-{{ $task->id }}">
                                        {!! $task->success_date ? date('d-m-Y H:i:s', strtotime($task->success_date)) : "<span class='badge badge-secondary'>Đang chờ cập nhật</span>" !!}</td>
                                    <td class="text-right">
                                        <button class="btn bg-gradient-info" type="button" data-toggle="modal"
                                            data-target="#modal_task" data-action="edit" data-name="Chỉnh sửa"
                                            data-object="{{ $task }}" id="edit_task"><i class="fas fa-pencil-alt"></i> Chỉnh
                                            sửa</button>
                                        <button class="btn bg-gradient-danger" type="button" data-toggle="modal"
                                            data-target="#modal_remove" data-object="{{ $task }}"
                                            data-url="/task/delete"><i class="fas fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Thiết bị</th>
                                    <th>Chi nhánh</th>
                                    <th>Kỹ thuật</th>
                                    <th>Người yêu cầu</th>
                                    <th>Ngày yêu cầu</th>
                                    <th>Ngày hoàn thành</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/basic.css') }}"> --}}
@endsection

@section('linkjs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
{{-- <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}" defer></script>
<script src="{{ asset('js/pdfmake.min.js') }}" defer></script>
<script src="{{ asset('js/vfs_fonts.js') }}" defer></script>
<script src="{{ asset('js/buttons.html5.min.js') }}" defer></script>
<script src="{{ asset('js/buttons.print.min.js') }}" defer></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}" defer></script> --}}
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>

<script>
    $(function(){
        $('#pdf_export').click(function(){
            $branch_id = $('#branch_export').val();
            axios.post('/task/export_pdf', {
                branch_id: $branch_id
            },{responseType: 'blob'}).then(function(response){
                console.log();
                let headerLine = response.headers['content-disposition']
                let startFileNameIndex = headerLine.indexOf('"') + 1
                let endFileNameIndex = headerLine.lastIndexOf('"');
                let filename = headerLine.substring(startFileNameIndex, endFileNameIndex);
                // console.log(filename, headerLine, startFileNameIndex, endFileNameIndex);
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', filename);
                document.body.appendChild(link);
                link.click();
            }).catch(function(error){
                console.log(error);
            })
        })

        $('#excel_export').click(function(){
            $branch_id = $('#branch_export').val();
            axios.post('/task/export', {
                branch_id: $branch_id
            },{responseType: 'blob'}).then(function(response){
                console.log();
                let headerLine = response.headers['content-disposition']
                let startFileNameIndex = headerLine.indexOf('"') + 1
                let endFileNameIndex = headerLine.lastIndexOf('"');
                let filename = headerLine.substring(startFileNameIndex, endFileNameIndex);
                // console.log(filename, headerLine, startFileNameIndex, endFileNameIndex);
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', "file.xlsx");
                document.body.appendChild(link);
                link.click();
            }).catch(function(error){
                console.log(error);
            })
        })
    })
</script>

@include('components.modal_task')
@include('components.modal_device')
@include('components.modal_branch')
@include('components.modal_delete')

    



@endsection