<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('formulasi/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka formulasi Baru </a>
                            <a href="<?php echo base_url('formulasi') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data formulasi</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data formulasi</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>tanggal</th>
                                                        <th>nama</th>
                                                        <th>keterangan</th>
                                                        <th>id_mitra</th>
                                                        <th>id_kandang</th>
                                                        <th>id_gudang</th>
                                                        <th>id_layer</th>
                                                        <th>id_strain</th>
                                                        <th>id_grade</th>
                                                        <th>jml_hasil_prediksi</th>
                                                        <th>jml_hasil_jadi</th>
                                                        <th>satuan_jadi</th>
                                                        <th>umur</th>
                                                        <th>user_id</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="16" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>