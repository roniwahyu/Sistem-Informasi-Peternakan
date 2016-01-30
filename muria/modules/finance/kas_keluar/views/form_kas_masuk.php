 
            <div >
                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'kas_keluar/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur_kas : ','faktur_kas',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                    <div class="controls">
                                    <?php echo form_input('faktur_kas',set_value('faktur_kas', isset($faktur_kas) ? $faktur_kas : ''),'id="faktur_kas" class="form-control" placeholder="Masukkan faktur_kas"'); ?>
                                    </div>
                                        <span class="input-group-btn">
                                           $<href="#" class="gen_new_kk btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_kas : ','tgl_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kas',set_value('tgl_kas', isset($default['tgl_kas']) ? $default['tgl_kas'] : ''),'id="tgl_kas" class="form-control" placeholder="Masukkan tgl_kas"'); ?>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                  <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_supplier btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                            
                                <div class="controls">
                                    <?php $selected = isset($default['id_supplier'])? $default['id_supplier'] : '0';  ?>

                                <?php echo form_dropdown('id_supplier',$opt_supplier,$selected,'id="id_supplier" class="form-control"  data-placeholder="Choose a Country..." placeholder="Masukkan id_supplier"'); ?>
                                </div></div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('akun_kas : ','akun_kas',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                    <div class="controls">
                                    <?php echo form_input('akun_kas',set_value('akun_kas', isset($default['akun_kas']) ? $default['akun_kas'] : ''),'id="akun_kas" class="form-control" placeholder="Masukkan akun_kas"'); ?>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#modal-id" data-toggle="modal" class="add_akun btn btn-info" type="button"><i class="fa fa-search"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            
                            <div class="form-group">
                                <?php echo form_label('is_jurnal : ','is_jurnal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_jurnal',set_value('is_jurnal', isset($default['is_jurnal']) ? $default['is_jurnal'] : ''),'id="is_jurnal" class="form-control" placeholder="Masukkan is_jurnal"'); ?>
                                </div>
                            </div>
                       
                            
                            <div class="form-group">
                                <?php echo form_label('is_trx : ','is_trx',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('is_trx',set_value('is_trx', isset($default['is_trx']) ? $default['is_trx'] : ''),'id="is_trx" class="form-control" placeholder="Masukkan is_trx"'); ?>
                                </div>
                            </div>
                        
                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <div class=" row panel panel-danger">
                                <div class="add_panel panel-body panel-heading">
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Faktur Lawan','faktur_lawan',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('faktur_lawan',set_value('faktur_lawan', isset($default['faktur_lawan']) ? $default['faktur_lawan'] : ''),'id="faktur_lawan" class="form-control input-lg" placeholder="Masukkan faktur_lawan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                         
                                    
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('No. Perkiraan ','no_perkiraan',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('no_perkiraan',set_value('no_perkiraan', isset($default['no_perkiraan']) ? $default['no_perkiraan'] : ''),'id="no_perkiraan" class="form-control input-lg" placeholder="Masukkan no_perkiraan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Keterangan','deskripsi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('deskripsi',set_value('deskripsi', isset($default['deskripsi']) ? $default['deskripsi'] : ''),'id="deskripsi" class="form-control input-lg" placeholder="Masukkan deskripsi"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Nominal','nilai',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('nilai','','id="nilai" class="form-control input-lg" placeholder="Masukkan nilai"'); ?>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                            <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>
                                        
                                       <button class="btn btn-lg btn-info"><i class="fa fa-plus fa2x"></i></button>
                                    
                                    </div>


                                </div>
                            </div>
                        </div>
                       
                                
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="table table_kasout table-bordered table-condensed table-striped" style="font-size:13px;">
                                    <thead class="">
                                        <tr>
                                                       
                                                        
                                                        <th class="text-center" style="width:10%">Faktur Kas</th>
                                                        <th class="text-center" style="width:15%">Faktur</th>
                                                        <th class="text-center" style="width:15%">Perkiraan</th>
                                                        <th class="text-center" style="width:30%">Keterangan</th>
                                                        <th class="text-center" style="width:10%">Nominal</th>
                                                        <th class="text-center" style="width:10%">Status</th>
                                                        <th class="text-center" style="width:10%">Aksi</th>

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
                                <?php echo form_label('nominal : ','nominal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal',set_value('nominal', isset($default['nominal']) ? $default['nominal'] : ''),'id="nominal" class="form-control" placeholder="Masukkan nominal"'); ?>
                                </div>
                            </div>
                        </div>
                       
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php $act=$this->session->userdata('action');

                            <?php if($act['baru']==1): ?>
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                <?php elseif($act['edit']==1): ?>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                                <?php endif; ?>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            </div>


 