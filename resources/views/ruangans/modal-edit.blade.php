<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-ruangan" id="exampleModalLabel">EDIT RUANGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="ruangan_id">

                <div class="form-group">
                    <label for="name" class="control-label">Ruangan</label>
                    <input type="text" class="form-control" id="ruangan-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-ruangan-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create ruangan event
    $('body').on('click', '#btn-edit-ruangan', function () {

        let ruangan_id = $(this).data('id');

        //fetch detail ruangan with ajax
        $.ajax({
            url: `/ruangans/${ruangan_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#ruangan_id').val(response.data.id);
                $('#ruangan-edit').val(response.data.nama_ruangan);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update ruangan
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let ruangan_id = $('#ruangan_id').val();
        let nama_ruangan   = $('#ruangan-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/ruangans/${ruangan_id}`,
            type: "PUT",
            cache: false,
            data: {
                "nama_ruangan": nama_ruangan,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    ruangan: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data ruangan
                let ruangan = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama_ruangan}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-ruangan" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-ruangan" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to ruangan data
                $(`#index_${response.data.id}`).replaceWith(ruangan);

                //close modal
                $('#modal-edit').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.ruangan[0]) {

                    //show alert
                    $('#alert-ruangan-edit').removeClass('d-none');
                    $('#alert-ruangan-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-ruangan-edit').html(error.responseJSON.ruangan[0]);
                } 

            }

        });

    });

</script>