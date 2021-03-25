<div class="modal fade" id="modal_update_task_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="form_update_detail">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="result" class="col-form-label">Kết quả:</label>
                        <select name="result" id="result" class="form-control">
                            <option value="">-- Chọn kết quả --</option>
                            <option value="1">Đang xử lý</option>
                            <option value="2">Hoàn thành</option>
                            <option value="3">Đang đặt hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Lưu ý:</label>
                        <textarea id="note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Hình ảnh kết quả:</label>
                        <div class="mb-3">
                            <x-upload>
                                <x-slot name='id'>image_result</x-slot>
                                <x-slot name='input_id'>input_image_result</x-slot>
                            </x-upload>
                            <span class="text-small text-gray help-block-none">Có thể chọn nhiều hình của thiết
                                bị.</span>
                            <br>
                            <div class="show_image_result">
    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ngày hoàn thành <span class="text-danger">(*)</span>:</label>
                        <div class="input-group date" id="endDate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" data-target="#endDate"
                                name="endDate" data-toggle="datetimepicker" id="end_date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.modal_gallery')
<script>

    jQuery.validator.setDefaults({
        errorClass: "invalid",
        ignore: ":hidden, [contenteditable='true']:not([name])",
        rules: {
            endDate: {
                required: true,
            },
        },
        messages: {
            endDate: {
                required: "Bắt buộc nhập",
            },
        },
    });

    $('#device_damaged, #note').summernote()

    // click image_device_damaged open filemanager
    $('.browser_image_device_damaged').click(function(){
        let input_images = $('.browser_image_device_damaged').attr('data-name-type');
        $('#filemanager').attr('src', `/file/dialog.php?type=1&field_id=${input_images}`);
    })

    $('.browser_image_result').click(function(){
        let input_images = $('.browser_image_result').attr('data-name-type');
        $('#filemanager').attr('src', `/file/dialog.php?type=1&field_id=${input_images}`);
    })

    $('#endDate').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss',
        timepicker: true,
        lang: "vi",
    });

    // show image
    $('#modal-file').on('hidden.bs.modal', function (e) {
        // show product images
        let image_device_damaged = $('#image_device_damaged').val()
        let image_result = $('#image_result').val()
        
        url_images(image_device_damaged, "show_image_device_damaged")
        url_images(image_result, "show_image_result")
        
    });

    Dropzone.autoDiscover = false;

    $('.dropzone').each(function(index, data){
        var dropUrl = '/task/upload';
        var dropParamName = $(this).attr('id');
    
        var myDropzone = new Dropzone(`#${data.id}`,{
            url: dropUrl,
            paramName: dropParamName,
            parallelUploads: 50,
            uploadMultiple: true,
            addRemoveLinks: true,
            autoQueue: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response){
                // if(response[])
                $(`#input_${response['file']}`).val(response['url'])
                console.log(response);
            },
        });

        $(`#${data.id} ~ .start`).click(function(e){
            // console.log(123);
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            return false;
        })

        $(`#${data.id} ~ .cancel`).click(function(e){
            // console.log(123);
            myDropzone.removeAllFiles(true);
            return false;
        })

    });


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



    $('#modal_update_task_detail').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var title = button.data('title')
        var ob = button.data('ob')
        var modal = $(this)
        // console.log(ob);

        var imgs_device_result = modal.find('.modal-body #image_result');
        var result = modal.find('.modal-body #result');
        var note = modal.find('.modal-body #note');

        modal.find('.btn-save').off('click')

        var form = modal.find("#form_update_detail")
        form.validate()


        modal.find('.btn-save').click(function(){
            if(form.valid()){
                axios.post('/task/detail/update', {
                    id: ob.id,
                    device_id: ob.device_id,
                    device_damaged: ob.device_damaged,
                    branch_id: ob.branch_id,
                    technician_id: ob.technicians_id,
                    result: result.val(),
                    note: note.val(),
                    // start_date: formatDateTime(ob.required_date),
                    end_date: formatDateTime(modal.find('#end_date').val()),
                    imgs_device_damaged: ob.image_device_damaged,
                    imgs_device_result: $('#input_image_result').val()
                }).then(function(response){
                    let result = '';
                    switch (response.data.result) {
                        case 1:
                            result = '<span class="badge bg-info">Đang xử lý</span>'
                            break;
                        case 2:
                            result = '<span class="badge bg-success">Đã hoàn thành</span>'
                            break;
                        case 3:
                            result = '<span class="badge bg-danger">Đang đặt hàng</span>'
                            break;
                        default:
                            result = '<span class="badge badge-secondary">Đang chờ cập nhật</span>'
                            break;
                    }
                    $('#task_detail .result').html(result)
                    $('#task_detail .note').html(response.data.note)
                    location.reload();
                    
                    modal.modal('hide')
                }).catch(function(error){
                    console.log(error);
                })
            }
        })


        var imgs = ''

        if(ob.image_result != null){
            let imgs_result = ob.image_result.split(',')
            // modal.find('.modal-body #image_result').val(imgs_result)
            for (let i = 0; i < imgs_result.length; i++) {
                const element = imgs_result[i];
                imgs += `<img src="${element}" alt="" class="img-fluid mr-1" width="150px" height="150px">`
            }
            modal.find('.modal-body .show_image_result').html(imgs)
            imgs = ''
        } else {
            modal.find('.modal-body #image_result').val("")
            modal.find('.modal-body .show_image_result').html("")
        }

        modal.find('.modal-title').text(title)
        modal.find('.modal-body #note').summernote('code', ob.note)
        modal.find('.modal-body #result').val(ob.result)
        if(ob.success_date){
            modal.find('#end_date').val(moment(new Date(ob.success_date)).format('DD/MM/YYYY HH:mm:ss'))
        }
    })

    function formatDateTime(datetime) {
        if(datetime){
            var dt = datetime.split(" ")
            datetimeFormat = dt[0].split("/").reverse().join("-");
            datetimeFormat += ' ' + dt[1]
            return datetimeFormat
        } 
        return datetime
    }
    
</script>