<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('penyesuaian/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Penyesuaian Barang Baru </a>
                            <a href="<?php echo base_url('penyesuaian') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Penyesuaian Barang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Penyesuaian Barang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Faktur Referensi</th>
                                                        <th>Tanggal</th>
                                                        <th>Akun Rekening</th>
                                                        <th>Gudang</th>
                                                        <th>Keterangan</th>
                                                      
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>