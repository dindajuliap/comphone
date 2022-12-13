<div class="container mt-4 mb-2">
  <?php foreach($brand as $key) : ?>
    <?php
      $this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
      $this->db->order_by('rand()');
      $hp = $this->db->get_where('tabel_hp', ['tabel_hp.id_brand' => $key->id_brand])->result();
    ?>

    <h2><b><?= $key->nama_brand ?></b></h2>
    <hr id="underline" align="left">

    <div class="uk-slider-container-offset mt-3 mb-1" uk-slider>
      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
        <ul class="uk-slider-items uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s">
          <?php foreach($hp as $key1) : ?>
            <li>
              <a href="<?= base_url('spesifikasi/'.$key1->id_hp) ?>">
                <div class="uk-card uk-card-default">
                  <div class="uk-card-media-top text-center">
                    <img src="<?= base_url('assets/img/hp/'.$key1->foto_hp) ?>" id="foto" class="mt-3">
                  </div>

                  <h6 class="uk-card-title text-md mt-3">
                    <?php if(strlen($key1->nama_hp) <= 26) : ?>
                      <b><?= $key1->nama_hp ?></b>
                    <?php else : ?>
                      <b><?= substr($key1->nama_hp, 0, 26) ?></b>
                    <?php endif ?>
                  </h6>

                  <p id="harga" class="text-muted">Rp<?= number_format($key1->harga,2,',','.') ?></p>
                </div>
              </a>
            </li>
          <?php endforeach ?>
        </ul>

        <a class="bg-black uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="bg-black uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
      </div>
    </div>
  <?php endforeach ?>
</div>

<style>
  #underline{ border: 2px solid darkorange; width: 3.5% }
  #foto{ height: 150px; margin: auto; width: auto }
  #harga{ color: black; margin-top: -7px }
  .uk-card{ height: 100%; width: 95%; padding: 15px 25px; border-radius: 5px }
  .uk-position-small{ border-radius: 50%; opacity: 0.1 }

  @media only screen and (max-width: 1024px){
    #underline{ width: 7% }
  }
</style>
