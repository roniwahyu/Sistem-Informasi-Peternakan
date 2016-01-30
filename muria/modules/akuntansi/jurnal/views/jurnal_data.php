<div class="datatable-ajax-source">
<div class="btn-group" style="margin:20px 0px 30px">
  <a href="<?php echo base_url('jurnal/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/K') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Jurnal Baru</a>
</div>
        <h2 class="text-center" style="margin:20px 0px 30px">Tabel Data jurnal</h2>
   
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>No. Jurnal</th>
                                                        <th>No. Buktu</th>
                                                        <th>akun_jurnal</th>
                                                        <th>Tanggal</th>
                                                        <th>Keterangan</th>
                                                        <th>Debet</th>
                                                        <th>Kredit</th>
                                                        <th>Status</th>
                                                 
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