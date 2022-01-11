<?php  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $judul ?> - AlMira</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
    </head>
    <body class="sb-nav-fixed sb-sidenav-toggled">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?= base_url('index.php/') ?>materi">Al-Mira</a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-1"><?php echo $judul ?> <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-outline-primary">Tambah Data</button></h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Semester Ganjil</b>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($materi->result() as $materiGanjil): ?>
                                            <?php if ($materiGanjil->semester=='Ganjil'): ?>
                                                <li class="list-group-item list-group-item-action" name="materi" id="<?= $materiGanjil->id_materi ?>" onClick="getName(this.id)">
                                                    <?php if ($materiGanjil->status_bljr=='1'): ?>
                                                        <i class="fas fa-check"></i>
                                                    <?php endif ?> 
                                                    <?php echo $materiGanjil->judul_bab ?>
                                                </li>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </ul>
                                    <div class="card-header">
                                        <b>Semester Genap</b>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($materi->result() as $materiGenap): ?>
                                            <?php if ($materiGenap->semester=='Genap'): ?>
                                                <li class="list-group-item list-group-item-action" name="materi" id="<?= $materiGenap->id_materi ?>" onClick="getName(this.id)">
                                                    <?php if ($materiGenap->status_bljr=='1'): ?>
                                                        <i class="fas fa-check"></i>
                                                    <?php endif ?> 
                                                    <?php echo $materiGenap->judul_bab ?>        
                                                </li>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card" id="card">
                                    <div class="card-header text-right">
                                        <a href="#" id="toggle_fullscreen"><i class="fas fa-expand-alt"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#editMateri" class="btn_utiliti" onclick="editMateri()" hidden><i class="fas fa-edit"></i></a>
                                        <a href="#" onclick="deleteMateri()" class="btn_utiliti" hidden><i class="fas fa-trash"></i></a>
                                        <a href="#" class="btn_utiliti" onclick="finishMateri()" hidden><i class="fas fa-check"></i></a>
                                    </div>
                                    <div class="card-body" id="materi" style="max-height: 400px;overflow-y: scroll;">
                                        <div class="alert alert-info"><center><b>Pilih Materi di Samping untuk Memulai Pembelajaran</b></center></div>
                                    </div>
                                    <div class="card-footer"><center></center></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Add Modal materi -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-chalkboard-teacher"></i>  Tambah Materi Pembelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url('index.php/') ?>materi/tambah">
                    <input type="text" name="i_id" value="<?php echo $this->uri->segment(3) ?>" hidden>
                    <div class="form-group">
                        <input type="text" id="myInput" name="i_bab" class="form-control form-control-sm" placeholder="Masukkan Judul Bab" required>
                    </div>
                    <div class="form-group">
                        <textarea name="i_materi" id="i_materi" class="form-control">
                            Tulis Materi disini.
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="i_semester" value="Ganjil" required> Ganjil
                        <input type="radio" name="i_semester" value="Genap"> Genap
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

        <!-- Edit Modal materi -->
        <div class="modal fade" id="editMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-chalkboard-teacher"></i>  Edit Materi Pembelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo base_url('index.php/') ?>materi/update">
                    <input type="text" name="i_kdmateri" value="<?php echo $this->uri->segment(3) ?>" hidden>
                    <input type="text" name="i_id" id="i_id" value="" hidden>
                    <div class="form-group">
                        <input type="text" id="i_bab" name="i_bab" class="form-control form-control-sm" placeholder="Masukkan Judul Bab" required>
                    </div>
                    <div class="form-group">
                        <textarea name="i_materi" id="i_editmateri" class="form-control">
                            Tulis Materi disini.
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="i_semesterr" id="i_semesterr" value="Ganjil" required> Ganjil
                        <input type="radio" name="i_semesterr" id="i_semesterr" value="Genap"> Genap
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script type="text/javascript">
            $('#myModal').on('shown.bs.modal', function () {
              $('#myInput').trigger('focus')
            })
            CKEDITOR.replace( 'i_materi', {
                filebrowserUploadUrl: '<?php echo base_url('index.php/') ?>materi/upimage',
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace( 'i_editmateri', {
                filebrowserUploadUrl: '<?php echo base_url('index.php/') ?>materi/upimage',
                filebrowserUploadMethod: 'form'
            });
            
            <?php if (null !==($this->session->flashdata('message'))) { 
                if ($this->session->flashdata('status')==1) {
            ?>
                toastr.success("<?php echo $this->session->flashdata('message'); ?>");
            <?php }else{ ?>
                toastr.error("<?php echo $this->session->flashdata('message'); ?>");
            <?php }} ?>
        </script>
        <script type="text/javascript">
            var idMateri = '';
            function getName(clicked) {
                var listMateri = document.getElementById(clicked);
                var otherBtn = document.getElementsByName('materi');
                var mapel = document.getElementsByClassName('mapel');
                for (var i = 0; i < otherBtn.length; i++) {
                    var ID = otherBtn[i].getAttribute("id");
                    var listMateria = document.getElementById(ID);
                    if (ID==clicked) {
                        listMateria.classList.add("active");
                    }else{
                        listMateria.classList.remove("active");
                    }

                }
                $.ajax({
                    url : '<?php echo base_url() ?>index.php/materi/get_detail/'+clicked,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR){
                        var json = data;
                        obj = JSON.parse(json);
                        $("#materi").html(obj.materi);
                        idMateri=obj.id_materi;
                        $('.btn_utiliti').removeAttr('hidden');
                    },
                        error: function(jqXHR, textStatus, errorThrown){
                 }
                })
            }
            function deleteMateri() {
                if (idMateri=='') {
                    toastr.error("Silakan Pilih Materi yang Akan Dihapus Terlebih Dahulu");
                }else{
                    $.ajax({
                        url : '<?php echo base_url() ?>index.php/materi/delete/'+idMateri,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data, textStatus, jqXHR){
                            var json = data;
                            obj = JSON.parse(json);
                            location.reload();
                        },
                            error: function(jqXHR, textStatus, errorThrown){
                     }
                    })                    
                }
            }
            function editMateri() {
                if (idMateri=='') {
                    toastr.error("Silakan Pilih Materi yang Akan Diperbaiki Terlebih Dahulu");
                }else{
                    $.ajax({
                        url : '<?php echo base_url() ?>index.php/materi/get_detail/'+idMateri,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data, textStatus, jqXHR){
                            var json = data;
                            obj = JSON.parse(json);
                            $("#i_id").val(obj.id_materi);
                            $("#i_bab").val(obj.judul_bab);
                            CKEDITOR.instances.i_editmateri.setData(obj.materi);
                            if (obj.semester=='Ganjil') {
                                $(':radio[name=i_semesterr][value="Ganjil"]').prop('checked', true);
                            }else{
                                $(':radio[name=i_semesterr][value="Genap"]').prop('checked', true);
                            }
                        },
                            error: function(jqXHR, textStatus, errorThrown){
                     }
                    })                    
                }
            }

            function finishMateri() {
                if (idMateri=='') {
                    toastr.error("Silakan Pilih Materi yang Telah Diselesaikan Pembelajarannya");
                }else{
                    $.ajax({
                        url : '<?php echo base_url() ?>index.php/materi/finish/'+idMateri,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data, textStatus, jqXHR){
                            var json = data;
                            obj = JSON.parse(json);
                            location.reload();
                        },
                            error: function(jqXHR, textStatus, errorThrown){
                     }
                    })                    
                }
            }

            $('#toggle_fullscreen').on('click', function(){
              if (
                document.fullscreenElement ||
                document.webkitFullscreenElement ||
                document.mozFullScreenElement ||
                document.msFullscreenElement
              ) {
                if (document.exitFullscreen) {
                  document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                  document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                  document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                  document.msExitFullscreen();
                }
              } else {
                element = $('#card').get(0);
                if (element.requestFullscreen) {
                  element.requestFullscreen();
                  $('#materi').removeAttr('style');
                } else if (element.mozRequestFullScreen) {
                  element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) {
                  element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                } else if (element.msRequestFullscreen) {
                  element.msRequestFullscreen();
                }
              }
            });
        </script>
    </body>
</html>