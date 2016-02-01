<div class="datatable-ajax-source">
        <hr>
         <div class="btn-group" style="margin-bottom:20px;">
                            <a href="<?php echo base_url('purchase_return/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Retur Baru</a>
                            <a href="<?php echo base_url('purchase_return') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Retur</a>
                            <a href="<?php echo base_url('purchase_transaction') ?>" class="btn btn-lg btn-primary"><i class="fa fa-inbox" ></i> Transaksi Pembelian</a>
                        </div>
        <h2 class="text-center">Tabel Data Retur Pembelian</h2>

                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>#Faktur Retur</th>
                                                        <th>Tanggal</th>
                                                        <th>Tipe Retur</th>
                                                   
                                                        <th>Supplier</th>
                                                        <th>Total</th>
                                                        <th>Bayar</th>
                                                        <th>Grand Total</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>