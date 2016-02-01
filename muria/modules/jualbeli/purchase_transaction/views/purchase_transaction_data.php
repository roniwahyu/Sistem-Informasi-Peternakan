<div class="datatable-ajax-source">
     <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('purchase_transaction/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Transaksi Baru </a>
                            <a href="<?php echo base_url('purchase_transaction') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Transaksi</a>
                            <a href="<?php echo base_url('purchase_order/baru') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Order Pembelian</a>
                        </div>
     <h2 class="text-center" style="margin:20px 0px 30px">Data Transaksi Pembelian</h2>
        

                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="font-size:12px">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>#Faktur</th>
                                                        <th>Tanggal</th>
                                                        <th>Pembelian</th>
                                                        <th>Supplier</th>
                                                        <th>Jatuh Tempo</th>
                                                        <th>Total</th>
                                                        <th>PPN</th>
                                                        <th>Grand Total</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="19" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>