<div class="col" style="width: 100%">
  <div class="container my-4 mx-auto px-4">
    <h2 class="mb-3 col-lg-10 col-md-8 col-sm-8"><b>DATA PENCARIAN</b></h2>

    <table id="example1" class="table table-bordered table-striped mt-2">
			<thead>
				<tr align="center">
					<th>No.</th>
          <th>Nama HP</th>
          <th>Total Pencarian</th>
				</tr>
			</thead>

      <?php if($daftar) : ?>
        <tbody>
          <?php $i = 1; foreach($daftar as $key) : ?>
            <tr>
              <td align="center"><?= $i ?></td>
              <td><?= $key->nama_hp ?></td>
              <td align="center"><?= $key->total_pencarian ?> Kali</td>
            </tr>
          <?php $i++; endforeach; ?>
        </tbody>
      <?php endif ?>
    </table>
  </div>
