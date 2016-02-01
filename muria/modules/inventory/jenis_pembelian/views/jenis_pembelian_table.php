
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="fa fa-database"></i> Data Jenis Pembelian</a></li>
            <li class="baru"><a href="#outside" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Jenis Pembelian Baru</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Data Jenis Pembelian</h6> 
                               
                            </div>
                            <div class="panel-body">
                            <?php $this->load->view('jenis_pembelian_data') ?>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('jenis_pembelian_form') ?>

            </div>
    </div>

