<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('sales_quote/baru') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka sales_quote Baru </a>
                            <a href="<?php echo base_url('sales_quote') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data sales_quote</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data sales_quote</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>kedaluarsa</th>
                                                        <th>id_customer</th>
                                                        <th>kepada</th>
                                                        <th>alamat</th>
                                                        <th>id_sales</th>
                                                        <th>keterangan</th>
                                                        <th>status</th>
                                                        <th>diskon1</th>
                                                        <th>diskon2</th>
                                                        <th>pajak1</th>
                                                        <th>pajak2</th>
                                                        <th>grandtotal</th>
                                                        <th>is_approved</th>
                                                        <th>datetime</th>
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