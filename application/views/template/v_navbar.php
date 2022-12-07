<nav class="navbar navbar-expand navbar-light bg-white">
  <a class="navbar-brand ml-3">
    <img src="<?= base_url('assets/img/logo.png') ?>" id="logo" style="margin-top: -5px">
  </a>

  <div class="navbar-nav">
    <a class="nav-link <?php if($title == 'Comphone') : ?>active<?php endif ?>" href="<?= base_url() ?>">Beranda</a>
    <a class="nav-link <?php if($title == 'Comphone - Daftar HP') : ?>active<?php endif ?>" href="<?= base_url('daftar-hp') ?>">Daftar HP</a>
    <a class="nav-link <?php if($title == 'Comphone - Bandingkan') : ?>active<?php endif ?>" href="<?= base_url('bandingkan') ?>">Bandingkan</a>
  </div>

  <ul class="navbar-nav ml-auto mr-3">
    <li class="nav-item">
      <form class="d-flex" role="search">
        <input class="form-control me-2 form-control-sm" type="search" placeholder="Cari HP" aria-label="Cari" id="cari">
        <button class="btn btn-sm" type="submit" id="tombol">Cari</button>
      </form>
    </li>
  </ul>
</nav>

<style>
  #logo{ width: 30px }
  #cari{ margin-right: -1px; border-radius: 0px }
  #tombol{ border-radius: 0px; color: darkorange; border: 1px solid darkorange }
  #tombol:hover{ background: darkorange; color: white }
</style>
