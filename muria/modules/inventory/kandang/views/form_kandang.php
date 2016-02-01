 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'kandang/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kode',set_value('Kode', isset($default['Kode']) ? $default['Kode'] : ''),'id="Kode" class="form-control" placeholder="Masukkan Kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan',set_value('Keterangan', isset($default['Keterangan']) ? $default['Keterangan'] : ''),'id="Keterangan" class="form-control" placeholder="Masukkan Keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Gudang : ','Gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Gudang',set_value('Gudang', isset($default['Gudang']) ? $default['Gudang'] : ''),'id="Gudang" class="form-control" placeholder="Masukkan Gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmGudang : ','NmGudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmGudang',set_value('NmGudang', isset($default['NmGudang']) ? $default['NmGudang'] : ''),'id="NmGudang" class="form-control" placeholder="Masukkan NmGudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Mitra : ','Mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Mitra',set_value('Mitra', isset($default['Mitra']) ? $default['Mitra'] : ''),'id="Mitra" class="form-control" placeholder="Masukkan Mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmMitra : ','NmMitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmMitra',set_value('NmMitra', isset($default['NmMitra']) ? $default['NmMitra'] : ''),'id="NmMitra" class="form-control" placeholder="Masukkan NmMitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('StKandang : ','StKandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StKandang',set_value('StKandang', isset($default['StKandang']) ? $default['StKandang'] : ''),'id="StKandang" class="form-control" placeholder="Masukkan StKandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Faktur',set_value('Faktur', isset($default['Faktur']) ? $default['Faktur'] : ''),'id="Faktur" class="form-control" placeholder="Masukkan Faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Barang : ','Barang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Barang',set_value('Barang', isset($default['Barang']) ? $default['Barang'] : ''),'id="Barang" class="form-control" placeholder="Masukkan Barang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tgl',set_value('Tgl', isset($default['Tgl']) ? $default['Tgl'] : ''),'id="Tgl" class="form-control" placeholder="Masukkan Tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Qty : ','Qty',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Qty',set_value('Qty', isset($default['Qty']) ? $default['Qty'] : ''),'id="Qty" class="form-control" placeholder="Masukkan Qty"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Satuan : ','Satuan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Satuan',set_value('Satuan', isset($default['Satuan']) ? $default['Satuan'] : ''),'id="Satuan" class="form-control" placeholder="Masukkan Satuan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Umur : ','Umur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Umur',set_value('Umur', isset($default['Umur']) ? $default['Umur'] : ''),'id="Umur" class="form-control" placeholder="Masukkan Umur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status',set_value('Status', isset($default['Status']) ? $default['Status'] : ''),'id="Status" class="form-control" placeholder="Masukkan Status"'); ?>
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
            


 