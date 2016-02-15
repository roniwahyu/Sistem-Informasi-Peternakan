<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('sales/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka sales Baru </a>
                            <a href="<?php echo base_url('sales') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data sales</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data sales</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>nama</th>
                                                        <th>id_karyawan</th>
                                                        <th>userid</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="5" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>