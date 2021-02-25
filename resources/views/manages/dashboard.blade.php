@extends('layouts.layout')
@section('content')
<section id="dashboard">
    <div class="container-fluid">
        @if (auth()->user()->permission_id == 1)
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $devices->count() }}</h3>

                            <p>Thiết bị</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/devices/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $branches->count() }}</h3>

                            <p>Chi nhánh</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/branch/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $tasks->count() }}</h3>

                            <p>Công việc</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/task/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $users->count() }}</h3>

                            <p>Người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="/user/list" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        @endif


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 38px;">{{ $title }}</h3>
                        
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
                                    <th>Tình trạng</th>
                                    <th>Ngày yêu cầu</th>
                                    <th>Ngày hoàn thành</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                @if (auth()->user()->permission_id != 1)
                                    @php
                                        $tasks = $tasks->where('technicians_id', auth()->id())
                                    @endphp
                                @endif
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->device['name'] }}</td>
                                        <td>{{ $task->branch['name'] }}</td>
                                        <td>{{ $task->technician['name'] }}</td>
                                        <td>{{ $task->creator['name'] }}</td>
                                        @switch($task->result)
                                            @case(1)
                                                <td><span class="badge badge-warning">Đang xử lý</span></td>
                                                @break
                                            @case(2)
                                                <td><span class="badge badge-success">Hoàn thành</span></td>
                                                @break
                                            @default
                                                <td><span class="badge badge-danger">Đang đặt hàng</span></td>
                                        @endswitch
                                        <td>{{ date('d-m-Y H:i:s', strtotime($task->required_date)) }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($task->success_date)) }}</td>
                                        <td><a href="/task/{{ $task->id }}/detail" class="btn btn-info">Xem chi tiết</a></td>
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
                                    <th>Tình trạng</th>
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
@endsection