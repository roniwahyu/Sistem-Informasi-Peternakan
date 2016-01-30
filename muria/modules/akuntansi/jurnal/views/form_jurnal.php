 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'jurnal/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <!-- <input type="hidden" value='' id="id" name="id"> -->
                            
                            <div class="form-group">
                                <?php echo form_label('No. Jurnal : ','no_jurnal',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control hidden" readonly placeholder="JR"'); ?>
                                <?php echo form_input('no_jurnal',set_value('no_jurnal', isset($default['no_jurnal']) ? $default['no_jurnal'] : ''),'id="no_jurnal" class="form-control" readonly placeholder="JR"'); ?>
                                </div><span class="input-group-btn">
                                           <a href="#" title="Generate JR" class="gen_jurnal btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                         
                             <div class="form-group">
                                <?php echo form_label('Tanggal: ','tgl',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl" value="<?php echo $default['tgl']; ?>" type="text" class="input-md form-control" name="tgl" required />
                                        <?php else: ?>
                                        <input id="tgl" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            
                          
                          
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                    <?php echo form_label('No. Bukti : ','no_bukti',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                <div class="controls">
                                    <?php echo form_input('no_bukti',set_value('no_bukti', isset($default['no_bukti']) ? $default['no_bukti'] : ''),'id="no_bukti" class="form-control" placeholder="No. Bukti"'); ?>
                                </div>
                                <span class="input-group-btn">
                                           <a href="#modal-bukti" data-toggle="modal" id="" class="load_bukti btn btn-info" type="button"><i class="fa fa-search"></i></a>
                                        </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Grup Jurnal : ','jurnal_group',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('jurnal_group',set_value('jurnal_group', isset($default['jurnal_group']) ? $default['jurnal_group'] : ''),'id="jurnal_group" class="form-control" placeholder="Grup"'); ?>
                                </div>
                            </div>
                         
                        
                        
                        
                          
                        </div>
                       
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                
                             
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','ket',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ket',set_value('ket', isset($default['ket']) ? $default['ket'] : ''),'id="ket" class="form-control" placeholder="Keterangan"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                <?php echo form_checkbox('is_jrnl',set_checkbox('is_jrnl', isset($default['is_jrnl']) ? $default['is_jrnl'] : ''),'id="is_jrnl" style="margin-left:20px" class="form-control" placeholder="Masukkan is_jrnl"'); ?>
                                <?php echo form_label('Jurnal','is_jrnl',array('class'=>'control-label','style'=>'margin:10px')); ?>
                              
                                <?php echo form_checkbox('is_void',set_checkbox('is_void', isset($default['is_void']) ? $default['is_void'] : ''),'id="is_void" style="margin-left:20px" class="form-control" placeholder="Masukkan is_void"'); ?>
                                <?php echo form_label('Void','is_void',array('class'=>'control-label','style'=>'margin:10px')); ?>
                           
                                <?php echo form_checkbox('from_trx',set_checkbox('from_trx', isset($default['from_trx']) ? $default['from_trx'] : ''),'id="from_trx" style="margin-left:20px" class="form-control" placeholder="Masukkan from_trx"'); ?>
                                <?php echo form_label('Transaksi','from_trx',array('class'=>'control-label','style'=>'margin:10px')); ?>
                                </div>
                            </div>
                             

                        </div>
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel_bank row panel panel-success">
                                  <div class="add_panel panel-body panel-heading">
                                        

                               
                                    
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group ">

                                            <?php echo form_label('Akun ','no_perkiraan',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('no_perkiraan',set_value('no_perkiraan', isset($default['no_perkiraan']) ? $default['no_perkiraan'] : ''),'id="no_perkiraan" class="form-control input-lg" placeholder="No. Perkiraan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        
                                        <div class="form-group ">
                                            <?php echo form_label('Keterangan','deskripsi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('deskripsi',set_value('deskripsi', isset($default['deskripsi']) ? $default['deskripsi'] : ''),'id="deskripsi" class="form-control input-lg" placeholder="Keterangan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group ">
                                            <?php echo form_label('Debet/Kredit','detail_d',array('class'=>'control-label')); ?>
                                            
                                                <div class="btn btn-xs btn-primary btn-block">
                                                <?php echo form_radio('tipe_detail','D',set_radio('tipe_detail','D'),'id="detail_d" style="" class="tipe_detail" '); ?>
                                                <?php echo form_label('Debet','detail_d',array('class'=>'control-label','style'=>'margin:5px 10px'))."<br>"; ?>
                                                </div> 
                                                <div class=" btn btn-xs btn-danger btn-block">
                                                    
                                                <?php echo form_radio('tipe_detail','K',set_radio('tipe_detail','K'),'id="detail_k" style="" class="tipe_detail" '); ?>
                                                <?php echo form_label('Kredit','detail_k',array('class'=>'control-label ','style'=>'margin:5px 10px')); ?>
                                                   
                                               </div>
                                           
                                        </div>
                                       
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        
                                        <div class="form-group ">
                                            <?php echo form_label('Nominal','nilai',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('nilai','','id="nilai" class="form-control input-lg text-right" placeholder="Rp"'); ?>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                        <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>
                                        <button class="add_jurnal btn btn-lg btn-warning"><i class="fa fa-plus fa2x"></i></button>
                                    
                                    </div>
                                  </div>
                                 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="table-detail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th class="text-center" style="width:20%">Akun</th>
                                                        <th class="text-center" style="width:40%">Keterangan</th>
                                                        <th class="text-center" style="width:15%">Debet</th>
                                                        <th class="text-center" style="width:15%">Kredit</th>
                                                        <th class="text-center" style="width:10%">Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="10" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            
                        </div>    
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Debet : ','total_debet',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('total_debet',set_value('total_debet', isset($default['total_debet']) ? $default['total_debet'] : ''),'id="total_debet" class="form-control text-right hidden" placeholder="Rp"'); ?>
                                    <?php echo form_input('total_debetx',set_value('total_debetx', isset($default['total_debetx']) ? $default['total_debetx'] : ''),'id="total_debetx" style="font-size:20px" class="form-control text-right input-lg" readonly placeholder="Rp"'); ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                
                                <div class="form-group">
                                    <?php echo form_label('Kredit : ','total_kredit',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('total_kredit',set_value('total_kredit', isset($default['total_kredit']) ? $default['total_kredit'] : ''),'id="total_kredit" class="form-control text-right hidden" placeholder="Rp"'); ?>
                                    <?php echo form_input('total_kreditx',set_value('total_kreditx', isset($default['total_kreditx']) ? $default['total_kreditx'] : ''),'id="total_kreditx" style="font-size:20px" class="form-control text-right input-lg" readonly placeholder="Rp"'); ?>
                                    </div>
                                </div>
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php $act=$this->session->userdata(md5('action')); //print_r($act)?>

                            <?php //if($act['baru']==1): ?>
                                <a href="#modal-notif" data-toggle="modal" id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</a>
                            <?php //elseif($act['edit']==1): ?>
                                <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <?php //endif; ?>
                            
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 