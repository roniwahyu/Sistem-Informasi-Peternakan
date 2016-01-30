<div class="datatable-ajax-source">
<div class="btn-group" style="margin:20px 0px 30px">
    <!-- <a data-remote-target="#modal-po .modal-body" data-load-remote="<?php echo base_url('purchase_order/baru') ?>" href="#modal-po" data-toggle="modal" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Tambah Order Pembelian</a> -->
    <a href="<?php echo base_url('kas_masuk') ?>" class="btn btn-lg btn-info"><i class="fa fa-inbox"></i> Kas Masuk </a>
    <a href="<?php echo base_url('kas_keluar') ?>" class="btn btn-lg btn-success"><i class="fa fa-database"></i> Data Kas Keluar</a>
    <a href="<?php echo base_url('kas_keluar/baru') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Tambah Kas Keluar</a>
</div>
        <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data Kas Keluar</h2>

                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur Kas</th>
                                                        <th>Tanggal</th>
                                                        <th>Akun Kas</th>
                                                        <th>Supplier</th>
                                                        <th>Referensi</th>
                                                        <th>Keterangan</th>
                                                        <th>Nominal</th>
                                                       
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="8" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>