<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('delivery_order/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka delivery_order Baru </a>
                            <a href="<?php echo base_url('delivery_order') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data delivery_order</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data delivery_order</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>faktur_reff</th>
                                                        <th>faktur_po</th>
                                                        <th>id_customer</th>
                                                        <th>tanggal</th>
                                                        <th>tanggal_kirim</th>
                                                        <th>kirim_via</th>
                                                        <th>keterangan</th>
                                                        <th>alamat_kirim</th>
                                                        <th>alamat_tagihan</th>
                                                        <th>biaya_id</th>
                                                        <th>biaya_kirim</th>
                                                        <th>armada_id</th>
                                                        <th>is_approved</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="17" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>