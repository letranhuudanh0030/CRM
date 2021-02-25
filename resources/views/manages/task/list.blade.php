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
                                        {{ date('d-m-Y H:i:s', strtotime($task->required_date)) }}</td>
                                    <td class="success-row-{{ $task->id }}">
                                        {{ date('d-m-Y H:i:s', strtotime($task->success_date)) }}</td>
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
{{-- <script src="{{ asset('js/dropzone.js') }}"></script> --}}

@include('components.modal_task')
@include('components.modal_device')
@include('components.modal_branch')
@include('components.modal_delete')


@endsection