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
                        <label for="name" class="col-form-label">Chi nhánh:</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
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
    $('#modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var action = button.data('action') // Extract info from data-* attributes
            var name_action = button.data('name')
            var ob = button.data('object')
            var device_name = ""

            var modal = $(this)

            if(action == "edit"){
                device_name = ob.name
                modal.find('.modal-body #name').val(device_name)
                modal.find('.modal-footer .btn-save').click(function(){
                    axios.post('/branch/update', {
                        id: ob.id,
                        name: modal.find('.modal-body #name').val(),
                        address: modal.find('.modal-body #address').val()
                    })
                    .then(function (response) {
                        // console.log(response.data.name);
                        $('#modal').modal('hide')
                        // location.reload();
                        $('.branch-name-' + ob.id).text(response.data.name)
                        $('.branch-address-' + ob.id).text(response.data.address)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
                
                modal.find('.modal-title').text(name_action + " chi nhánh: " + device_name)
            } 
            else if(action == "create"){
                modal.find('.modal-footer .btn-save').click(function(){
                    let name = modal.find('.modal-body #name').val()
                    let address = modal.find('.modal-body #address').val()
                  
                    axios.post('/branch/store', {
                        name: name,
                        address: address
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

                modal.find('.modal-title').text(name_action + " chi nhánh")
            }
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            
            
        })
</script>