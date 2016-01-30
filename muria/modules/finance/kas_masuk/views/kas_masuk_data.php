<div class="datatable-ajax-source">
<div class="btn-group" style="margin:20px 0px 30px">
    <a href="<?php echo base_url('kas_keluar') ?>" class="btn btn-lg btn-info"><i class="fa fa-outbox"></i> Kas Keluar </a>
    <a href="<?php echo base_url('kas_masuk') ?>" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Data Kas Masuk</a>
    <a href="<?php echo base_url('kas_masuk/baru') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Tambah Kas Masuk</a>
</div>
        <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Kas Masuk</h2>
 
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur Kas</th>
                                                        <th>Tanggal</th>
                                                        <th>Akun Kas</th>
                                                        <th>Konsumen</th>
                                                        <th>Referensi</th>
                                                        <th>Keterangan</th>
                                                        <th>Nominal</th>
                                                        
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