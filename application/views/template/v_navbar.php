<nav class="navbar navbar-expand navbar-light bg-white">
  <a class="navbar-brand ml-3">
    <img src="<?= base_url('assets/img/logo.png') ?>" id="logo" style="margin-top: -5px">
  </a>

  <div class="navbar-nav">
    <a class="nav-link <?php if($title == 'Comphone') : ?>active<?php endif ?>" href="<?= base_url() ?>">Beranda</a>
    <a class="nav-link <?php if($title == 'Comphone - Daftar Gadget') : ?>active<?php endif ?>" href="<?= base_url('daftar-gadget') ?>">Daftar Gadget</a>
    <a class="nav-link <?php if($title == 'Comphone - Bandingkan') : ?>active<?php endif ?>" href="<?= base_url('bandingkan') ?>">Bandingkan</a>
  </div>

  <ul class="navbar-nav ml-auto mr-3">
    <li class="nav-item">
      <form class="d-flex" role="search" method="post" action="<?= base_url('cari/hp') ?>">
        <input class="form-control me-2 form-control-sm" type="search" placeholder="Cari brand atau gadget" aria-label="Cari" id="cari" name="cari" autocomplete="off">
        <button class="btn btn-sm" type="submit" id="tombol">Cari</button>
      </form>
    </li>
  </ul>
</nav>

<style>
  #logo{ width: 30px }
  #cari{ margin-right: -1px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; background: none }
  #tombol{ border-top-left-radius: 0px; border-bottom-left-radius: 0px; background: darkorange; color: white }
</style>
