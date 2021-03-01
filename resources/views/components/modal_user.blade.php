<div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-id="" data-action="" id="newModalForm" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Họ và tên <span class="text-danger">(*)</span>:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Điện thoại:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="">
                    </div>
                    <div class="form-group">
                        <label for="permission" class="col-form-label">Vai trò <span class="text-danger">(*)</span>:</label>
                        <select name="permission" id="permission" class="form-control">
                            <option value="" class="permission-0">-- Chọn vai trò --</option>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}" class="permission-{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email (Tài khoản đăng nhập) <span class="text-danger">(*)</span>:</label>
                        <input type="text" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="form-group group-password">
                        <label for="password" class="col-form-label">Mật khẩu <span class="text-danger">(*)</span>:</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="form-group group-password">
                        <label for="repassword" class="col-form-label">Nhập lại mật khẩu <span class="text-danger">(*)</span>:</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" value="">
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

</script>

<script>
    $('#modal_user').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var modal = $(this)

        

        if(action == "edit"){
            modal.find('.modal-body #name').val(ob.name)
            var name_in_list = $('.name-' + ob.id).text();
            var phone_in_list = $('.phone-' + ob.id).text();
            var email_in_list = $('.email-' + ob.id).text();
            var permission_in_list = $('.permission-' + ob.id).text();
            var options = $('#permission').find('option')

            for (let i = 0; i < options.length; i++) {
                const el_text = options[i].text;
                if(el_text == permission_in_list){
                    modal.find('.modal-body #permission .permission-'+options[i].value).prop('selected', true);
                }
            }

            modal.find('.modal-body #name').val(name_in_list)
            modal.find('.modal-body #phone').val(phone_in_list)
            modal.find('.modal-body #email').val(email_in_list)
            modal.find('.modal-body #email').prop('disabled', true);
            modal.find('.modal-body .group-password').css('display', 'none')

            modal.find('form').data("id", ob.id)
            modal.find('form').data("action", action)          
            modal.find('.modal-title').html(name + " nhóm quyền: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){
            
            modal.find('form').data("action", action)       
            modal.find('.modal-body #name').val("")
            modal.find('.modal-body #email').val("")
            modal.find('.modal-body #email').prop('disabled', false);
            modal.find('.modal-body #phone').val("")
            modal.find('.modal-body #password').val("")
            modal.find('.modal-body #repassword').val("")
            modal.find('.modal-body .group-password').css('display', 'block')
            modal.find('.modal-body #permission .permission-0').prop('selected', true);
            modal.find('.modal-title').text(name + " nhóm quyền")
        }
    })


    $('#newModalForm').validate({
        // debug: true,
        errorClass: "invalid",
        rules: {
            name: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "/user/check_email",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }
            },
            permission: {
                required: true,
            },
            repassword: {
                equalTo: "#password",
                minlength: 8
            }

        },
        messages: {
            name: {
                required: "Bắt buộc nhập họ và tên",
            },
            permission: {
                required: "Bắt buộc nhập chọn vai trò",
            },
            password: {
                required: "Bắt buộc nhập mật khẩu",
                minlength: "Hãy nhập ít nhất 8 ký tự"
            },
            email: {
                required: "Bắt buộc nhập Email",
                email: "Email phải có định dạng name@domain.com",
                remote: "Email đã được sử dụng!"
            },
            repassword: {
                equalTo: "Nhập lại mật khẩu không chính xác",
                minlength: "Hãy nhập ít nhất 8 ký tự"
            }

        },

        submitHandler: function(form) {
            var action = $('#modal_user form').data("action");
            var id = $('#modal_user form').data("id");
            var name = $('.modal-body #name').val()
            var phone = $('.modal-body #phone').val()
            var permission = $('.modal-body #permission').val()
            var email = $('.modal-body #email').val()
            var password = $('.modal-body #password').val()
            var rePassword = $('.modal-body #repassword').val()

            if(action == 'edit'){
                $("#password").rules("remove");
                $("#email").rules("remove");
            }

            if(action == 'edit'){
                axios.post('/user/update', {
                    id: id,
                    name: name,
                    phone: phone,
                    email: email,
                    permission: permission,
                })
                .then(function (response) {
                    console.log(response)
                    $('.name-' + id).text(response.data.name)
                    $('.phone-' + id).text(response.data.phone)
                    if(response.data.permission_id == permission){
                        var permission_resp = $('.modal-body #permission .permission-'+permission).text()
                        $('.permission-' + id).text(permission_resp)
                    }
                    $('#modal_user').modal('hide')   

                })
                .catch(function (error) {
                    console.log(error);
                });
            } else if(action == "create"){      
                axios.post('/user/store', {
                    name: name,
                    phone: phone,
                    email: email,
                    permission: permission,
                    password: password
                })
                .then(function (response) {
                    location.reload();
                    console.log(response);
                    $('#modal_user').modal('hide')   
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            return false
        }
    });

</script>