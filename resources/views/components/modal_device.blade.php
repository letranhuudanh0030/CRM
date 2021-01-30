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
                        <label for="name" class="col-form-label">Tên thiết bị:</label>
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

<script>
    $('#modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var action = button.data('action') // Extract info from data-* attributes
            var name = button.data('name')
            var ob = button.data('object')
            var device_name = ""

            var modal = $(this)

            if(action == "edit"){
                var device_id = ob.id
                device_name = ob.name
                modal.find('.modal-body #name').val(device_name)
                modal.find('.modal-footer .btn-save').click(function(){
                    axios.post('/devices/update', {
                        id: device_id,
                        name: modal.find('.modal-body #name').val(),
                    })
                    .then(function (response) {
                        // console.log(response.data.name);
                        $('#modal').modal('hide')
                        // location.reload();
                        $('.device-name-' + device_id).text(response.data.name)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
                
                modal.find('.modal-title').text(name + " thiết bị: " + device_name)
            } 
            else if(action == "create"){
                modal.find('.modal-footer .btn-save').click(function(){
                    let name = modal.find('.modal-body #name').val()
                  
                    axios.post('/devices/store', {
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

                modal.find('.modal-title').text(name + " thiết bị")
            }
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).

            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            
            
        })
</script>