@extends('layouts.layout')

@section('title_page')
Quản lý thiết bị
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
                            data-target="#modal_device" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên máy</th>
                                    <th>Loại máy</th>
                                    <th>Số lượng</th>
                                    <th>Ẩn/Hiện</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @foreach ($devices as $device)
                                <tr class="item-{{ $device->id }}">
                                    <td>{{ $device->id }}</td>
                                    {{-- <td>{{ $device->device_id }}</td> --}}
                                    <td class="name-{{ $device->id }}">{{ $device->name }}</td>
                                    
                                    @for ($i = 0; $i < count(config('variables.device_type')); $i++)
                                        @if ($i == $device->type_id)
                                        <td class="type-{{ $device->id }}" type-id="{{ $device->type_id }}">{{ config('variables.device_type')[$i] }}</td>
                                        @endif
                                    @endfor
                                    
                                    <td class="qty-{{ $device->id }}">{{ $device->qty }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input status"
                                                id="status_{{ $device->id }}"
                                                url="/devices/update_status"
                                                {{ $device->status == 1 ? "checked" : "" }}>
                                            <label class="custom-control-label" for="status_{{ $device->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn bg-gradient-info" type="button" data-toggle="modal"
                                            data-target="#modal_device" data-action="edit" data-name="Chỉnh sửa"
                                            data-object="{{ $device }}"><i class="fas fa-pencil-alt"></i> Chỉnh
                                            sửa</button>
                                        <button class="btn bg-gradient-danger" type="button" data-toggle="modal"
                                            data-target="#modal_remove" data-object="{{ $device }}"
                                            data-url="/devices/delete"><i class="fas fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên máy</th>
                                    <th>Loại máy</th>
                                    <th>Số lượng</th>
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
<script src="{{ asset('js/additional-methods.min.js') }}"></script>

@include('components.modal_device')
@include('components.modal_delete')

@endsection