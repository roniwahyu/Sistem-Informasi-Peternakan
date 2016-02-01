
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="baru active"><a href="#outside" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Transaksi Pembelian Baru</a></li>
            <li class="daftar "><a href="#inside" data-toggle="tab"><i class="fa fa-database"></i> Data Transaksi Pembelian</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane fade " id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="fa fa-database"></i> Data Transaksi Pembelian</h6> 
                               
                            </div>
                            <div class="panel-body">
                                 <div class="btn-group pull-right">
                                    <a href="<?php echo base_url('purchase_transaction') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Transaksi Pembelian Baru</a>
                                </div> 
                            <?php $this->load->view('purchase_transaction_data') ?>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('purchase_transaction_form') ?>

            </div>
    </div>
