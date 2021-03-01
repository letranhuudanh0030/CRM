<div class="modal fade" id="modal_remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-url="" data-id="">>
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
        modal.data('url', button.data('url'))
        modal.data('id', ob.id)
        var name_in_list = $('.name-' + ob.id).text();
        modal.find('.modal-body .text-alert').html('<p>Bạn có chắc chắn muốn xóa: <b>' + name_in_list + '</b></p>')
    })

    $('.modal-footer .btn-delete').click(function(){
        var url = $('#modal_remove').data('url')
        var id = $('#modal_remove').data("id")

        axios.post(url, {
            id: id
        })
        .then(function(response){
            $('#modal_remove').modal('hide')
            $('.item-' + id).fadeOut(500);
        })
        .catch(function(error){
            console.log(error);
        })
        
    })
</script>

