<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('sales_trx_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka sales_trx_detail Baru </a>
                            <a href="<?php echo base_url('sales_trx_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data sales_trx_detail</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data sales_trx_detail</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>id_st</th>
                                                        <th>id_barang</th>
                                                        <th>jumlah</th>
                                                        <th>id_satuan</th>
                                                        <th>harga_jual</th>
                                                        <th>diskon1</th>
                                                        <th>diskon2</th>
                                                        <th>diskon3</th>
                                                        <th>keterangan</th>
                                                        <th>id_user</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="13" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>