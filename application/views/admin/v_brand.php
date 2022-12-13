<div class="col" style="width: 100%">
  <div class="container my-4 mx-auto px-4">
    <div class="row">
      <h2 class="mb-3 col-lg-10 col-md-8 col-sm-8"><b>DATA BRAND</b></h2>

      <div class="col-lg-2 col-md-4 col-sm-4 text-right">
        <button type="button" class="btn text-white btn-sm tambah" data-toggle="modal" data-target="#TambahBrand"><i class="fa fa-plus mr-1"></i> Tambah Brand</button>
      </div>
    </div>

    <div class="modal fade" id="TambahBrand" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title mx-2" id="exampleModalLabel"><b>Tambah Brand</b></h4>
          </div>

          <form action="<?= base_url('admin/tambah_brand') ?>" method="POST">
            <div class="modal-body mx-2">
              <div class="form-group">
                <label>Nama Brand <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_brand" required autocomplete="off">
              </div>
            </div>

            <div class="modal-footer">
              <button type="reset" class="btn btn-danger mx-1" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success mx-2">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <table id="example1" class="table table-bordered table-striped mt-2">
			<thead>
				<tr align="center">
					<th>No.</th>
					<th>Nama Brand</th>
          <th class="no-order">Opsi</th>
				</tr>
			</thead>

      <?php if($daftar) : ?>
        <tbody>
          <?php $i = 1; foreach($daftar as $key) : ?>
            <tr>
              <td align="center"><?= $i ?></td>
              <td><?= $key->nama_brand ?></td>

              <td align="center">
                <button type="button" class="btn btn-success btn-sm mx-1 my-1" data-toggle="modal" data-target="#UbahBrand-<?= $key->id_brand ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm mx-1 my-1" onclick="hapus(<?= $key->id_brand ?>)"><i class="fas fa-trash"></i></button>
              </td>
            </tr>

            <div class="modal fade" id="UbahBrand-<?= $key->id_brand ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title mx-2" id="exampleModalLabel"><b>Ubah Brand</b></h4>
                  </div>

                  <form action="<?= base_url('admin/ubah_brand') ?>" method="POST">
                    <div class="modal-body mx-2">
                      <div class="form-group">
                        <label>Nama Brand <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_brand" required autocomplete="off" value="<?= $key->nama_brand ?>">
                        <input type="hidden" name="id_brand" value="<?= $key->id_brand ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger mx-1" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success mx-2">Ubah</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php $i++; endforeach; ?>
        </tbody>
      <?php endif ?>
    </table>
  </div>

  <style>
    .tambah{ background: darkorange }
  </style>

  <script>
    function hapus(id){
      Swal.fire({
        title: "Peringatan!",
        text: "Anda yakin ingin menghapus brand ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: 'darkorange',
        cancelButtonColor: 'grey',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Yakin'
      }).then((result) =>{
        if(result.value){
          document.location.href = "<?= base_url() ?>admin/hapus_brand/" + id;
        }
      });
    }
  </script>
