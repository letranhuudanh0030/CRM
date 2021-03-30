@component('mail::message')
@if ($task->result)
    <h3 style="color: green">Công việc <b># {{ $task->id }}</b> : Đã hoàn thành</h3>
@else
    <h3>Công việc mới vừa được tạo: <b># {{ $task->id }}</b></h3>
@endif

@component('mail::panel')
<p><b>Thiết bị: </b><span>{{ $task->device->name }}</span></p>
<p><b>Chi nhánh: </b><span>{{ $task->branch->name }}</span></p>
<p><b>Trạng thái hư hỏng: </b><span>{!! $task->device_damaged !!}</span></p>
<p><b>Kết quả: </b>@switch($task->result)
    @case(1)
    <span class="badge badge-info">Đang xử lý</span>
    @break
    @case(2)
    <span class="badge badge-success">Hoàn thành</span>
    @break
    @default
    <span class="badge badge-danger">Đang đặt hàng</span>
    @endswitch</p>
<p><b>Lưu ý: </b><span>{!! $task->note !!}</span></p>
<p><b>Kỹ thuật viên: </b><span>{{ $task->technician->name }}</span></p>
<p><b>Người yêu cầu: </b><span>{{ $task->creator->name }}</span></p>
<p><b>Ngày yêu cầu: </b><span>{{ $task->required_date ? date('d-m-Y H:i:s', strtotime($task->required_date)) : date('d-m-Y H:i:s', strtotime($task->created_at)) }}</span></p>
<p><b>Ngày hoàn thành: </b><span>{{ $task->success_date ? date('d-m-Y H:i:s', strtotime($task->success_date)) : "Đang chờ cập nhật" }}</span></p>
@endcomponent
@component('mail::panel')
<h3>Hình ảnh thiết bị hư hỏng: </h3>
@if ($task->image_device_damaged)
@foreach (explode(',', $task->image_device_damaged) as $img)
<div class="border col-3">
    <img src="{{ config('app.url').$img }}" alt="">
</div>
@endforeach
@else
<p class="text-muted">Không có hình ảnh nào.</p>
@endif
@endcomponent
@component('mail::panel')
<h3 >Hình ảnh kết quả: </h3>
@if ($task->image_result)
@foreach (explode(',', $task->image_result) as $img)
<div class="border col-3">
    <img src="{{ config('app.url').$img }}" alt="">
</div>
@endforeach
@else
<p class="text-muted">Không có hình ảnh nào.</p>
@endif
@endcomponent
@component('mail::button', ['url' => $url])
Di chuyển tới website chi tiết công việc
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent