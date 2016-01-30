<div class="datatable-ajax-source">
<div class="btn-group" style="margin:20px 0px 30px">
    <!-- <a data-remote-target="#modal-po .modal-body" data-load-remote="<?php echo base_url('purchase_order/baru') ?>" href="#modal-po" data-toggle="modal" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tambah Order Pembelian</a> -->
    <a href="<?php echo base_url('bank/masuk') ?>" class="btn btn-lg btn-info"><i class="fa fa-inbox"></i> Bank Masuk </a>
    <a href="<?php echo base_url('bank_giro/keluar') ?>" class="btn btn-lg btn-success"><i class="fa fa-reply"></i> Bank Giro Keluar</a>
    <a href="<?php echo base_url('bank/keluar') ?>" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Data Bank Keluar</a>
    <a href="<?php echo base_url('bank/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/K') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Transaksi Bank Keluar Baru</a>
</div>
        <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Bank Masuk</h2>
 
                                <table id="data" class="table_bank table table-bordered table-condensed table-striped" style="">
                                    <thead class="">

                                        <tr>
                                                       
                                                        <th>Bukti</th>
                                                    
                                                        <th>Akun</th>
                                                        <th>Bank</th>
                                                        <th>Supplier</th>
                                                        <th>Tanggal</th>
                                                        
                                                        <th>Total</th>
                                                   
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                            