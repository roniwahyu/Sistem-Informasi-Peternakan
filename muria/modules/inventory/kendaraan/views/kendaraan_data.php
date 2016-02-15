<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('kendaraan/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka kendaraan Baru </a>
                            <a href="<?php echo base_url('kendaraan') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data kendaraan</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data kendaraan</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>nopol</th>
                                                        <th>nama</th>
                                                        <th>kode</th>
                                                        <th>akun_biaya</th>
                                                        <th>akun_aktiva</th>
                                                        <th>akun_penyusutan</th>
                                                        <th>daya_angkut</th>
                                                        <th>id_wilayah</th>
                                                        <th>jenis</th>
                                                        <th>kir_awal</th>
                                                        <th>kir_akhir</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="14" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>