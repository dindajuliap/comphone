<div class="container my-5">
  <?php foreach($brand as $key) : ?>
    <?php
      $this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
      $this->db->order_by('rand()');
      $this->db->limit(5);
      $hp = $this->db->get_where('tabel_hp', ['tabel_hp.id_brand' => $key->id_brand])->result();
    ?>

    <p class="text-muted text-xs">B R A N D</p>
    <h2><b><?= $key->nama_brand ?></b></h2>
    <hr id="underline" align="left">

    <div class="row mb-4">
      <?php $i = 1; foreach($hp as $key1) : ?>
        <div class="<?php if($i <= 2) : ?>col-lg-6 col-md-6 col-sm-6<?php elseif($i == 3) : ?>col-lg-4 col-md-4 col-sm-12<?php else : ?>col-lg-4 col-md-4 col-sm-6<?php endif ?> mx-auto mt-1">
          <div class="card" id="card">
            <h5 class="card-title"><?= $key1->nama_hp ?></h5>
            <p class="card-text mt-1">Rp<?= number_format($key1->harga,2,',','.') ?></p>
            <p class="card-text">Rilis : <?= date('d/m/Y', strtotime($key1->tgl_rilis)) ?></p>
          </div>
        </div>
      <?php $i++; endforeach; ?>
    </div>
  <?php endforeach ?>
</div>

<style>
  h2{ margin-top: -15px; margin-bottom: -8px }
  #underline{ border: 2px solid black; width: 3.5% }
  #card{ padding: 20px; width: 100%; height: 90%; border-radius: 0px; background-size: cover; background-position: center; background-repeat: no-repeat }
  .card-title{ color: darkorange; font-weight: bold }

  @media only screen and (max-width: 1024px){
    #underline{ width: 7% }
    .card-header{ height: 100px }
  }
</style>
