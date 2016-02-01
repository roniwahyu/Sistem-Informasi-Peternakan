<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('assembly_pakan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Campur Stok Baru </a>
                            <a href="<?php echo base_url('assembly_pakan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Campur Stok</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Campur Stok</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>id_gudang</th>
                                                        <th>id_recording</th>
                                                        <th>id_formulasi</th>
                                                        <th>akun_perkiraan</th>
                                                        <th>total</th>
                                                        <th>is_trx</th>
                                                        <th>is_void</th>
                                                        <th>is_jrnl</th>
                                                        <th>is_post</th>
                                                        <th>date_posted</th>
                                                        <th>id_user</th>
                                                        <th>datetime</th>
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