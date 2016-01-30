
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar Bank</a></li>
            <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah Bank Baru</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Daftar Bank</h6> 
                               
                            </div>
                            <div class="panel-body">
                                 <div class="btn-group" style="margin:20px 0px 30px">
    <!-- <a data-remote-target="#modal-po .modal-body" data-load-remote="<?php echo base_url('purchase_order/baru') ?>" href="#modal-po" data-toggle="modal" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tambah Order Pembelian</a> -->
    <a href="<?php echo base_url('bank/masuk') ?>" class="btn btn-lg btn-info"><i class="fa fa-inbox"></i> Bank Masuk </a>
    <a href="<?php echo base_url('bank/keluar') ?>" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Data Bank Keluar</a>
    <a href="<?php echo base_url('bank/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/K') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Transaksi Bank Keluar</a>
    <a href="<?php echo base_url('bank/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/D') ?>" class="btn btn-lg btn-info"><i class="fa fa-plus"></i> Transaksi Bank Masuk</a>
</div>
                            <?php $this->load->view('bank_data') ?>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('bank_form') ?>

            </div>
    </div>
