<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('kandang/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka kandang Baru </a>
                            <a href="<?php echo base_url('kandang') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data kandang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data kandang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Keterangan</th>
                                                        <th>Gudang</th>
                                                        <th>NmGudang</th>
                                                        <th>Mitra</th>
                                                        <th>NmMitra</th>
                                                        <th>StKandang</th>
                                                        <th>Faktur</th>
                                                        <th>Barang</th>
                                                        <th>Tgl</th>
                                                        <th>Qty</th>
                                                        <th>Satuan</th>
                                                        <th>Umur</th>
                                                        <th>Status</th>
                                                        <th>User</th>
                                                        <th>Time</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="17" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>