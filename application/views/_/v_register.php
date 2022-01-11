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
        <link href="<?= base_url('assets/')  ?>css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo base_url('index.php/') ?>login/doregis">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="i_nip" placeholder="Masukkan NIP atau NUPTK" />
                                                        <label for="inputFirstName">NIP/NUPTK</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="i_nama" placeholder="Masukkan nama lengkap anda" />
                                                        <label for="inputLastName">Nama Lengkap</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="i_alamat" placeholder="Alamat" />
                                                <label for="inputEmail">Alamat</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="i_pwd" onkeyup="cekKesamaan()" placeholder="Create a password" />
                                                        <label for="inputPassword">Kata Sandi</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" onkeyup="cekKesamaan()" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Konfirmasi Kata Sandi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="alert" class="alert alert-danger" hidden>Password Belum Sesuai atau Masih Kosong</div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" id="btn_regis" class="btn btn-primary btn-block" disabled>Daftar</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?php echo base_url('index.php/') ?>login">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/')  ?>js/scripts.js"></script>
        <script type="text/javascript">
        	function cekKesamaan() {
        		var pwd = $('#inputPassword').val();
        		var pwdconfirm = $('#inputPasswordConfirm').val();
        		if (pwd==pwdconfirm && pwd!="" && pwdconfirm!="") {
        			$('#alert').attr('hidden','hidden');
        			$('#btn_regis').removeAttr('disabled');
        		}else{
        			$('#alert').removeAttr('hidden');
        			$('#btn_regis').attr('disabled','disabled');
        		}
        	}
        </script>
    </body>
</html>
