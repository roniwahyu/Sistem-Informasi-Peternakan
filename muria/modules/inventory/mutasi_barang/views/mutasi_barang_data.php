<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('mutasi_barang/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka mutasi_barang Baru </a>
                            <a href="<?php echo base_url('mutasi_barang') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data mutasi_barang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data mutasi_barang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>faktur_reff</th>
                                                        <th>tanggal</th>
                                                        <th>id_asal</th>
                                                        <th>id_tujuan</th>
                                                        <th>keterangan</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="9" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>