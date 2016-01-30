<div class="datatable-ajax-source text-center">
        <div class="btn-group " style="margin:20px 0px 30px">
                            <a href="<?php echo base_url('recording_ayam/baru/isi') ?>" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Isi Kandang </a>
                            <a href="<?php echo base_url('recording_ayam/baru/kosong') ?>" class="btn btn-md btn-info"><i class="fa fa-plus"></i> Pengosongan Kandang</a>
                            <a href="<?php echo base_url('recording_ayam/baru/tambah') ?>" class="btn btn-md btn-success"><i class="fa fa-plus"></i> Penambahan Ayam </a>
                            <a href="<?php echo base_url('recording_ayam/baru/afkir') ?>" class="btn btn-md btn-warning"><i class="fa fa-plus"></i> Ayam Afkir</a>
                            <a href="<?php echo base_url('recording_ayam/baru/mati') ?>" class="btn btn-md btn-danger"><i class="fa fa-plus"></i> Ayam Mati </a>
                            <a href="<?php echo base_url('recording_ayam') ?>" class="btn btn-md btn-info"><i class="fa fa-database"></i> Data Recording Ayam</a>
                        </div>
        <h2 class="text-center" style="margin:20px 0px 30px" >Tabel Data Recording Ayam</h2>
    
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