 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'rekening/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
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
                                <?php echo form_label('cJenis : ','cJenis',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cJenis',set_value('cJenis', isset($default['cJenis']) ? $default['cJenis'] : ''),'id="cJenis" class="form-control" placeholder="Masukkan cJenis"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cGlobal : ','cGlobal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cGlobal',set_value('cGlobal', isset($default['cGlobal']) ? $default['cGlobal'] : ''),'id="cGlobal" class="form-control" placeholder="Masukkan cGlobal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cKelompok : ','cKelompok',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cKelompok',set_value('cKelompok', isset($default['cKelompok']) ? $default['cKelompok'] : ''),'id="cKelompok" class="form-control" placeholder="Masukkan cKelompok"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cJenisAcc : ','cJenisAcc',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cJenisAcc',set_value('cJenisAcc', isset($default['cJenisAcc']) ? $default['cJenisAcc'] : ''),'id="cJenisAcc" class="form-control" placeholder="Masukkan cJenisAcc"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cType : ','cType',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cType',set_value('cType', isset($default['cType']) ? $default['cType'] : ''),'id="cType" class="form-control" placeholder="Masukkan cType"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cGroup : ','cGroup',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cGroup',set_value('cGroup', isset($default['cGroup']) ? $default['cGroup'] : ''),'id="cGroup" class="form-control" placeholder="Masukkan cGroup"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cLevel : ','cLevel',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cLevel',set_value('cLevel', isset($default['cLevel']) ? $default['cLevel'] : ''),'id="cLevel" class="form-control" placeholder="Masukkan cLevel"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('StTampil : ','StTampil',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('StTampil',set_value('StTampil', isset($default['StTampil']) ? $default['StTampil'] : ''),'id="StTampil" class="form-control" placeholder="Masukkan StTampil"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cParent : ','cParent',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cParent',set_value('cParent', isset($default['cParent']) ? $default['cParent'] : ''),'id="cParent" class="form-control" placeholder="Masukkan cParent"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Awal : ','Awal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Awal',set_value('Awal', isset($default['Awal']) ? $default['Awal'] : ''),'id="Awal" class="form-control" placeholder="Masukkan Awal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Debet : ','Debet',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Debet',set_value('Debet', isset($default['Debet']) ? $default['Debet'] : ''),'id="Debet" class="form-control" placeholder="Masukkan Debet"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kredit : ','Kredit',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kredit',set_value('Kredit', isset($default['Kredit']) ? $default['Kredit'] : ''),'id="Kredit" class="form-control" placeholder="Masukkan Kredit"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Akhir : ','Akhir',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Akhir',set_value('Akhir', isset($default['Akhir']) ? $default['Akhir'] : ''),'id="Akhir" class="form-control" placeholder="Masukkan Akhir"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User',set_value('User', isset($default['User']) ? $default['User'] : ''),'id="User" class="form-control" placeholder="Masukkan User"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Time : ','Time',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Time',set_value('Time', isset($default['Time']) ? $default['Time'] : ''),'id="Time" class="form-control" placeholder="Masukkan Time"'); ?>
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
            


 