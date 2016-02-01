<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('supplier/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka supplier Baru </a>
                            <a href="<?php echo base_url('supplier') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data supplier</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data supplier</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>Kota</th>
                                                        <th>Telepon</th>
                                                        <th>Fax</th>
                                                        <th>Contact</th>
                                                        <th>JthTempo</th>
                                                        <th>Diskon</th>
                                                        <th>NPWP</th>
                                                        <th>Hutang</th>
                                                        <th>Bayar</th>
                                                        <th>Sisa</th>
                                                        <th>Bank</th>
                                                        <th>Rekening</th>
                                                        <th>AnRekening</th>
                                                        <th>Potongan</th>
                                                        <th>User</th>
                                                        <th>Time</th>
                                                        <th>NoAcc</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="21" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>