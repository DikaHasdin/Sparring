<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Ruangan</label>
                    <input type="text" class="form-control" id="nama_ruangan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_ruangan"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create ruangan event
    $('body').on('click', '#btn-create-ruangan', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create ruangan
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let nama_ruangan   = $('#nama_ruangan').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/ruangans`,
            type: "POST",
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
                    nama_ruangan: `${response.message}`,
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
                
                //append to table
                $('#table-ruangans').prepend(ruangan);
                
                //clear form
                $('#nama_ruangan').val('');
                $('#content').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.nama_ruangan[0]) {

                    //show alert
                    $('#alert-nama_ruangan').removeClass('d-none');
                    $('#alert-nama_ruangan').addClass('d-block');

                    //add message to alert
                    $('#alert-nama_ruangan').html(error.responseJSON.nama_ruangan[0]);
                } 

                // if(error.responseJSON.content[0]) {

                //     //show alert
                //     $('#alert-content').removeClass('d-none');
                //     $('#alert-content').addClass('d-block');

                //     //add message to alert
                //     $('#alert-content').html(error.responseJSON.content[0]);
                // } 

            }

        });

    });

</script>