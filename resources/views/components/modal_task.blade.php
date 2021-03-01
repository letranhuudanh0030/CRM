<form data-id="" data-action="" id="modalTask">
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
                
                    <div class="form-group">
                        <label for="device" class="col-form-label">Thiết bị <span class="text-danger">(*)</span>:</label>
                        <select name="device" id="device" class="form-control">
                            <option value="">-- Chọn thiết bị --</option>
                            @foreach ($devices as $device)
                            <option value="{{ $device->id }}" class="device-{{ $device->id }}">{{ $device->name }}
                            </option>
                            @endforeach
                        </select>
                        <button class="btn bg-gradient-success px-4 mt-1" type="button" data-toggle="modal"
                            data-target="#modal_device" data-action="create" data-name="Thêm"><i
                                class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <div class="form-group">
                        <label for="device_damaged" class="col-form-label">Tình trạng hư hỏng:</label>
                        <textarea id="device_damaged" name="device_damaged" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Hình ảnh tình trạng hư hỏng:</label>
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="image_device_damaged"
                                    name="image_device_damaged" readonly value="{{ old('image_device_damaged') }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary browser_image_device_damaged"
                                        data-toggle="modal" data-target="#modal-file" type="button"
                                        data-name-type='image_device_damaged'>Browser</button>
                                </div>
                            </div>
                            <span class="text-small text-gray help-block-none">Có thể chọn nhiều hình của thiết
                                bị.</span>
                            <br>
                            <div class="show_image_device_damaged">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch" class="col-form-label">Chi nhánh <span class="text-danger">(*)</span>:</label>
                        <select name="branch" id="branch" class="form-control">
                            <option value="">-- Chọn chi nhánh --</option>
                            @foreach ($branchs as $branch)
                            <option value="{{ $branch->id }}" class="branch-{{ $branch->id }}">{{ $branch->name }}
                            </option>
                            @endforeach
                        </select>
                        <button class="btn bg-gradient-success px-4 mt-1" type="button" data-toggle="modal"
                            data-target="#modal_branch" data-action="create" data-name="Thêm"><i
                                class="fas fa-plus"></i>
                            Thêm</button>
                    </div>
                    <div class="form-group">
                        <label for="technician" class="col-form-label">Kỹ thuật viên <span class="text-danger">(*)</span>:</label>
                        <select name="technician" id="technician" class="form-control">
                            <option value="">-- Chọn kỹ thuật viên --</option>
                            @foreach ($technicians as $technician)
                            <option value="{{ $technician->id }}" class="technician-{{ $technician->id }}">
                                {{ $technician->name }}</option>
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
                        <label class="form-control-label">Hình ảnh kết quả:</label>
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" id="image_result" name="image_result" readonly
                                    value="{{ old('image_result') }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary browser_image_result"
                                        data-toggle="modal" data-target="#modal-file" type="button"
                                        data-name-type='image_result'>Browser</button>
                                </div>
                            </div>
                            <span class="text-small text-gray help-block-none">Có thể chọn nhiều hình của thiết
                                bị.</span>
                            <br>
                            <div class="show_image_result">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Lưu ý:</label>
                        <textarea id="note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ngày yêu cầu:</label>
                        <div class="input-group date" id="startDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#startDate"
                                name="startDate" data-toggle="datetimepicker" id="start_date">
                            <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ngày hoàn thành:</label>
                        <div class="input-group date" id="endDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#endDate"
                                name="endDate" data-toggle="datetimepicker" id="end_date">
                            <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary btn-save">Lưu</button>
            </div>
        </div>
    </div>
</div>
</form>

@include('components.modal_gallery')

