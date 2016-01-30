<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('jenis_recording/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka jenis_recording Baru </a>
                            <a href="<?php echo base_url('jenis_recording') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data jenis_recording</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data jenis_recording</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>nama</th>
                                                        <th>akun_rekening</th>
                                                        <th>keterangan</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>