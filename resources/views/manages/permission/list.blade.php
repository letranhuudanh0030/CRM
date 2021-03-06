@extends('layouts.layout')

@section('title_page')
Quản lý nhóm quyền người dùng
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
                            data-target="#modal_permission" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên nhóm</th>
                                    <th>Quyền hạn</th>
                                    <th>Ẩn/Hiện</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @foreach ($permissions as $permission)
                                <tr class="item-{{ $permission->id }}">
                                    <td>{{ $permission->id }}</td>
                                    <td class="name-{{ $permission->id }}">{{ $permission->name }}</td>
                                    <td class="role-{{ $permission->id }}">
                                        @switch($permission->role)
                                            @case(1)
                                                Manager
                                                @break
                                            @case(2)
                                                Super Admin
                                                @break
                                            @case(3)
                                                CEO
                                                @break
                                            @default
                                                User
                                        @endswitch    
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input status"
                                                id="status_{{ $permission->id }}"
                                                url="/permission/update_status"
                                                {{ $permission->status == 1 ? "checked" : "" }}>
                                            <label class="custom-control-label" for="status_{{ $permission->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn bg-gradient-info" type="button" data-toggle="modal"
                                            data-target="#modal_permission" data-action="edit" data-name="Chỉnh sửa"
                                            data-object="{{ $permission }}"><i class="fas fa-pencil-alt"></i> Chỉnh
                                            sửa</button>
                                        <button class="btn bg-gradient-danger" type="button" data-toggle="modal"
                                            data-target="#modal_remove" data-object="{{ $permission }}"
                                            data-url="/permission/delete"><i class="fas fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên nhóm</th>
                                    <th>Quyền hạn</th>
                                    <th>Ẩn/Hiện</th>
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
@endsection

@section('linkjs')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
{{-- <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script> --}}
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.min.js') }}"></script>

@include('components.modal_permission')
@include('components.modal_delete')

@endsection