<script>
    $('#device, #branch, #technician, #result').select2({
        theme: 'bootstrap4'
    })

    $('#device_damaged, #note').summernote()

    $('#startDate, #endDate').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss',
        timepicker: true,
    });

    // click image_device_damaged open filemanager
    $('.browser_image_device_damaged').click(function(){
        let input_images = $('.browser_image_device_damaged').attr('data-name-type');
        $('#filemanager').attr('src', `/file/dialog.php?type=1&field_id=${input_images}`);
    })

    $('.browser_image_result').click(function(){
        let input_images = $('.browser_image_result').attr('data-name-type');
        $('#filemanager').attr('src', `/file/dialog.php?type=1&field_id=${input_images}`);
    })

    // show image
    $('#modal-file').on('hidden.bs.modal', function (e) {
        // show product images
        let image_device_damaged = $('#image_device_damaged').val()
        let image_result = $('#image_result').val()
        
        url_images(image_device_damaged, "show_image_device_damaged")
        url_images(image_result, "show_image_result")
        
    });

    // var Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 3000
    //   });

    function url_images(url_images, show_imgs) {
        if(url_images){
            var html = ''
            if(url_images.search(',') > -1){
                var imgs = jQuery.parseJSON(url_images)
                imgs.forEach(element => {
                    html += '<img src="'+element+'" alt="" class="img-fluid mr-1" width="150px" height="150px">'
                });
            }else{
                html += '<img src="'+url_images+'" alt="" class="img-fluid mr-1" width="150px" height="150px">'
            }

            $('.' + show_imgs).html(html)
        }
    }


    $('#modal_task').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        var device = modal.find('.modal-body #device');
        var device_damaged = modal.find('.modal-body #device_damaged');
        var branch = modal.find('.modal-body #branch');
        var technician = modal.find('.modal-body #technician');
        var result = modal.find('.modal-body #result');
        var note = modal.find('.modal-body #note');
        var start_date = modal.find('.modal-body #start_date');
        var end_date = modal.find('.modal-body #end_date');
        var imgs_device_damaged = modal.find('.modal-body #image_device_damaged');
        var imgs_device_result = modal.find('.modal-body #image_result');
        
        modal.find('.modal-footer .btn-save').off('click')

        $('#modalTask').validate({
        // debug: true,
        errorClass: "invalid",
        rules: {
            device: {
                required: true,
            },
            branch: {
                required: true,
            },
            technician: {
                required: true,
            }

        },
        messages: {
            device: {
                required: "Bắt buộc nhập",
            },
            branch: {
                required: "Bắt buộc chọn",
            },
            technician: {
                required: "Bắt buộc chọn",
            }
        },

        submitHandler: function(form) {
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
                    end_date: formatDateTime(end_date.val()),
                    imgs_device_damaged: imgs_device_damaged.val(),
                    imgs_device_result: imgs_device_result.val()
                })
                .then(function (response) {
                    // Change list
                    $('.device-row-' + response.data.id).text(response.data.device.name)
                    $('.branch-row-' + response.data.id).text(response.data.branch.name)
                    $('.technician-row-' + response.data.id).text(response.data.technician.name)
                    $('.creator-row-' + response.data.id).text(response.data.creator.name)
                    $('.created-row-' + response.data.id).text(moment(new Date(response.data.required_date)).format('DD-MM-YYYY HH:mm:ss'))
                    $('.success-row-' + response.data.id).text(moment(new Date(response.data.success_date)).format('DD-MM-YYYY HH:mm:ss'))

                    // console.log(response.data);
                    
                    // change form
                    ob.device_id = response.data.device_id;
                    ob.branch_id = response.data.branch_id;
                    ob.technicians_id = response.data.technicians_id;
                    ob.device_damaged = response.data.device_damaged;
                    ob.result = response.data.result;
                    ob.note = response.data.note;
                    ob.required_date = response.data.required_date;
                    ob.success_date = response.data.success_date;
                    ob.image_device_damaged = response.data.image_device_damaged;
                    ob.image_result = response.data.image_result;
                    $('#modal_task').modal('hide')
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
                    end_date: formatDateTime(end_date.val()),
                    imgs_device_damaged: imgs_device_damaged.val(),
                    imgs_device_result: imgs_device_result.val(),
                })
                .then(function (response) {
                    location.reload();
                    $('#modal_task').modal('hide')
                    // console.log(response);
                    // Toast.fire({
                    // icon: 'success',
                    // title: 'ok ok ok'
                    // })
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            return false
        }
    });


        if(action == "edit"){
            var id = ob.id;
            device.val(ob.device_id).trigger('change')
            branch.val(ob.branch_id).trigger('change')
            technician.val(ob.technicians_id).trigger('change')
            result.val(ob.result).trigger('change')
            device_damaged.summernote("code", ob.device_damaged)
            note.summernote("code", ob.note)
            start_date.val(moment(new Date(ob.required_date)).format('DD/MM/YYYY HH:mm:ss'))
            end_date.val(moment(new Date(ob.success_date)).format('DD/MM/YYYY HH:mm:ss'))

            

            modal.find('.modal-body .show_image_device_damaged').attr("class", "show_image_device_damaged show-img-"+ob.id)
            modal.find('.modal-body .show_image_result').attr("class", "show_image_result show-result-"+ob.id)


            var imgs = ''


            if(ob.image_device_damaged != null){
                let imgs_device_damaged = ob.image_device_damaged.split(',')
                // modal.find('.modal-body #image_device_damaged').val(imgs_device_damaged)
                
                for (let i = 0; i < imgs_device_damaged.length; i++) {
                    const element = imgs_device_damaged[i];
                    imgs += `<img src="${element}" alt="" class="img-fluid mr-1" width="150px" height="150px">`
                    modal.find('.modal-body .show-img-'+ob.id).html(imgs)
                }
                imgs = ''
            } else {
                modal.find('.modal-body #image_device_damaged').val("")
                modal.find('.modal-body .show-img-'+ob.id).html("")
            }

            if(ob.image_result != null){

                let imgs_result = ob.image_result.split(',')
                // modal.find('.modal-body #image_result').val(imgs_result)
                
                for (let i = 0; i < imgs_result.length; i++) {
                    const element = imgs_result[i];
                    imgs += `<img src="${element}" alt="" class="img-fluid mr-1" width="150px" height="150px">`
                    modal.find('.modal-body .show-result-'+ob.id).html(imgs)
                }
                imgs = ''
            } else {
                modal.find('.modal-body #image_result').val("")
                modal.find('.modal-body .show-result-'+ob.id).html("")
            }

            modal.find('.modal-title').html(name + " công việc bảo trì: <b>#" + ob.id + "</b>")
        } 
        else if(action == "create"){
            device.val(0).trigger('change')
            branch.val(0).trigger('change')
            technician.val(0).trigger('change')
            result.val(0).trigger('change')
            device_damaged.summernote("code", "")
            note.summernote("code", "")
            start_date.val("")
            end_date.val("")   
            imgs_device_damaged.val("")
            imgs_device_result.val("")
            modal.find('.modal-body .show_image_device_damaged').html("")
            modal.find('.modal-body .show_image_result').html("")
            modal.find('.modal-title').text(name + " công việc bảo trì")
        }
    })

    function formatDateTime(datetime) {
        var dt = datetime.split(" ")
        datetimeFormat = dt[0].split("/").reverse().join("-");
        datetimeFormat += ' ' + dt[1]
        return datetimeFormat
    }

</script>