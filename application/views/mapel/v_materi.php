<?php  ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="fas fa-chart-area"></i> <?php echo $judul ?></h1>
                        <hr>
                        <div class="row">
                            <?php foreach ($mapel->result() as $dataMateri): ?>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <i class="fa fa-chalkboard-teacher fa-3x"></i>
                                                </div>
                                                <div class="col-md-9 text-right">
                                                    <h4><?php echo $dataMateri->nama_mapel ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="<?php echo base_url('index.php/') ?>materi/detail/<?php echo enkrip($dataMateri->id_mapel) ?>">Lihat Materi</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </main>