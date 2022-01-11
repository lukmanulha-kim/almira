<?php  ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="fas fa-chalkboard-teacher"></i> <?php echo $judul ?></h1>
                        <hr>
                    	<div class="card mb-4">
                            <div class="card-header">
                                <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-outline-primary">Tambah Data</button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mapel</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $no=1; foreach ($mapel->result() as $dataMapel): ?>
	                                    	<tr>
	                                    		<td><?php echo $no++; ?></td>
	                                            <td><?php echo $dataMapel->nama_mapel ?></td>
	                                            <td><?php if ($dataMapel->status_mapel==1) {echo"Aktif";}else{echo "Tidak Aktif";} ?></td>
	                                            <td style="text-align:center;">
	                                            	<div class="btn-group">
		                                            	<a data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-outline-secondary editMapel" data-id="<?php echo enkrip($dataMapel->id_mapel);?>" data-mapel="<?php echo $dataMapel->nama_mapel ?>" data-status="<?php echo $dataMapel->status_mapel ?>">Edit</a>
	                                            	</div>
	                                            </td>
	                                    	</tr>                                    		
                                    	<?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

				<!-- Add Modal Mapel -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-chalkboard-teacher"></i>  Tambah Data Mata Pelajaran</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form method="post" action="<?php echo base_url('index.php/') ?>mapel/tambah">
				      		<input type="text"name="i_user" value="<?= enkrip($this->session->userdata('id_guru')); ?>" required hidden>
				      		<div class="form-group">
							    <input type="text" id="myInput" name="i_mapel" class="form-control form-control-sm" placeholder="Masukkan Nama Mata Pelajaran" required>
							    <code>Tulis Nama Mapel Disertai Kelas. Contoh : <b>Matematika Kelas 10</b></code>
							</div>
							<hr>
							<div class="form-group">
								<button type="submit" name="i_simpan" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"></i> Simpan</button>
							</div>
				      	</form>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- Edit Modal Materi -->
				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-chalkboard-teacher"></i>  Edit Mata Pelajaran</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<form method="post" action="<?php echo base_url('index.php/') ?>mapel/update">
				      		<input type="text" name="i_id" id="i_id" hidden required>
				      		<input type="text" name="i_user" value="<?= enkrip($this->session->userdata('id_guru')); ?>" required hidden>
				      		<div class="form-group">
							    <input type="text" id="i_mapel" name="i_mapel" class="form-control form-control-sm"required>
							</div>
							<div class="form-group">
		                        <input type="radio" name="i_status" id="i_status" value="1" required> Aktif
		                        <input type="radio" name="i_status" id="i_status" value="0"> Tidak Aktif
		                    </div>
							<hr>
							<div class="form-group">
								<button type="submit" name="i_simpan" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"></i> Simpan</button>
							</div>
				      	</form>
				      </div>
				    </div>
				  </div>
				</div>