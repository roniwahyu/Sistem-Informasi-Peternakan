<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('formulasi_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka formulasi_detail Baru </a>
                            <a href="<?php echo base_url('formulasi_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data formulasi_detail</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data formulasi_detail</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>id_formulasi</th>
                                                        <th>id_barang</th>
                                                        <th>jumlah</th>
                                                        <th>id_satuan</th>
                                                        <th>prosentase</th>
                                                        <th>jml_form_jadi</th>
                                                        <th>jml_fakta_jadi</th>
                                                        <th>satuan_jadi</th>
                                                        <th>keterangan</th>
                                                        <th>user_id</th>
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