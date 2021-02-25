<div class="modal fade" id="modal_device_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                        <label for="name" class="col-form-label">Tên loại:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
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

<script defer>
    $('#modal_device_type').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var action = button.data('action') // Extract info from data-* attributes
        var name_action = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        if(action == "edit"){
            modal.find('.modal-body form').data("id", ob.id)
            modal.find('.modal-body form').data("action", action)   
            var name_in_list = $('.name-' + ob.id).text();
            modal.find('.modal-body #name').val(name_in_list)
            modal.find('.modal-title').html(name_action + " chi nhánh: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){
            modal.find('.modal-body form').data("action", action)  
            modal.find('.modal-body #name').val("")
            modal.find('.modal-title').text(name_action + " chi nhánh")
        }         
    })

    $('#modal_device_type .modal-footer .btn-save').click(function(e) {
        var action = $('#modal_device_type .modal-body form').data("action");
        var id = $('#modal_device_type .modal-body form').data("id");

        if(action == 'edit'){
            axios.post('/device_type/update', {
                id: id,
                name: $('#modal_device_type .modal-body #name').val(),
            })
            .then(function (response) {
                $('.name-' + id).text(response.data.name)
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
                } else {
                    $('#modal_task .modal-body #device_type').append('<option value="'+response.data.id+'" class="device_type-'+response.data.id+'">'+response.data.name+'</option>');
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        $('#modal_device_type').modal('hide')
    })
</script>