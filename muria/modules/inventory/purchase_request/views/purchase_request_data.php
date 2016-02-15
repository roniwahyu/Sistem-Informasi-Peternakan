<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('purchase_request/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Permintaan Barang Baru </a>
                            <a href="<?php echo base_url('purchase_request') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Permintaan Barang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Permintaan Barang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>tanggal_tempo</th>
                                                        <th>id_mitra</th>
                                                        <th>id_gudang</th>
                                                        <th>id_kandang</th>
                                                        <th>keterangan</th>
                                                        <th>catatan</th>
                                                        <th>user_id</th>
                                                        <th>is_approved</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="12" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>