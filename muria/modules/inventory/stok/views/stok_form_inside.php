 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'stok/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang','','id="id_barang" class="form-control" placeholder="Enter id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_awal : ','stok_awal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_awal','','id="stok_awal" class="form-control" placeholder="Enter stok_awal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_in : ','stok_in',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_in','','id="stok_in" class="form-control" placeholder="Enter stok_in"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_out : ','stok_out',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_out','','id="stok_out" class="form-control" placeholder="Enter stok_out"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_wip : ','stok_wip',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_wip','','id="stok_wip" class="form-control" placeholder="Enter stok_wip"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_po : ','stok_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_po','','id="stok_po" class="form-control" placeholder="Enter stok_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_so : ','stok_so',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_so','','id="stok_so" class="form-control" placeholder="Enter stok_so"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_do : ','stok_do',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_do','','id="stok_do" class="form-control" placeholder="Enter stok_do"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('stok_op : ','stok_op',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('stok_op','','id="stok_op" class="form-control" placeholder="Enter stok_op"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_user : ','id_user',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_user','','id="id_user" class="form-control" placeholder="Enter id_user"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime','','id="datetime" class="form-control" placeholder="Enter datetime"'); ?>
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
            


 