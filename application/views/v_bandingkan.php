<div class="container mt-4 mb-2 px-lg-5 px-md-0 px-sm-0">
  <h1 align="center"><b>Bandingkan Gadget</b></h1>

  <form method="post" action="<?= base_url('bandingkan/buka') ?>">
    <div class="row mt-4">
      <div class="col-auto mx-auto" id="select">
        <select name="id_hp_1" class="selectpicker form-control" data-live-search="true">
          <option disabled selected>Pilih gadget</option>

          <?php foreach ($hp as $key) : ?>
            <option <?= $key->id_hp == $id_hp_1 ? 'selected':'' ?> value="<?= $key->id_hp ?>"><?= $key->nama_hp ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="col-auto mx-auto" id="button">
        <button type="submit" class="btn" id="bandingkan">Bandingkan</button>
      </div>

      <div class="col-auto mx-auto" id="select">
        <select name="id_hp_2" class="selectpicker form-control" data-live-search="true">
          <option disabled selected>Pilih gadget</option>

          <?php foreach ($hp as $key) : ?>
            <option <?= $key->id_hp == $id_hp_2 ? 'selected':'' ?> value="<?= $key->id_hp ?>"><?= $key->nama_hp ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </form>

  <?php if($hp_1 AND $hp_2) : ?>
    <div class="row">
      <div class="col-auto mt-5" id="tabel">
        <h4 align="center"><b><?= $hp_1['nama_hp'] ?></b></h4>

        <div class="row mt-3 mb-4">
          <div class="col-12 mx-auto text-center">
            <img src="<?= base_url('assets/img/hp/'.$hp_1['foto_hp']) ?>" id="foto">
          </div>
        </div>

        <div class="row">
          <div class="col-12 mx-auto">
            <table border="0">
              <tr>
                <th id="kiri">Spesifikasi</th>
                <th>Keterangan</th>
              </tr>

              <tr>
                <td>Ukuran Layar</td>
                <td class="<?php if($hp_1['ukuran_layar'] < $hp_2['ukuran_layar']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_1['ukuran_layar'] ?> inci
                </td>
              </tr>

              <tr>
                <td>Sistem Operasi</td>
                <td><?= $hp_1['sistem_operasi'] ?></td>
              </tr>

              <tr>
                <td>Chipset</td>
                <td><?= $hp_1['chipset'] ?></td>
              </tr>

              <tr>
                <td>Ukuran Memori</td>
                <td class="<?php if(strlen($hp_1['memori']) < strlen($hp_2['memori'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_1['memori'] ?>
                </td>
              </tr>

              <tr>
                <td>Daya Baterai</td>
                <td class="<?php if($hp_1['daya_baterai'] < $hp_2['daya_baterai']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= number_format($hp_1['daya_baterai'],0,',','.') ?> mAh
                </td>
              </tr>

              <tr>
                <td>Kamera</td>
                <td class="<?php if(strlen($hp_1['kamera']) < strlen($hp_2['kamera'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_1['kamera'] ?>
                </td>
              </tr>

              <tr>
                <td>Jaringan</td>
                <td class="<?php if(strlen($hp_1['jaringan']) < strlen($hp_2['jaringan'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_1['jaringan'] ?>
                </td>
              </tr>

              <tr>
                <td>Harga</td>
                <td class="<?php if($hp_1['harga'] > $hp_2['harga']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  Rp<?= number_format($hp_1['harga'],2,',','.') ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-auto mt-5" id="vs">
        <h4 align="center"><b>VS</b></h4>
      </div>

      <div class="col-auto mt-5" id="tabel">
        <h4 align="center"><b><?= $hp_2['nama_hp'] ?></b></h4>

        <div class="row mt-3 mb-4">
          <div class="col-12 mx-auto text-center">
            <img src="<?= base_url('assets/img/hp/'.$hp_2['foto_hp']) ?>" id="foto">
          </div>
        </div>

        <div class="row">
          <div class="col-12 mx-auto">
            <table border="0">
              <tr>
                <th id="kiri">Spesifikasi</th>
                <th>Keterangan</th>
              </tr>

              <tr>
                <td>Ukuran Layar</td>
                <td class="<?php if($hp_2['ukuran_layar'] < $hp_1['ukuran_layar']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_2['ukuran_layar'] ?> inci
                </td>
              </tr>

              <tr>
                <td>Sistem Operasi</td>
                <td><?= $hp_2['sistem_operasi'] ?></td>
              </tr>

              <tr>
                <td>Chipset</td>
                <td><?= $hp_2['chipset'] ?></td>
              </tr>

              <tr>
                <td>Ukuran Memori</td>
                <td class="<?php if(strlen($hp_2['memori']) < strlen($hp_1['memori'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_2['memori'] ?>
                </td>
              </tr>

              <tr>
                <td>Daya Baterai</td>
                <td class="<?php if($hp_2['daya_baterai'] < $hp_1['daya_baterai']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= number_format($hp_2['daya_baterai'],0,',','.') ?> mAh
                </td>
              </tr>

              <tr>
                <td>Kamera</td>
                <td class="<?php if(strlen($hp_2['kamera']) < strlen($hp_1['kamera'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_2['kamera'] ?>
                </td>
              </tr>

              <tr>
                <td>Jaringan</td>
                <td class="<?php if(strlen($hp_2['jaringan']) < strlen($hp_1['jaringan'])) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  <?= $hp_2['jaringan'] ?>
                </td>
              </tr>

              <tr>
                <td>Harga</td>
                <td class="<?php if($hp_2['harga'] > $hp_1['harga']) : ?>text-danger<?php else : ?>text-success<?php endif ?>">
                  Rp<?= number_format($hp_2['harga'],2,',','.') ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
</div>

<style>
  #bandingkan{ background: darkorange; color: white; width: 100% }
  #select{ width: 42.5% }
  #button{ width: 15% }
  #tabel{ width: 48.5% }
  #vs{ width: 3% }
  #foto{ height: 200px }
  table{ width: 100% }
  th{ background: darkorange; color: white; padding: 10px; text-align: center }
  td{ background: whitesmoke; padding: 7px 20px; border: 1px solid white }
  #kiri{ width: 35% }

  @media only screen and (max-width: 1024px){
    #select{ width: 36.5% }
    #button{ width: 27% }
    #tabel{ width: 100% }
    #vs{ display: none }
  }
</style>
