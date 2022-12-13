<div class="col" style="width: 100%">
  <div class="container my-4 mx-auto px-4">
    <div class="row">
      <h2 class="mb-3 col-lg-10 col-md-8 col-sm-8"><b>DATA GADGET</b></h2>

      <div class="col-lg-2 col-md-4 col-sm-4 text-right">
        <button type="button" class="btn text-white btn-sm tambah" data-toggle="modal" data-target="#TambahGadget"><i class="fa fa-plus mr-1"></i> Tambah Gadget</button>
      </div>
    </div>

    <div class="modal fade" id="TambahGadget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title mx-2" id="exampleModalLabel"><b>Tambah Gadget</b></h4>
          </div>

          <form action="<?= base_url('admin/tambah_gadget') ?>" method="POST">
            <div class="modal-body mx-2">
              <div class="form-group">
                <label>Brand <span class="text-danger">*</span></label>
                <select name="id_brand" class="selectpicker form-control" data-live-search="true" title="Pilih brand">
                  <?php foreach ($brand as $key) : ?>
                    <option value="<?= $key->id_brand ?>"><?= $key->nama_brand ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group">
                <label>Nama Gadget <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama_hp" required autocomplete="off">
              </div>

              <div class="form-group">
                <label>Tanggal Rilis <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tgl_rilis" required>
              </div>

              <div class="form-group">
                <label>Sistem Operasi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sistem_operasi" required autocomplete="off">
              </div>

              <div class="form-group">
                <label>Chipset <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="chipset" required autocomplete="off">
              </div>

              <div class="form-group">
                <label>Memori <span class="text-danger">*</span></label>
                <textarea rows="2" class="form-control" name="memori" required autocomplete="off"></textarea>
              </div>

              <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Ukuran Layar <span class="text-danger">*</span></label>
                  <input type="text"  class="form-control" name="ukuran_layar" pattern="[0-9.]+" placeholder="dalam satuan inci" required autocomplete="off">
                </div>

                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                  <label>Daya Baterai <span class="text-danger">*</span></label>
                  <input type="number" min="1" class="form-control" name="daya_baterai" placeholder="dalam satuan mAh" required autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label>Kamera <span class="text-danger">*</span></label>
                <textarea rows="2" class="form-control" name="kamera" required autocomplete="off"></textarea>
              </div>

              <div class="form-group">
                <label>Jaringan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="jaringan" required autocomplete="off">
              </div>

              <div class="form-group">
                <label>Harga <span class="text-danger">*</span></label>
                <input type="number" min="1" class="form-control" name="harga" placeholder="dalam satuan Rupiah" required autocomplete="off">
              </div>

              <div class="form-group">
                <label>Warna <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="warna" required autocomplete="off">
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
					<th>Brand</th>
          <th>Nama Gadget</th>
          <th>Harga</th>
          <th class="no-order">Opsi</th>
				</tr>
			</thead>

      <?php if($daftar) : ?>
        <tbody>
          <?php $i = 1; foreach($daftar as $key) : ?>
            <tr>
              <td align="center"><?= $i ?></td>
              <td><?= $key->nama_brand ?></td>
              <td><?= $key->nama_hp ?></td>
              <td>Rp<?= number_format($key->harga,2,',','.') ?></td>

              <td align="center">
                <button type="button" class="btn btn-info btn-sm mx-1 my-1" data-toggle="modal" data-target="#DetailGadget-<?= $key->id_hp ?>"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-success btn-sm mx-1 my-1" data-toggle="modal" data-target="#UbahGadget-<?= $key->id_hp ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm mx-1 my-1" onclick="hapus(<?= $key->id_hp ?>)"><i class="fas fa-trash"></i></button>
              </td>
            </tr>

            <div class="modal fade" id="DetailGadget-<?= $key->id_hp ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title mx-2" id="exampleModalLabel"><b>Spesifikasi Gadget</b></h4>
                  </div>

                  <div class="modal-body mx-2">
                    <div class="row">
                      <div class="form-group col-lg-6 col-md-12 col-sm-12">
                        <label>Brand</label>
                        <input type="text" class="form-control" name="nama_brand" readonly value="<?= $key->nama_brand ?>">
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-sm-12">
                        <label>Nama Gadget</label>
                        <input type="text" class="form-control" name="nama_hp" readonly value="<?= $key->nama_hp ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Rilis</label>
                      <input type="text" class="form-control" name="nama_hp" readonly value="<?= date_indo($key->tgl_rilis) ?>">
                    </div>

                    <div class="form-group">
                      <label>Sistem Operasi</label>
                      <input type="text" class="form-control" name="sistem_operasi" readonly value="<?= $key->sistem_operasi ?>">
                    </div>

                    <div class="form-group">
                      <label>Chipset</label>
                      <input type="text" class="form-control" name="chipset" readonly value="<?= $key->chipset ?>">
                    </div>

                    <div class="form-group">
                      <label>Memori</label>
                      <textarea rows="2" class="form-control" name="memori" readonly><?= $key->memori ?></textarea>
                    </div>

                    <div class="row">
                      <div class="form-group col-lg-6 col-md-12 col-sm-12">
                        <label>Ukuran Layar</label>
                        <input type="text" class="form-control" name="ukuran_layar" readonly value="<?= $key->ukuran_layar ?> inci">
                      </div>

                      <div class="form-group col-lg-6 col-md-12 col-sm-12">
                        <label>Daya Baterai</label>
                        <input type="text" class="form-control" name="daya_baterai" readonly value="<?= $key->daya_baterai ?> mAh">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Kamera</label>
                      <textarea rows="2" class="form-control" name="kamera" readonly><?= $key->kamera ?></textarea>
                    </div>

                    <div class="form-group">
                      <label>Jaringan</label>
                      <input type="text" class="form-control" name="jaringan" readonly value="<?= $key->jaringan ?>">
                    </div>

                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" name="harga" readonly value="Rp<?= number_format($key->harga,2,',','.') ?>">
                    </div>

                    <div class="form-group">
                      <label>Warna</label>
                      <input type="text" class="form-control" name="warna" readonly value="<?= $key->warna ?>">
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="reset" class="btn btn-danger mx-1" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="UbahGadget-<?= $key->id_hp ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title mx-2" id="exampleModalLabel"><b>Ubah Gadget</b></h4>
                  </div>

                  <form action="<?= base_url('admin/ubah_gadget') ?>" method="POST">
                    <div class="modal-body mx-2">
                      <div class="form-group">
                        <label>Brand <span class="text-danger">*</span></label>
                        <select name="id_brand" class="selectpicker form-control" data-live-search="true" title="Pilih brand">
                          <?php foreach ($brand as $key1) : ?>
                            <option <?= $key->id_brand == $key1->id_brand ? 'selected' : '' ?> value="<?= $key1->id_brand ?>"><?= $key1->nama_brand ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Nama Gadget <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_hp" required autocomplete="off" value="<?= $key->nama_hp ?>">
                        <input type="hidden" name="id_hp" value="<?= $key->id_hp ?>">
                      </div>

                      <div class="form-group">
                        <label>Tanggal Rilis <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tgl_rilis" required value="<?= date('Y-m-d', strtotime($key->tgl_rilis)) ?>">
                      </div>

                      <div class="form-group">
                        <label>Sistem Operasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="sistem_operasi" required autocomplete="off" value="<?= $key->sistem_operasi ?>">
                      </div>

                      <div class="form-group">
                        <label>Chipset <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="chipset" required autocomplete="off" value="<?= $key->chipset ?>">
                      </div>

                      <div class="form-group">
                        <label>Memori <span class="text-danger">*</span></label>
                        <textarea rows="2" class="form-control" name="memori" required autocomplete="off"><?= $key->memori ?></textarea>
                      </div>

                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                          <label>Ukuran Layar <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" pattern="[0-9.]+" name="ukuran_layar" placeholder="dalam satuan inci" required autocomplete="off" value="<?= $key->ukuran_layar ?>">
                        </div>

                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                          <label>Daya Baterai <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" name="daya_baterai" min="1" placeholder="dalam satuan mAh" required autocomplete="off" value="<?= $key->daya_baterai ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Kamera <span class="text-danger">*</span></label>
                        <textarea rows="2" class="form-control" name="kamera" required autocomplete="off"><?= $key->kamera ?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Jaringan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jaringan" required autocomplete="off" value="<?= $key->jaringan ?>">
                      </div>

                      <div class="form-group">
                        <label>Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="harga" min="1" placeholder="dalam satuan Rupiah" required autocomplete="off" value="<?= $key->harga ?>">
                      </div>

                      <div class="form-group">
                        <label>Warna <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="warna" required autocomplete="off" value="<?= $key->warna ?>">
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
    textarea{ resize: none }
    .tambah{ background: darkorange }
  </style>

  <script>
    function hapus(id){
      Swal.fire({
        title: "Peringatan!",
        text: "Anda yakin ingin menghapus gadget ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: 'darkorange',
        cancelButtonColor: 'grey',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Yakin'
      }).then((result) =>{
        if(result.value){
          document.location.href = "<?= base_url() ?>admin/hapus_gadget/" + id;
        }
      });
    }
  </script>
