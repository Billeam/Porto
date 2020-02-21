<div class="container mt-5 mb-5">
	<div class="card">
		<div class="cars-body">
			<?php foreach ($detail as $dt): ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 100%" src="<?php echo base_url('Assets/upload/'.$dt->gambar) ?>">
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Merk</th>
								<td><?php echo $dt->merek ?></td>
							</tr>
							<tr>
								<th>No Plat</th>
								<td><?php echo $dt->no_plat ?></td>
							</tr>
							<tr>
								<th>Warna</th>
								<td><?php echo $dt->warna ?></td>
							</tr>
							<tr>
								<th>Tahun</th>
								<td><?php echo $dt->tahun ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php  if($dt->status == '1'){
									echo "Tersedia";
								}else{
									echo "Tidak Tersedia";
								} ?>	
								</td>
							</tr>
							<tr>
									<td></td>
								<td>
									<?php 

                if ($dt->status == "0"){
                  echo "<span class='btn btn-danger' disable>Telah di Sewa</span>";}else{
                    echo anchor('costumer/rental/tambah_rental'.$dt->id_mobil, '<button class = "btn btn-success">Rental</button>');
                  }
                 ?>
								</td>
							</tr>

						</table>
					</div>
				</div>
			<?php endforeach; ?>

		</div>


	</div>



</div>