 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'barang_harga/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('id_barang : ','id_barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_barang','','id="id_barang" class="form-control" placeholder="Enter id_barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('markup : ','markup',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('markup','','id="markup" class="form-control" placeholder="Enter markup"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hb1 : ','hb1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb1','','id="hb1" class="form-control" placeholder="Enter hb1"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hb2 : ','hb2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb2','','id="hb2" class="form-control" placeholder="Enter hb2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hb3 : ','hb3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hb3','','id="hb3" class="form-control" placeholder="Enter hb3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj1r : ','hj1r',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj1r','','id="hj1r" class="form-control" placeholder="Enter hj1r"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj2r : ','hj2r',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj2r','','id="hj2r" class="form-control" placeholder="Enter hj2r"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj3r : ','hj3r',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj3r','','id="hj3r" class="form-control" placeholder="Enter hj3r"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj1u : ','hj1u',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj1u','','id="hj1u" class="form-control" placeholder="Enter hj1u"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj2u : ','hj2u',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj2u','','id="hj2u" class="form-control" placeholder="Enter hj2u"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj3u : ','hj3u',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj3u','','id="hj3u" class="form-control" placeholder="Enter hj3u"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj2p : ','hj2p',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj2p','','id="hj2p" class="form-control" placeholder="Enter hj2p"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hj3p : ','hj3p',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hj3p','','id="hj3p" class="form-control" placeholder="Enter hj3p"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hn1 : ','hn1',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hn1','','id="hn1" class="form-control" placeholder="Enter hn1"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hn2 : ','hn2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hn2','','id="hn2" class="form-control" placeholder="Enter hn2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('hn3 : ','hn3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('hn3','','id="hn3" class="form-control" placeholder="Enter hn3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('max : ','max',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('max','','id="max" class="form-control" placeholder="Enter max"'); ?>
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
            


 