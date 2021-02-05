<div class="modal fade" id="modal_device" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="name" class="col-form-label">Tên thiết bị:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-form-label">Loại thiết bị:</label>
                        <select name="type" id="type" class="form-control">
                            @for ($i = 0; $i < count(config('variables.device_type')); $i++)                    
                                <option value="{{ $i }}" class="type-{{ $i }}">{{ config('variables.device_type')[$i] }}</option>                               
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty" class="col-form-label">Số lượng:</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="0">
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
    $('#modal_device').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        if(action == "edit"){
            modal.find('.modal-body #name').val(ob.name)
            var name_in_list = $('.name-' + ob.id).text();
            if(ob.name != name_in_list){
                modal.find('.modal-body #name').val(name_in_list)
            } 
            modal.find('.modal-body #type .type-'+ob.type_id+'').prop('selected', true);
            modal.find('.modal-body #qty').val(ob.qty)

            modal.find('.modal-body form').data("id", ob.id)
            modal.find('.modal-body form').data("action", action)    
            modal.find('.modal-title').html(name + " thiết bị: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){                
            modal.find('.modal-body #name').val("")
            modal.find('.modal-body #qty').val(0)
            modal.find('.modal-body #type .type-0').prop('selected', true);
            modal.find('.modal-body form').data("action", action)   
            modal.find('.modal-title').text(name + " thiết bị")
        }   
    })

    $('#modal_device .modal-footer .btn-save').click(function(e) {
        var action = $('#modal_device .modal-body form').data("action");
        var id = $('#modal_device .modal-body form').data("id");
        var type_id = $('#modal_device .modal-body #type').val();
        if(action == 'edit'){
            axios.post('/devices/update', {
                id: id,
                name: $('#modal_device .modal-body #name').val(),
                type_id: type_id,
                qty: $('#modal_device .modal-body #qty').val()
            })
            .then(function (response) {
                $('.name-' + id).text(response.data.name)
                $('.qty-' + id).text(response.data.qty)
                if(response.data.type_id == type_id){
                    var type_resp = $('.modal-body #type .type-'+type_id).text()
                    $('.type-' + id).text(type_resp)
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        } else if(action == "create"){
            let name = $('#modal_device .modal-body #name').val()
            let type = $('#modal_device .modal-body #type').val()
            let qty = $('#modal_device .modal-body #qty').val()
                
            axios.post('/devices/store', {
                name: name,
                type_id: type,
                qty: qty
            })
            .then(function (response) {
                var path = $(location).attr('pathname');
                var segment = path.split("/")
                if(segment[1] == 'devices'){
                    location.reload();
                } else {
                    $('#modal_task .modal-body #device').append('<option value="'+response.data.id+'" class="device-'+response.data.id+'">'+response.data.name+'</option>');
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        $('#modal_device').modal('hide')
    })
</script>