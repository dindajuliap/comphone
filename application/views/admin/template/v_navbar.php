<nav class="navbar navbar-expand navbar-dark bg-white" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1)">
  <a class="navbar-brand ml-3">
    <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 30px; margin-top: -5px">
    <b class="ml-3">Comphone</b>
  </a>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item mr-3">
      <a href="<?= base_url('admin/keluar') ?>" id="keluar" style="color: black">
        <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
        Keluar
      </a>
    </li>
  </ul>
</nav>

<script>
  $(document).on('click', '#keluar', function(e){
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Keluar',
      text: "Anda yakin ingin keluar?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'darkorange',
      cancelButtonColor: 'grey',
      cancelButtonText: 'Tidak',
      confirmButtonText: 'Yakin'
    }).then((result) =>{
      if(result.value){
        document.location.href = href;
      }
    })
  });
</script>

<style>
  @media only screen and (max-width: 1024px){
    .icon{ display: none }
  }
</style>
