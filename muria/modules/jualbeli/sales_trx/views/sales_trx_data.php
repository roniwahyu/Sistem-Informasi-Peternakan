<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('sales_trx/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka sales_trx Baru </a>
                            <a href="<?php echo base_url('sales_trx') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data sales_trx</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data sales_trx</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tgl</th>
                                                        <th>id_so</th>
                                                        <th>termin</th>
                                                        <th>id_customer</th>
                                                        <th>id_sales</th>
                                                        <th>akun_piutang</th>
                                                        <th>keterangan</th>
                                                        <th>ref</th>
                                                        <th>id_shipping</th>
                                                        <th>id_bayar</th>
                                                        <th>totalbayar</th>
                                                        <th>uangmuka</th>
                                                        <th>biayakirim</th>
                                                        <th>ppn</th>
                                                        <th>grandtotal</th>
                                                        <th>status</th>
                                                        <th>is_trx</th>
                                                        <th>is_void</th>
                                                        <th>is_jrnl</th>
                                                        <th>is_post</th>
                                                        <th>date_posted</th>
                                                        <th>id_user</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="25" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>