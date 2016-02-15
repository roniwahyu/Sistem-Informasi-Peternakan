<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('armada/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka armada Baru </a>
                            <a href="<?php echo base_url('armada') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data armada</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data armada</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>kendaraan_id</th>
                                                        <th>supir_id</th>
                                                        <th>supplier_id</th>
                                                        <th>customer_id</th>
                                                        <th>rute_id</th>
                                                        <th>wilayah_id</th>
                                                        <th>mitra_id</th>
                                                        <th>gudang_id</th>
                                                        <th>kandang_id</th>
                                                        <th>userid</th>
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