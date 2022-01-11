<?php  ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo "active";} ?>" href="<?= base_url('index.php/') ?>dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Pengaturan</div>
                            <!-- <a class="nav-link <?php if($this->uri->segment(1)=="lembaga"){echo "active";} ?>" href="<?= base_url('index.php/') ?>lembaga">
                                <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                                Lembaga
                            </a> -->
                            <a class="nav-link <?php if($this->uri->segment(1)=="mapel"){echo "active";} ?>" href="<?= base_url('index.php/') ?>mapel">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Mata Pelajaran
                            </a>
                            <div class="sb-sidenav-menu-heading">Perangkat</div>
                            <a class="nav-link <?php if($this->uri->segment(1)=="perangkatrpp"){echo "active";}else{echo "collapsed";} ?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                RPP
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if($this->uri->segment(1)=="perangkatrpp"){echo "show";} ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <?php foreach ($mapel->result() as $dataMapel): ?>
                                        <a class="nav-link <?php if(enkrip($dataMapel->id_mapel)==$this->uri->segment(3)){echo "active";} ?>" href="<?php echo base_url('index.php/') ?>perangkatrpp/detail/<?php echo enkrip($dataMapel->id_mapel) ?>"><?php echo $dataMapel->nama_mapel ?></a>
                                    <?php endforeach ?>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Pembelajaran</div>
                            <a class="nav-link <?php if($this->uri->segment(1)=="materi"){echo "active";} ?>" href="<?= base_url('index.php/') ?>materi">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Materi
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <?= $this->session->userdata('nama_guru'); ?>
                    </div>
                </nav>
            </div>