<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('receive_item/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Penerimaan Barang Baru </a>
                            <a href="<?php echo base_url('receive_item') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Penerimaan Barang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Penerimaan Barang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>faktur_reff</th>
                                                        <th>faktur_do</th>
                                                        <th>id_supplier</th>
                                                        <th>tanggal</th>
                                                        <th>tanggal_terima</th>
                                                        <th>kirim_via</th>
                                                    
                                                     
                                                       
                                                        <th>id_mitra</th>
                                                        <th>id_kandang</th>
                                                        <th>id_gudang</th>
                                                        <th>nopol_pengirim</th>
                                                        <th>nama_pengirim</th>
                                                
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="15" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>