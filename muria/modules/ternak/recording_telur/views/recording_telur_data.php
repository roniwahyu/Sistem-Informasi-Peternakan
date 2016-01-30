<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('recording_telur/baru/kumpul') ?>" class="btn btn-md btn-success"><i class="fa fa-plus"></i> Pengumpulan Telur </a>
                            <a href="<?php echo base_url('recording_telur/baru/pilah') ?>" class="btn btn-md btn-info"><i class="fa fa-plus"></i> Pemilahan Telur </a>
                            <a href="<?php echo base_url('recording_telur/baru/pakai') ?>" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Pemakaian Telur </a>
                            <a href="<?php echo base_url('recording_telur/baru/pecah') ?>" class="btn btn-md btn-warning disabled"><i class="fa fa-plus"></i> Telur Pecah/Rusak </a>
                            <a href="<?php echo base_url('recording_telur/baru/afkir') ?>" class="btn btn-md btn-success disabled"><i class="fa fa-plus"></i> Telur Afkir </a>
                            <a href="<?php echo base_url('recording_telur') ?>" class="btn btn-md btn-info"><i class="fa fa-database"></i> Data Recording Telur</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Recording Telur</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                         <th>Faktur</th>
                                                        <th>Tanggal</th>
                                                        <th>Kandang</th>
                                                        <th>Gudang</th>
                                                        <th>Mitra</th>
                                                        <th>Rekaman</th>
                                                        
                                                        <th>Total</th>
                                                       
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