$(function () {
    $("#data_table").DataTable({
    "order": [[0, 'desc']],
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#data_table_wrapper .col-md-6:eq(0)');      

    var checkboxlist = $('#table-content')
    checkboxlist.on('click', ".status", function(){
        var id = $(this).attr('id').replace("status_", "")
        var url = $(this).attr('url')
        var status = $(this).is(':checked');
        axios.post(url, {
            id : id,
            status: status
        }).then(function(response) {
            console.log(response);
        }).catch(function(error) {
            console.log(error);
        })
    })


    $('#modal_device_type, #modal_branch, #modal_change_password, #modal_remove, #modal_device, #modal_permission, #modal_task, #modal_user').on('hidden.bs.modal', function (e) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    })

});