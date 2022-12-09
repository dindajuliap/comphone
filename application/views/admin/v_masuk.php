<div class="container" id="form">
  <div class="col-lg-4 col-md-6 col-sm-8 card mx-auto my-5 shadow">
    <form action="" method="post">
      <div class="text-center"><img src="<?= base_url('assets/img/logo.png') ?>" style="width: 15%"></div>
      <h3 class="text-center mt-2 mb-4"><b>Admin Panel</b></h3>

      <div class="mt-4"><?= $this->session->flashdata('message') ?></div>

      <input type="text" name="email_akun" class="form-control mt-3" placeholder="Masukkan email" autocomplete="off">
      <small class="form-text text-danger"><?= form_error('email_akun') ?></small>

      <input type="password" name="kata_sandi" class="form-control mt-3" id="kata_sandi" placeholder="Masukkan kata sandi">
      <span id="show" onclick="show()"><i class="fa fa-eye icon"></i></span>
      <small class="form-text text-danger" style="margin: -20px 0 -15px 0"><?= form_error('kata_sandi') ?></small>

      <button type="submit" class="form-control btn mt-3" id="masuk">Masuk</button>
    </form>
  </div>
</div>

<style>
  html, body{ width: 100%; height: 100%; display: table }
  #form{ width: 100%; display: table-cell; vertical-align: middle }
  .card{ padding: 30px 40px 40px 40px; width: 100%; border-radius: 5px }
  #kata_sandi{ padding-right: 10% }
  #show{ position: relative; z-index: 1; left: 93%; top: -31px; cursor: pointer; color: #AFAFAF }
  #masuk{ background: darkorange; color: white; width: 100%; border-radius: 5px }
  .form-control{ border-radius: 5px }

  @media only screen and (max-width: 1024px){
    #show{ left: 92% }
    #kata_sandi{ padding-right: 11% }
  }
</style>

<script type="text/javascript">
  function show(){
    var x = document.getElementById('kata_sandi').type;

    if (x == 'password'){
      document.getElementById('kata_sandi').type = 'text';
      document.getElementById('show').innerHTML = '<i class="fa fa-eye-slash icon"></i>';
    }
    else{
      document.getElementById('kata_sandi').type = 'password';
      document.getElementById('show').innerHTML = '<i class="fa fa-eye icon"></i>';
    }
  }
</script>
