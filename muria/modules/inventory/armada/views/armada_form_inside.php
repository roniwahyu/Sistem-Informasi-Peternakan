 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'armada/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kendaraan_id : ','kendaraan_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kendaraan_id',set_value('kendaraan_id', isset($default['kendaraan_id']) ? $default['kendaraan_id'] : ''),'id="kendaraan_id" class="form-control" placeholder="Masukkan kendaraan_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('supir_id : ','supir_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('supir_id',set_value('supir_id', isset($default['supir_id']) ? $default['supir_id'] : ''),'id="supir_id" class="form-control" placeholder="Masukkan supir_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('supplier_id : ','supplier_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('supplier_id',set_value('supplier_id', isset($default['supplier_id']) ? $default['supplier_id'] : ''),'id="supplier_id" class="form-control" placeholder="Masukkan supplier_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('customer_id : ','customer_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('customer_id',set_value('customer_id', isset($default['customer_id']) ? $default['customer_id'] : ''),'id="customer_id" class="form-control" placeholder="Masukkan customer_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('rute_id : ','rute_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('rute_id',set_value('rute_id', isset($default['rute_id']) ? $default['rute_id'] : ''),'id="rute_id" class="form-control" placeholder="Masukkan rute_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('wilayah_id : ','wilayah_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('wilayah_id',set_value('wilayah_id', isset($default['wilayah_id']) ? $default['wilayah_id'] : ''),'id="wilayah_id" class="form-control" placeholder="Masukkan wilayah_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('mitra_id : ','mitra_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('mitra_id',set_value('mitra_id', isset($default['mitra_id']) ? $default['mitra_id'] : ''),'id="mitra_id" class="form-control" placeholder="Masukkan mitra_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('gudang_id : ','gudang_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('gudang_id',set_value('gudang_id', isset($default['gudang_id']) ? $default['gudang_id'] : ''),'id="gudang_id" class="form-control" placeholder="Masukkan gudang_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kandang_id : ','kandang_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kandang_id',set_value('kandang_id', isset($default['kandang_id']) ? $default['kandang_id'] : ''),'id="kandang_id" class="form-control" placeholder="Masukkan kandang_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('userid : ','userid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('userid',set_value('userid', isset($default['userid']) ? $default['userid'] : ''),'id="userid" class="form-control" placeholder="Masukkan userid"'); ?>
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
            


 