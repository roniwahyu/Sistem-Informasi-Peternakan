<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('penyesuaian/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka penyesuaian Baru </a>
                            <a href="<?php echo base_url('penyesuaian') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data penyesuaian</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data penyesuaian</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>faktur_reff</th>
                                                        <th>tanggal</th>
                                                        <th>id_gudang</th>
                                                        <th>keterangan</th>
                                                        <th>akun</th>
                                                        <th>total_nilai</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="10" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>