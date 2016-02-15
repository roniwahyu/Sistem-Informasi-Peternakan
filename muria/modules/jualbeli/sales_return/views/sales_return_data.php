<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('sales_return/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka sales_return Baru </a>
                            <a href="<?php echo base_url('sales_return') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data sales_return</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data sales_return</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur_sr</th>
                                                        <th>id_st</th>
                                                        <th>tgl_sr</th>
                                                        <th>tipe_retur</th>
                                                        <th>id_customer</th>
                                                        <th>akun_piutang</th>
                                                        <th>totalretur</th>
                                                        <th>bayar</th>
                                                        <th>biayakirim</th>
                                                        <th>grandtotal</th>
                                                        <th>keterangan</th>
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
                                            <td colspan="19" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>