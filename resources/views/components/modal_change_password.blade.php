<div class="modal fade" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-url="" data-id="">>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel"> <i class="fas fa-key"></i> Thay đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <form id="changePasswordModal">
                    <div class="form-group">
                        <label for="newPassword" class="col-form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" value="">
                    </div>
                    <div class="form-group">
                        <label for="reNewPassword" class="col-form-label">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control" id="reNewPassword" name="reNewPassword" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger btn-change">Đổi mật khẩu</button>
            </div>
        </div>
    </div>
</div>


<script defer>
    $('#modal_change_password').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)
        var ob = button.data('object')
        var modal = $(this)
        modal.data('url', button.data('url'))
        modal.data('id', ob.id)
    })


    jQuery.validator.setDefaults({
        debug: true,
        errorClass: "invalid",
        rules: {
            newPassword: {
                required: true,
                minlength: 8
            },
            reNewPassword: {
				equalTo: "#newPassword",
				minlength: 8
			}

        },
        messages: {
            newPassword: {
                required: "Bắt buộc nhập mật khẩu",
                minlength: "Hãy nhập ít nhất 8 ký tự"
            },
            reNewPassword: {
				equalTo: "Nhập lại mật khẩu không chính xác",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			}

        }
    });
    var form = $( "#changePasswordModal" );
    form.validate();

    $('.modal-footer .btn-change').click(function(){
        var url = $('#modal_change_password').data('url')
        var id = $('#modal_change_password').data("id")
        if(form.valid()){
            console.log(true);
            axios.post(url, {
                id: id,
                password: $('.modal-body #newPassword').val()
            })
            .then(function(response){
                $('#modal_change_password').modal('hide')
            })
            .catch(function(error){
                console.log(error);
            })
        } else {
            console.log(false);
        }
    })

</script>

