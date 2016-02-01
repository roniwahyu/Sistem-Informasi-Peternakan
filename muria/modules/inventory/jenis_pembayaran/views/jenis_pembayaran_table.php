
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="fa fa-database"></i> Data Jenis Pembayaran</a></li>
            <li class="baru"><a href="#outside" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Jenis Pembayaran Baru</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="fa fa-table"></i> Data Jenis Pembayaran</h6> 
                               
                            </div>
                            <div class="panel-body">
                                 <div class="btn-group pull-right">
                                    <a href="#outside" data-toggle="tab" class="baru btn btn-success"><i class="fa fa-plus"></i> Tambah Jenis Pembayaran Baru</a>
                                </div> 
                            <?php $this->load->view('jenis_pembayaran_data') ?>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('jenis_pembayaran_form') ?>

            </div>
    </div>
