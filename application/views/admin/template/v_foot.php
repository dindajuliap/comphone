</body>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pace-progress/pace.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/js/demo.js') ?>"></script>
<script src="<?= base_url('assets/js/selectpicker.min.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.0/dist/sweetalert2.js"></script>

<script>
  const suksesData     = $('.sukses-data').data('sukses');
  const gagalData 	   = $('.gagal-data').data('gagal');
  const peringatanData = $('.peringatan-data').data('peringatan');

  if(suksesData){
    setTimeout(function(){
      Swal.fire({
        title: 'Berhasil!',
        text: suksesData,
        icon: 'success',
        confirmButtonColor: 'darkorange',
        confirmButtonText: 'OK'
      }).then((result) =>{
        if (result.value){
          document.location.href = href;
        }
      })
    }, 1800);
  }
  else if(gagalData){
    Swal.fire({
      title: 'Gagal!',
      text: gagalData,
      icon: 'error',
      confirmButtonColor: 'darkorange',
      confirmButtonText: 'OK'
    }).then((result) =>{
      if (result.value){
        document.location.href = href;
      }
    })
  }
  else if(peringatanData){
    setTimeout(function(){
      Swal.fire({
        title: 'Peringatan!',
        text: peringatanData,
        icon: 'warning',
        confirmButtonColor: 'darkorange',
        confirmButtonText: 'OK'
      }).then((result) =>{
        if (result.value){
          document.location.href = href;
        }
      })
    }, 1800);
  }
</script>

<script>
	$(function (){
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
			"columnDefs": [
		    { "orderable": false, "targets": "no-order" }
		  ]
		});

		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
