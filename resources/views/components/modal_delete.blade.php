<div class="modal fade" id="modal_remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel"> <i class="fas fa-exclamation-triangle"></i> Cảnh báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-default text-alert">Bạn có chắc chắn muốn xóa thiết bị </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger btn-delete">Xóa</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('#modal_remove').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)
        var ob = button.data('object')
        var modal = $(this)
        var url = button.data('url')

        modal.find('.modal-footer .btn-delete').click(function(){
            axios.post(url, {
                id: ob.id
            })
            .then(function(response){
                $('#modal_remove').modal('hide')
                $('.item-' + ob.id).fadeOut(500);
            })
            .catch(function(error){
                console.log(error);
            })
            
        })

        modal.find('.modal-body .text-alert').html('<p>Bạn có chắc chắn muốn xóa: <b>' + ob.name + '</b></p>')

    })
</script>

