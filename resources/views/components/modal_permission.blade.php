<div class="modal fade" id="modal_permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-id="" data-action="" id="modalPermission">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nhóm người dùng <span class="text-danger">(*)</span>:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="role" class="col-form-label">Quyền <span class="text-danger">(*)</span>:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">-- Chọn quyền hạn --</option>
                            @foreach (config('variables.role') as $id => $role)
                                <option value="{{ $id }}">{{ $role }}</option>
                            @endforeach
                        </select>
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
    $('#modal_permission').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        $('#modalPermission').validate({
            // debug: true,
            errorClass: "invalid",
            rules: {
                name: {
                    required: true,
                },
                role: {
                    required: true,
                }

            },
            messages: {
                name: {
                    required: "Bắt buộc nhập",
                },
                role: {
                    required: "Bắt buộc chọn"
                }
            },

            submitHandler: function(form) {
                var action = $('#modal_permission form').data("action");
                var id = $('#modal_permission form').data("id");

                if(action == 'edit'){
                    axios.post('/permission/update', {
                        id: id,
                        name: $('.modal-body #name').val(),
                        role: $('.modal-body #role').val()
                    })
                    .then(function (response) {
                        // console.log($('.modal-body #role').val())
                        let role_text = $(".modal-body #role option:selected").text();
                        $('.name-' + id).text(response.data.name)
                        $('.role-' + id).text(role_text)
                        ob.role = response.data.role
                        $('#modal_permission').modal('hide')
                        Toast.fire({
                            icon: 'success',
                            title: 'Cập nhật nhóm người dùng thành công!'
                        })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } else if(action == "create"){
                    let name = $('.modal-body #name').val()
                    let role = $('.modal-body #role').val()
                        
                    axios.post('/permission/store', {
                        name: name,
                        role: role
                    })
                    .then(function (response) {
                        location.reload();
                        $('#modal_permission').modal('hide')
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
                
                return false
            }
        });

        

        if(action == "edit"){
            modal.find('.modal-body #name').val(ob.name)
            var name_in_list = $('.name-' + ob.id).text();
            if(ob.name != name_in_list){
                modal.find('.modal-body #name').val(name_in_list)
            } 

            modal.find('.modal-body #role').val(ob.role)

            modal.find('form').data("id", ob.id)
            modal.find('form').data("action", action)          
            modal.find('.modal-title').html(name + " nhóm quyền: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){
            modal.find('.modal-body #name').val("")
            modal.find('form').data("action", action)       
            modal.find('.modal-title').text(name + " nhóm quyền")
        }
    })


    
</script>