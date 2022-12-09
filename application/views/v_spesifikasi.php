<div class="container mt-4 mb-4">
  <h1 align="center"><b><?= $hp['nama_hp'] ?></b></h1>

  <div class="row mt-3 mb-4">
    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto text-center">
      <img src="<?= base_url('assets/img/hp/'.$hp['foto_hp']) ?>" id="foto">
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
      <table border="0">
        <tr>
          <th id="kiri">Spesifikasi</th>
          <th>Keterangan</th>
        </tr>

        <tr>
          <td>Tanggal Rilis</td>
          <td><?= date_indo($hp['tgl_rilis']) ?></td>
        </tr>

        <tr>
          <td>Ukuran Layar</td>
          <td><?= $hp['ukuran_layar'] ?> inci</td>
        </tr>

        <tr>
          <td>Sistem Operasi</td>
          <td><?= $hp['sistem_operasi'] ?></td>
        </tr>

        <tr>
          <td>Chipset</td>
          <td><?= $hp['chipset'] ?></td>
        </tr>

        <tr>
          <td>Ukuran Memori</td>
          <td><?= $hp['memori'] ?></td>
        </tr>

        <tr>
          <td>Daya Baterai</td>
          <td><?= number_format($hp['daya_baterai'],0,',','.') ?> mAh</td>
        </tr>

        <tr>
          <td>Kamera</td>
          <td><?= $hp['kamera'] ?></td>
        </tr>

        <tr>
          <td>Jaringan</td>
          <td><?= $hp['jaringan'] ?></td>
        </tr>

        <tr>
          <td>Harga</td>
          <td>Rp<?= number_format($hp['harga'],2,',','.') ?></td>
        </tr>

        <tr>
          <td>Warna</td>
          <td><?= $hp['warna'] ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>

<style>
  #foto{ width: 100% }
  table{ width: 100% }
  th{ background: darkorange; color: white; padding: 10px; text-align: center }
  td{ background: whitesmoke; padding: 7px 20px; border: 1px solid white }
  #kiri{ width: 30% }

  @media only screen and (max-width: 1024px){
    #kiri{ width: 35% }
  }
</style>
