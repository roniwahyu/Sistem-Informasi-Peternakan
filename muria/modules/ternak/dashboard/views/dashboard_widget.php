
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
           
                <!-- <div class="widget red-bg p-lg text-center">
                        <div class="m-b-md">
                            <img src="<?php //echo assets_url() ?>/images/EggsFilled-64.png">
                            <h1 class="m-xs">47</h1>
                            <h3 class="font-bold no-margins">
                                Notification
                            </h3>
                            <small>We detect the error.</small>
                        </div>
                    </div> -->
            <a class="" href="#modal-id" data-toggle="modal" data-load="<?php echo domain() ?>farm/recording_telur/getdatatables" data-table="<?php echo domain() ?>farm/recording_telur/tables" data-remote-target="#modal-id .modal-body">
                
                <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 text-center">
                            <!-- <i class="fa fa-cubes fa-5x"></i> -->
                            <img src="<?php echo assets_url() ?>/images/EggsFilled-64.png">
                            </div>
                            <div class="col-xs-12 col-sm-12 text-center">
                                <span>Eggs</span>
                                <h3 class="font-bold">Recording Telur</h3>
                            </div>
                            <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 text-center">
                                
                            <h4 class="m-xs">Bakalan</h4>
                            <h1 class="m-xs">47</h1>
                            </div> 
                            <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 text-center">
                                
                            <h4 class="m-xs">Renteng</h4>
                            <h1 class="m-xs">47</h1>
                            </div>
                            <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4 text-center">
                                
                            <h4 class="m-xs">Wagir</h4>
                            <h1 class="m-xs">47</h1>
                            </div>
                           
                        </div>
                </div>
            </a>
             <h3 class="text-center">Hasil Produksi Telur</h3>
            <div id="morris-line-chart" style="height:200px"></div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Aktivitas Rekaman Terbaru
                    <a href="<?php echo base_url('recording_telur') ?>" class="pull-right btn btn-xs btn-info">Semua</a>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('recording_telur/aktivitas_recording') ?>
                </div>
            </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                
            <a class="" href="#modal-id" data-toggle="modal" data-load="<?php echo domain() ?>farm/recording_ayam/getdatatables" data-table="<?php echo domain() ?>farm/recording_ayam/tables" data-remote-target="#modal-id .modal-body">
           
                <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                            <!-- <i class="fa fa-cubes fa-5x"></i> -->
                            <img src="<?php echo assets_url() ?>/images/Chicken-64.png">
                            </div>
                            <div class="col-xs-12 text-center">
                                <span>Pullet/Layer</span>
                                <h3 class="font-bold">Recording Ayam</h3>
                            </div>
                        </div>
                </div>
            </a>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Aktivitas Rekaman Terbaru
                    <a href="<?php echo base_url('recording_ayam') ?>" class="pull-right btn btn-xs btn-warning">Semua</a>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('recording_ayam/aktivitas_recording') ?>
                </div>
            </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            	
            <a class="" href="#modal-id" data-toggle="modal" data-load="<?php echo domain() ?>farm/recording_pakan/getdatatables" data-table="<?php echo domain() ?>farm/recording_pakan/tables" data-remote-target="#modal-id .modal-body">
           
                <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                            <!-- <i class="fa fa-cubes fa-5x"></i> -->
                            <img src="<?php echo assets_url() ?>/images/Barley-64.png">
                            </div>
                            <div class="col-xs-12 text-center">
                                <span>Feeds</span>
                                <h3 class="font-bold">Recording Pakan</h3>
                            </div>
                        </div>
                </div>
            </a>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Aktivitas Rekaman Terbaru
                    <a href="<?php echo base_url('recording_pakan') ?>" class="pull-right btn btn-xs btn-info">Semua</a>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('recording_pakan/aktivitas_recording') ?>
                </div>
            </div>
    </div>