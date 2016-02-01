<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('assembly_pakan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Campur Pakan Baru </a>
                            <a href="<?php echo base_url('assembly_pakan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Campur Pakan</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Campur Pakan</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                      
                                                        <th>Tanggal</th>
                                                        <th>Gudang</th>
                                                    
                                                        <th>Barang Jadi</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Total Jadi</th>
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