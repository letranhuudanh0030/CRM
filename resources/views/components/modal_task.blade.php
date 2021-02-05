<div class="modal fade" id="modal_task" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-id="" data-action="">
                    <div class="form-group">
                        <label for="device" class="col-form-label">Thiết bị:</label>
                        <select name="device" id="device" class="form-control">
                            <option value="">-- Chọn thiết bị --</option>
                            @foreach ($devices as $device)
                                <option value="{{ $device->id }}" class="device-{{ $device->id }}">{{ $device->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn bg-gradient-success float-right px-4 mt-1" type="button" data-toggle="modal"
                            data-target="#modal_device" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <div class="form-group">
                        <label for="device_damaged" class="col-form-label">Tình trạng hư hỏng:</label>
                        <textarea id="device_damaged" name="device_damaged" cols="30" rows="10"></textarea>
                    </div>


                    <div id="dzUpload" class="dropzone">
                        <div class="fallback">
                          <input name="file" type="file" multiple />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="branch" class="col-form-label">Chi nhánh:</label>
                        <select name="branch" id="branch" class="form-control">
                            <option value="">-- Chọn chi nhánh --</option>
                            @foreach ($branchs as $branch)
                                <option value="{{ $branch->id }}" class="branch-{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn bg-gradient-success float-right px-4 mt-1" type="button" data-toggle="modal"
                            data-target="#modal_branch" data-action="create" data-name="Thêm"><i class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <div class="form-group">
                        <label for="technician" class="col-form-label">Kỹ thuật viên:</label>
                        <select name="technician" id="technician" class="form-control">
                            <option value="">-- Chọn kỹ thuật viên --</option>
                            @foreach ($technicians as $technician)
                                <option value="{{ $technician->id }}" class="technician-{{ $technician->id }}">{{ $technician->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="result" class="col-form-label">Kết quả:</label>
                        <select name="result" id="result" class="form-control">
                            <option value="">-- Chọn kết quả --</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Đang đặt hàng</option>
                        </select>
                        {{-- <textarea id="result" name="result" cols="30" rows="10"></textarea> --}}
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Lưu ý:</label>
                        <textarea id="note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ngày yêu cầu:</label>
                        <div class="input-group date" id="startDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#startDate" name="startDate" data-toggle="datetimepicker" id="start_date">
                            <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ngày hoàn thành:</label>
                        <div class="input-group date" id="endDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#endDate" name="endDate" data-toggle="datetimepicker" id="end_date">
                            <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-save">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#device, #branch, #technician, #result').select2({
        theme: 'bootstrap4'
    })

    $('#device_damaged, #note').summernote()

    $('#startDate, #endDate').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss',
        timepicker: true,
    });

    Dropzone.autoDiscover = false;
    $("#dzUpload").dropzone({
        url: "/task/upload",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
            }
            else { done(); }
        }
    });

    $('#modal_task').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        if(action == "edit"){
            modal.find('.modal-body #device').val(ob.device_id).trigger('change')
            modal.find('.modal-body #branch').val(ob.branch_id).trigger('change')
            modal.find('.modal-body #technician').val(ob.technicians_id).trigger('change')
            modal.find('.modal-body #result').val(ob.result).trigger('change')
            modal.find('.modal-body #device_damaged').summernote("code", ob.device_damaged)
            modal.find('.modal-body #note').summernote("code", ob.note)
            modal.find('.modal-body #start_date').val(moment(new Date(ob.required_date)).format('DD/MM/YYYY HH:mm:ss'))
            modal.find('.modal-body #end_date').val(moment(new Date(ob.success_date)).format('DD/MM/YYYY HH:mm:ss'))



            modal.find('.modal-body form').data("id", ob.id)
            modal.find('.modal-body form').data("action", action)          
            modal.find('.modal-title').html(name + " công việc bảo trì: <b>#" + ob.id + "</b>")
        } 
        else if(action == "create"){
            modal.find('.modal-body #device_damaged').val("")
            modal.find('.modal-body form').data("action", action)       
            modal.find('.modal-title').text(name + " công việc bảo trì")
        }
    })


    $('#modal_task .modal-footer .btn-save').click(function(e) {
        var action = $('#modal_task .modal-body form').data("action");
        var id = $('#modal_task .modal-body form').data("id");

        var device = $('#modal_task .modal-body #device');
        var device_damaged = $('#modal_task .modal-body #device_damaged');
        var branch = $('#modal_task .modal-body #branch');
        var technician = $('#modal_task .modal-body #technician');
        var result = $('#modal_task .modal-body #result');
        var note = $('#modal_task .modal-body #note');
        var start_date = $('#modal_task .modal-body #start_date');
        var end_date = $('#modal_task .modal-body #end_date');

        if(action == 'edit'){
            axios.post('/task/update', {
                id: id,
                device_id: device.val(),
                device_damaged: device_damaged.val(),
                branch_id: branch.val(),
                technician_id: technician.val(),
                result: result.val(),
                note: note.val(),
                start_date: formatDateTime(start_date.val()),
                end_date: formatDateTime(end_date.val())
            })
            .then(function (response) {
                // $('.name-' + id).text(response.data.name)
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        } else if(action == "create"){
            axios.post('/task/store', {
                device_id: device.val(),
                device_damaged: device_damaged.val(),
                branch_id: branch.val(),
                technician_id: technician.val(),
                result: result.val(),
                note: note.val(),
                start_date: formatDateTime(start_date.val()),
                end_date: formatDateTime(end_date.val())
            })
            .then(function (response) {
                location.reload();
                // console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        $('#modal_task').modal('hide')
    })

    function formatDateTime(datetime) {
        var dt = datetime.split(" ")
        datetimeFormat = dt[0].split("/").reverse().join("-");
        datetimeFormat += ' ' + dt[1]
        return datetimeFormat
    }

</script>