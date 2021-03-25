<div class="modal fade" id="modal_device_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-id="" data-action="" id="modalDeviceType">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Tên loại thiết bị <span class="text-danger">(*)</span>:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary btn-save">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#modal_device_type').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var action = button.data('action') // Extract info from data-* attributes
        var name_action = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        if(action == "edit"){
            modal.find('form').data("id", ob.id)
            modal.find('form').data("action", action)   
            var name_in_list = $('.name-' + ob.id).text();
            modal.find('.modal-body #name').val(name_in_list)
            modal.find('.modal-title').html(name_action + " loại thiết bị: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){
            modal.find('form').data("action", action)  
            modal.find('.modal-body #name').val("")
            modal.find('.modal-title').text(name_action + " loại thiết bị")
        }         
    })

    $('#modalDeviceType').validate({
        // debug: true,
        errorClass: "invalid",
        rules: {
            name: {
                required: true,
            },

        },
        messages: {
            name: {
                required: "Bắt buộc nhập",
            },
        },

        submitHandler: function(form) {
            var action = $('#modal_device_type form').data("action");
            var id = $('#modal_device_type form').data("id");

            if(action == 'edit'){
                axios.post('/device_type/update', {
                    id: id,
                    name: $('#modal_device_type .modal-body #name').val(),
                })
                .then(function (response) {
                    $('.name-' + id).text(response.data.name)
                    $('#modal_device_type').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật loại thiết bị thành công!'
                    })
                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if(action == "create"){   
                axios.post('/device_type/store', {
                    name: $('#modal_device_type .modal-body #name').val(),
                    address: $('#modal_device_type .modal-body #address').val()
                })
                .then(function (response) {
                    var path = $(location).attr('pathname');
                    var segment = path.split("/")
                    if(segment[1] == 'device_type'){
                        location.reload();
                        $('#modal_device_type').modal('hide')
                    } else {
                        $('#modal_task .modal-body #device_type').append('<option value="'+response.data.id+'" class="device_type-'+response.data.id+'">'+response.data.name+'</option>');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            
            return false
        }
    });
</script>