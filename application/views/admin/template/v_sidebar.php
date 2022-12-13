<style>
  #body-row{
    margin-left: 0;
    margin-right: 0;
  }

  #sidebar-container{
    min-height: 100vh;
    background-color: darkorange;
    padding: 0;
  }

  .sidebar-expanded{
    width: 16%;
  }

  .list-group-item{
    height: 50px;
    padding: auto 25px;
    background: darkorange;
    border: 1px solid darkorange;
  }

  .list-group-item:hover{
    background: orange;
    border-radius: 0;
  }

  @media only screen and (max-width: 1024px){
    #hidden{ display: none }
    .sidebar-expanded{ width: 8.5% }
  }
</style>

<div class="row" id="body-row">
  <div id="sidebar-container" class="sidebar-expanded">
    <a href="<?= base_url('admin/brand') ?>" class="list-group-item list-group-item-action text-white">
      <i class="fab fa-apple fa-sm mr-3"></i> <span id="hidden">Data Brand</span>
    </a>

    <a href="<?= base_url('admin/gadget') ?>" class="list-group-item list-group-item-action text-white">
      <i class="fa fa-mobile-alt fa-sm mr-3"></i> <span id="hidden">Data Gadget</span>
    </a>

    <a href="<?= base_url('admin/pencarian') ?>" class="list-group-item list-group-item-action text-white">
      <i class="fa fa-search fa-sm mr-3"></i><span id="hidden">Data Pencarian</span>
    </a>
  </div>
