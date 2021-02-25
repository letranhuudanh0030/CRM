<div class="modal fade" id="modal_permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="name" class="col-form-label">Nhóm quyền:</label>
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
    $('#modal_permission').on('shown.bs.modal', function (event) {
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
            modal.find('.modal-body form').data("id", ob.id)
            modal.find('.modal-body form').data("action", action)          
            modal.find('.modal-title').html(name + " nhóm quyền: <b>" + name_in_list + "</b>")
        } 
        else if(action == "create"){
            modal.find('.modal-body #name').val("")
            modal.find('.modal-body form').data("action", action)       
            modal.find('.modal-title').text(name + " nhóm quyền")
        }
    })


    $('.modal-footer .btn-save').click(function(e) {
        var action = $('.modal-body form').data("action");
        var id = $('.modal-body form').data("id");

        if(action == 'edit'){
            axios.post('/permission/update', {
                id: id,
                name: $('.modal-body #name').val(),
            })
            .then(function (response) {
                $('.name-' + id).text(response.data.name)
            })
            .catch(function (error) {
                console.log(error);
            });
        } else if(action == "create"){
            let name = $('.modal-body #name').val()
                
            axios.post('/permission/store', {
                name: name,
            })
            .then(function (response) {
                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        }

        $('#modal_permission').modal('hide')
    })

</script>