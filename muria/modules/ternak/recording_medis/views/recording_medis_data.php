<div class="datatable-ajax-source">
        <div class="btn-group" style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('recording_medis/baru/obat') ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Buka Recording Obat </a>
                            <a href="<?php echo base_url('recording_medis/baru/vaksin') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Buka Recording Vaksin </a>
                            <a href="<?php echo base_url('recording_medis') ?>" class="btn btn-lg btn-info"><i class="fa fa-database"></i> Data Recording Medis</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Recording Medis</h2>
    
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>kandang</th>
                                                        <th>gudang</th>
                                                        <th>mitra</th>
                                                        <th>recording</th>
                                                        
                                                        <th>total</th>
                                                       
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