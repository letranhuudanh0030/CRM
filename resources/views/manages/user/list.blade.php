@extends('layouts.layout')

@section('title_page')
Quản lý tài khoản
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
                            data-target="#modal_user" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Vai trò</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                    <th>Ẩn/Hiện</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @foreach ($users as $user)
                                <tr class="item-{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td class="name-{{ $user->id }}">{{ $user->name }}</td>
                                    <td class="permission-{{ $user->id }}">{{ $user->permission->name }}</td>
                                    <td class="phone-{{ $user->id }}">{{ $user->phone }}</td>
                                    <td class="email-{{ $user->id }}">{{ $user->email }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input status"
                                                id="status_{{ $user->id }}"
                                                url="/user/update_status"
                                                {{ $user->status == 1 ? "checked" : "" }}>
                                            <label class="custom-control-label" for="status_{{ $user->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn bg-gradient-primary" type="button" data-toggle="modal"
                                            data-target="#modal_user" data-action="edit" data-name="Chỉnh sửa"
                                            data-object="{{ $user }}"><i class="fas fa-pencil-alt"></i> Chỉnh
                                            sửa</button>
                                        <button class="btn bg-gradient-info" type="button" data-toggle="modal"
                                        data-target="#modal_change_password" data-object="{{ $user }}"
                                        data-url="/user/update_password"><i class="fas fa-key"></i> Đổi mật khẩu</button>
                                        <button class="btn bg-gradient-danger" type="button" data-toggle="modal"
                                            data-target="#modal_remove" data-object="{{ $user }}"
                                            data-url="/user/delete"><i class="fas fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Vai trò</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
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
<script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
{{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 --}}

@include('components.modal_user')
@include('components.modal_delete')
@include('components.modal_change_password')



@endsection