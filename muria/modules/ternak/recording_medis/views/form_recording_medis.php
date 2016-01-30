 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'recording_medis/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <?php echo form_input('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control hidden" readonly  placeholder="id"'); ?>
                                <?php echo form_input('id_recording',set_value('id_recording', isset($default['id_recording']) ? $default['id_recording'] : ''),'id="id_recording" class="form-control hidden" readonly placeholder="id_recording"'); ?>
                                <?php echo form_input('tipe_stok',set_value('tipe_stok', isset($default['tipe_stok']) ? $default['tipe_stok'] : ''),'id="tipe_stok" class="form-control hidden" readonly placeholder="tipe_stok"'); ?>
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" readonly placeholder="faktur"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal Recording: ','tanggal',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tanggal'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" class="input-md form-control" name="tanggal" required />
                                        <?php else: ?>
                                        <input id="tanggal" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tanggal" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Akun Perkiraan : ','akun_perkiraan',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('akun_perkiraan',set_value('akun_perkiraan', isset($default['akun_perkiraan']) ? $default['akun_perkiraan'] : ''),'id="akun_perkiraan" class="form-control" placeholder="akun_perkiraan"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                 <div class="input-group">
<span class="input-group-btn">
                                            <a href="#" class="add_mitra btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                <div class="controls">
                                <?php $mitra = isset($default['id_mitra'])? $default['id_mitra'] : '1';  ?>
                                <?php echo form_dropdown('id_mitra',$opt_mitra,$mitra,'id="id_mitra" class="form-control" placeholder="Enter id_mitra"'); ?>
                                                                </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('Kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                 <div class="input-group">
<span class="input-group-btn">
                                            <a href="#" class="add_kandang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                <div class="controls">
                                <?php $kandang = isset($default['id_kandang'])? $default['id_kandang'] : '1';  ?>
                                <?php echo form_dropdown('id_kandang',$opt_kandang,$kandang,'id="id_kandang" class="form-control" placeholder="Enter id_kandang"'); ?>
                                                                </div>
                                    </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                   <span class="input-group-btn">
                                            <a href="#" class="add_gudang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span> 
                                   
                                <div class="controls">
                                <?php $gudang = isset($default['id_gudang'])? $default['id_gudang'] : '1';  ?>
                                <?php echo form_dropdown('id_gudang',$opt_gudang,$gudang,'id="id_gudang" class="form-control" placeholder="Enter id_gudang"'); ?>
                                
                                </div> 
                                </div>
                            </div>
                        
                           
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <div class="controls">
                                <?php echo form_checkbox('is_jrnl',set_checkbox('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" style="margin-left:20px" class="form-control"'); ?>
                                <?php echo form_label('Jurnal','is_jrnl',array('class'=>'control-label','style'=>'margin:10px')); ?>
                                <br>
                              
                                <?php echo form_checkbox('is_trx',set_checkbox('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" style="margin-left:20px" class="form-control"'); ?>
                                <?php echo form_label('Transaksi','is_trx',array('class'=>'control-label','style'=>'margin:10px')); ?>
                                </div>
                            </div>
                             
                            
                        
                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                        
                            <div class="panel_tambah panel panel-danger">
                                    <div class="panel-body panel-heading">
                                        <div class="tambah row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Obat/Vaksin: ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_barang',$opt_medis,'','id="id_barang" class="form-control select2" placeholder="Obat/Vaksin"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah: ','jumlah_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah_satuan',set_value('jumlah_satuan', isset($default['jumlah_satuan']) ? $default['jumlah_satuan'] : ''),'id="jumlah_satuan" class="form-control" placeholder="Jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control" placeholder="id_satuan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Umur (Hari): ','umur',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('umur',set_value('umur', isset($default['umur']) ? $default['umur'] : ''),'id="umur" class="form-control" placeholder="Umur Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add btn btn-block btn-info"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table id="data" class="table-detail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Obat/Vaksin</th>
                                                        <th>Umur</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                   
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>      
                        </div>  
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('total : ','total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total',set_value('total', isset($default['total']) ? $default['total'] : ''),'id="total" class="form-control hidden" readonly  placeholder="Rp"'); ?>
                                <?php echo form_input('totalx',set_value('totalx', isset($default['totalx']) ? $default['totalx'] : ''),'id="totalx" class="form-control text-right " readonly style="font-size:20px;" placeholder="Rp"'); ?>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php if($this->session->userdata('new')==true && $this->session->userdata('edit')==false ): ?>
                                <button data-toggle="modal" href="#modal-notif" id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                <a href="#" id="cancel" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal Tambah</a>
                            <?php elseif($this->session->userdata('new')==false && $this->session->userdata('edit')==true): ?>
                                <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                            <?php endif; ?>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 