 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'barang_harga/submit',array('id'=>'addform_harga','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php // echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_hidden('id_barang',set_value('id_barang', isset($id_barang) ? $id_barang : ''),'id="id_barang" class="form-control" placeholder="Enter id_barang"'); ?>
                                </div>
                            </div>
                        
                    
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Harga Beli'.(isset($satuan['Satuan1']) ? '/'.$satuan['Satuan1'] : ' ').' (Satuan1)','hb1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb1',set_value('hb1', isset($default['hb1']) ? $default['hb1'] : ''),'id="hb1" class="form-control" placeholder="Enter hb1" '.((isset($default['hb1']) || (!isset($satuan['Satuan1']))) ? 'readonly' : '').' '); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Harga Beli'.(isset($satuan['Satuan2']) ? '/'.$satuan['Satuan2'] : ' ').' (Satuan2)','hb2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb2',set_value('hb2', isset($default['hb2']) ? $default['hb2'] : ''),'id="hb2" class="form-control" placeholder="Enter hb2" '.((isset($default['hb2']) || (!isset($satuan['Satuan2']))) ? 'readonly' : '').' ');?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Harga Beli'.(isset($satuan['Satuan3']) ? '/'.$satuan['Satuan3'] : ' ').' (Satuan3)','hb3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb3',set_value('hb3', isset($default['hb3']) ? $default['hb3'] : ''),'id="hb3" class="form-control" placeholder="Enter hb3" '.((isset($default['hb3']) || (!isset($satuan['Satuan3']))) ? 'readonly' : '').' ');?>
                                </div>
                            </div>
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save_harga" type="submit" data-dismiss="modal" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 