<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('campur/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka campur Baru </a>
                            <a href="<?php echo base_url('campur') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data campur</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data campur</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Tgl</th>
                                                        <th>Gudang</th>
                                                        <th>Kode</th>
                                                        <th>Qty</th>
                                                        <th>Satuan</th>
                                                        <th>StCampur</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
                                                        <th>User</th>
                                                        <th>Time</th>
                                                        <th>NmBarang</th>
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