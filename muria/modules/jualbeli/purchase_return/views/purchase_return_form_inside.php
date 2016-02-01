 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'purchase_return/submit',array('id'=>'addform_return','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur_pr : ','faktur_pr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_pr',set_value('faktur_pr', isset($default['faktur_pr']) ? $default['faktur_pr'] : ''),'id="faktur_pr" class="form-control" placeholder="Masukkan faktur_pr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_pt : ','id_pt',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_pt',set_value('id_pt', isset($default['id_pt']) ? $default['id_pt'] : ''),'id="id_pt" class="form-control" placeholder="Masukkan id_pt"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgL_pr : ','tgL_pr',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgL_pr',set_value('tgL_pr', isset($default['tgL_pr']) ? $default['tgL_pr'] : ''),'id="tgL_pr" class="form-control" placeholder="Masukkan tgL_pr"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tipe_retur : ','tipe_retur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tipe_retur',set_value('tipe_retur', isset($default['tipe_retur']) ? $default['tipe_retur'] : ''),'id="tipe_retur" class="form-control" placeholder="Masukkan tipe_retur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier',set_value('id_supplier', isset($default['id_supplier']) ? $default['id_supplier'] : ''),'id="id_supplier" class="form-control" placeholder="Masukkan id_supplier"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('totalretur : ','totalretur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalretur',set_value('totalretur', isset($default['totalretur']) ? $default['totalretur'] : ''),'id="totalretur" class="form-control" placeholder="Masukkan totalretur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bayar : ','bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bayar',set_value('bayar', isset($default['bayar']) ? $default['bayar'] : ''),'id="bayar" class="form-control" placeholder="Masukkan bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biayakirim : ','biayakirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biayakirim',set_value('biayakirim', isset($default['biayakirim']) ? $default['biayakirim'] : ''),'id="biayakirim" class="form-control" placeholder="Masukkan biayakirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user',set_value('id_user', isset($default['id_user']) ? $default['id_user'] : ''),'id="id_user" class="form-control" placeholder="Masukkan id_user"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan datetime"'); ?>
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
            


 