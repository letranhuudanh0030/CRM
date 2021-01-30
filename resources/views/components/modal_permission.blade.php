<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nhóm quyền:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary btn-save" data-id="" data-name="">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>

   


    $('#modal').on('show.bs.modal', function (event) {
        
        var button = $(event.relatedTarget) 
        var action = button.data('action') 
        var name = button.data('name')
        var ob = button.data('object')
        var permission_name = ""
        $('.btn-save').attr('data-id', ob.id)
        $('.btn-save').attr('data-name', ob.name)

        var modal = $(this)

        if(action == "edit"){
            var permission_id = ob.id
            permission_name = ob.name
            modal.find('.modal-body #name').val(permission_name)
            // modal.find('.modal-footer .btn-save').click(function(e){
            //     console.log(ob)
            //     axios.post('/permission/update', {
            //         id: permission_id,
            //         name: modal.find('.modal-body #name').val(),
            //     })
            //     .then(function (response) {
            //         $('#modal').modal('hide')
            //         $('.permission-name-' + permission_id).text(response.data.name)
            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
            // })
            
            modal.find('.modal-title').html(name + " nhóm quyền: <b>" + permission_name + "</b>")
        } 
        else if(action == "create"){
            modal.find('.modal-footer .btn-save').click(function(){
                let name = modal.find('.modal-body #name').val()
                
                axios.post('/permission/store', {
                    name: name,
                })
                .then(function (response) {
                    console.log(response);
                    $('#modal').modal('hide')
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
            })

            modal.find('.modal-title').text(name + " nhóm quyền")
        }
    })

  
    $('.btn-save').click(function(e){
        let id = $(this).data('id')
        console.log(id);
        $('#modal').modal('hide')
    })

</script>