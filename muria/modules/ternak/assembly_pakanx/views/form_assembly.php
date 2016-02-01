 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'assembly_pakan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                         
                            
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('akun_perkiraan : ','akun_perkiraan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_perkiraan',set_value('akun_perkiraan', isset($default['akun_perkiraan']) ? $default['akun_perkiraan'] : ''),'id="akun_perkiraan" class="form-control" placeholder="Masukkan akun_perkiraan"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('id_recording : ','id_recording',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_recording',set_value('id_recording', isset($default['id_recording']) ? $default['id_recording'] : ''),'id="id_recording" class="form-control" placeholder="Masukkan id_recording"'); ?>
                                </div>
                            </div>
                          
                          
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                               <div class="form-group">
                                <?php echo form_label('Formulasi: ','id_formulasi',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                   <span class="input-group-btn">
                                            <a href="#" class="add_gudang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span> 
                                   
                                <div class="controls">
                                <?php $formulasi = isset($default['id_formulasi'])? $default['id_formulasi'] : '1';  ?>
                                <?php echo form_dropdown('id_formulasi',$opt_formulasi,$formulasi,'id="id_formulasi" class="form-control select2" placeholder="Enter id_formulasi"'); ?>
                                
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
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <div class="controls">
                                <?php echo form_checkbox('is_jrnl',set_checkbox('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" style="margin-left:20px" class="form-control" placeholder="Masukkan is_jrnl"'); ?>
                                <?php echo form_label('Jurnal','is_jrnl',array('class'=>'control-label','style'=>'margin:10px')); ?>
                                <br>
                             
                                <?php echo form_checkbox('is_trx',set_checkbox('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" style="margin-left:20px" class="form-control" placeholder="Masukkan is_trx"'); ?>
                                <?php echo form_label('Transaksi','is_trx',array('class'=>'control-label','style'=>'margin:10px')); ?>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-success">
                                      <div class="panel-heading panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                
                                               <div class="form-group">
                                                    <?php echo form_label('Barang : ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('id_barang',set_value('id_barang', isset($default['id_barang']) ? $default['id_barang'] : ''),'id="id_barang" class="form-control input-lg" placeholder="Masukkan id_barang"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah : ','jumlah',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control input-lg" placeholder="Masukkan jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan : ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('id_satuan',set_value('id_satuan', isset($default['id_satuan']) ? $default['id_satuan'] : ''),'id="id_satuan" class="form-control input-lg" placeholder="Masukkan id_satuan"'); ?>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        
                                             <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add btn btn-lg btn-block btn-info"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                      </div>
                                  </div>      
                        
                        </div>  
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                      
                                                        <th>Faktur</th>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th>Sub Total</th>
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
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Total : ','total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_hidden('total',set_value('total', isset($default['total']) ? $default['total'] : ''),'id="total" class="form-control" placeholder="Masukkan total"'); ?>
                                <?php echo form_input('totalx',set_value('totalx', isset($default['totalx']) ? $default['totalx'] : ''),'id="totalx" class="form-control text-right" placeholder="Rp"'); ?>
                                </div>
                            </div>
                        
                            
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 