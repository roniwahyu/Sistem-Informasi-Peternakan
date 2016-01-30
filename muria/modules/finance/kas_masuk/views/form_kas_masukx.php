 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'kas_masuk/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('nomor : ','nomor',array('class'=>'control-label')); ?>
                                 <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('nomor',set_value('nomor', isset($default['nomor']) ? $default['nomor'] : ''),'id="nomor" class="form-control" placeholder="Masukkan nomor"'); ?>
                                </div>
                                <span class="input-group-btn">
                                    <a href="#" class="generate_nomor btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
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
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('id_customer : ','id_customer',array('class'=>'control-label')); ?>
                                 <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_customer btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                                <div class="controls">
                                <?php $selected = isset($default['id_customer'])? $default['id_customer'] : '0';  ?>

                                <?php echo form_dropdown('id_customer',$opt_supplier,$selected,'id="id_customer" class="form-control select2" placeholder="Masukkan id_customer"'); ?>
                                </div>
                                    
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('akun_kas : ','akun_kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('akun_kas',set_value('akun_kas', isset($default['akun_kas']) ? $default['akun_kas'] : ''),'id="akun_kas" class="form-control" placeholder="Masukkan akun_kas"'); ?>
                                </div>
                            </div>
                        
                        </div>  
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                              
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
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                
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
                              <table id="data" class="table table_kasin table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                  
                                                        <th class="text-center" style="width:10%">Faktur Kas</th>
                                                        <th class="text-center" style="width:10%">Faktur </th>
                                                        <th class="text-center" style="width:10%">#Perkiraan</th>
                                                        <th class="text-center" style="width:40%">Keterangan</th>
                                                        <th class="text-center" style="width:15%">Nominal</th>
                                                    
                                                        <th class="text-center" style="width:10%">Status</th>
                                                   
                                                        <th class="text-center" style="width:5%">Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="7" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                          </div>  
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        </div>
                            
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            
                          <div class="form-group">
                                <?php echo form_label('nominal : ','nominal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nominal',set_value('nominal', isset($default['nominal']) ? $default['nominal'] : ''),'id="nominal" class="form-control" placeholder="Masukkan nominal"'); ?>
                                </div>
                            </div>
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 