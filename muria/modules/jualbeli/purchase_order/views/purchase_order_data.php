<div class="datatable-ajax-source">
<div class="btn-group" style="margin:20px 0px 30px">
    <!-- <a data-remote-target="#modal-po .modal-body" data-load-remote="<?php echo base_url('purchase_order/baru') ?>" href="#modal-po" data-toggle="modal" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tambah Order Pembelian</a> -->
    <a href="<?php echo base_url('purchase_transaction') ?>" class="btn btn-lg btn-primary"><i class="fa fa-inbox"></i> Transaksi Pembelian</a>
    <a href="<?php echo base_url('purchase_order/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tambah Order Pembelian</a>
</div> 
        <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Order Pembelian</h2>
    <div class="modal fade" id="modal-po">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail Order Pembelian</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
                                <table id="datatables" class="tabelpo table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                       <th style="width:70px">#Faktur PO</th>
                                                        <th>Tanggal</th>
                                                        <!-- <th>Kode</th> -->
                                                        <th>Nama Supplier</th>
                                                        <!-- <th>Tanggal Kirim</th> -->
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Cara Bayar</th>
                                                        <th style="width:50px">Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>