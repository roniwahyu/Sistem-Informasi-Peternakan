<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('barang/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka barang Baru </a>
                            <a href="<?php echo base_url('barang') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data barang</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data barang</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Cabang</th>
                                                        <th>Barcode</th>
                                                        <th>Nama</th>
                                                        <th>Keterangan</th>
                                                        <th>id_golongan</th>
                                                        <th>Kemasan</th>
                                                        <th>Isi2</th>
                                                        <th>Isi3</th>
                                                        <th>StKon</th>
                                                        <th>id_supplier</th>
                                                        <th>User</th>
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