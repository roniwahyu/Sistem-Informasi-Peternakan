<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('penyesuaian_detail/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka penyesuaian_detail Baru </a>
                            <a href="<?php echo base_url('penyesuaian_detail') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data penyesuaian_detail</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data penyesuaian_detail</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>id_barang</th>
                                                        <th>id_satuan</th>
                                                        <th>jumlah</th>
                                                        <th>jumlah_baru</th>
                                                        <th>id_mitra</th>
                                                        <th>id_kandang</th>
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