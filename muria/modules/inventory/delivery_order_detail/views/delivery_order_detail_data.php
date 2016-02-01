<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('delivery_order_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka delivery_order_detail Baru </a>
                            <a href="<?php echo base_url('delivery_order_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data delivery_order_detail</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data delivery_order_detail</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>faktur_reff</th>
                                                        <th>faktur_po</th>
                                                        <th>id_barang</th>
                                                        <th>id_satuan</th>
                                                        <th>jumlah</th>
                                                        <th>jumlah_retur</th>
                                                        <th>id_mitra</th>
                                                        <th>id_gudang</th>
                                                        <th>id_kandang</th>
                                                        <th>keterangan</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="14" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>