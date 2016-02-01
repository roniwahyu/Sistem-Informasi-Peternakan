 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'purchase_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('faktur_po : ','faktur_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('faktur_po','','id="faktur_po" class="form-control" placeholder="Enter faktur_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_po : ','tgl_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_po','','id="tgl_po" class="form-control" placeholder="Enter tgl_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_supplier','','id="id_supplier" class="form-control" placeholder="Enter id_supplier"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref_beli : ','ref_beli',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref_beli','','id="ref_beli" class="form-control" placeholder="Enter ref_beli"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_stock_req : ','id_stock_req',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_stock_req','','id="id_stock_req" class="form-control" placeholder="Enter id_stock_req"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_bayar : ','id_bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_bayar','','id="id_bayar" class="form-control" placeholder="Enter id_bayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalbayar','','id="totalbayar" class="form-control" placeholder="Enter totalbayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('uangmuka : ','uangmuka',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('uangmuka','','id="uangmuka" class="form-control" placeholder="Enter uangmuka"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal','','id="grandtotal" class="form-control" placeholder="Enter grandtotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_kirim : ','biaya_kirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_kirim','','id="biaya_kirim" class="form-control" placeholder="Enter biaya_kirim"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status','','id="status" class="form-control" placeholder="Enter status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_kirim_po : ','tgl_kirim_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kirim_po','','id="tgl_kirim_po" class="form-control" placeholder="Enter tgl_kirim_po"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tgl_kedaluarsa_po : ','tgl_kedaluarsa_po',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tgl_kedaluarsa_po','','id="tgl_kedaluarsa_po" class="form-control" placeholder="Enter tgl_kedaluarsa_po"'); ?>
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
            


 