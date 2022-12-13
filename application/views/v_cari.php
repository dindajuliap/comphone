<div class="container mt-5 mb-4">
  <h2><b>Hasil Pencarian</b></h2>
  <hr id="underline" align="left">

  <?php if($hp) : ?>
    <div class="row">
      <?php foreach($hp as $key) : ?>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-2 mb-2">
          <a href="<?= base_url('spesifikasi/'.$key->id_hp)?>">
            <div class="card card-default shadow">
              <img src="<?= base_url('assets/img/hp/'.$key->foto_hp) ?>" id="foto">

              <h6 class="card-title text-md" style="color: black">
                <?php if(strlen($key->nama_hp) <= 26) : ?>
                  <b><?= $key->nama_hp ?></b>
                <?php else : ?>
                  <b><?= substr($key->nama_hp, 0, 26) ?></b>
                <?php endif ?>
              </h6>

              <p id="harga" class="text-muted text-sm">Rp<?= number_format($key->harga,2,',','.') ?></p>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  <?php else : ?>
    <p class="text-muted">Tidak ada brand atau gadget yang ditemukan.</p>
  <?php endif ?>
</div>

<style>
  h2{ margin-bottom: -5px }
  #underline{ border: 2px solid darkorange; width: 5% }
  #foto{ height: 150px; margin: auto; width: auto }
  #harga{ color: black }
  .card{ height: 100%; width: 100%; border-radius: 5px; padding: 15px 25px }

  @media only screen and (max-width: 1024px){
    #underline{ width: 10% }
  }
</style>
