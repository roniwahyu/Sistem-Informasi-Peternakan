 

                    <div id="form_input" class="row" style="font-size:12px">
                    <?php echo form_open(base_url().'delivery_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                           <div class="form-group">
                                <?php echo form_label('Faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" readonly placeholder="faktur"'); ?>
                                </div><span class="input-group-btn">
                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Tanggal Recording: ','tanggal',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tanggal'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" class="input-md form-control" name="tanggal" required />
                                        <?php else: ?>
                                        <input id="tanggal" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tanggal" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            <div class="form-group">
                                                <?php echo form_label('Faktur Penjualan : ','faktur_reff',array('class'=>'control-label')); ?>
                                                <div class="input-group">
                 
                                                <div class="controls">
                                                <?php echo form_input('faktur_reff',set_value('faktur_reff', isset($default['faktur_reff']) ? $default['faktur_reff'] : ''),'id="faktur_reff" class="form-control" readonly placeholder="faktur_reff"'); ?>
                                                </div><span class="input-group-btn">
                                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                                        </span>
                                                    </div>
                                            </div>
                        </div> 
                    
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                    <div class="row">


                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            
                                          
                                            <div class="form-group">
                                                <?php echo form_label('Customer : ','id_customer',array('class'=>'control-label')); ?>
                                                <div class="controls">
                                                <?php echo form_input('id_customer',set_value('id_customer', isset($default['id_customer']) ? $default['id_customer'] : ''),'id="id_customer" class="form-control" placeholder="Masukkan id_customer"'); ?>
                                                </div>
                                            </div>
                                       
                                            
                                             <div class="form-group">
                                                <?php echo form_label('Faktur : ','faktur_po',array('class'=>'control-label')); ?>
                                                <div class="input-group">
                 
                                                <div class="controls">
                                                <?php echo form_input('faktur_po',set_value('faktur_po', isset($default['faktur_po']) ? $default['faktur_po'] : ''),'id="faktur_po" class="form-control" readonly placeholder="faktur_po"'); ?>
                                                </div><span class="input-group-btn">
                                                            <a href="#" class="gen_faktur btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                                        </span>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                                                  
                                                <div class="form-group">
                                                        <?php echo form_label('Kirim Via : ','kirim_via',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_input('kirim_via',set_value('kirim_via', isset($default['kirim_via']) ? $default['kirim_via'] : ''),'id="kirim_via" class="form-control" placeholder="Masukkan kirim_via"'); ?>
                                                        </div>
                                                    </div>
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Armada Pengirim: ','armada_id',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('armada_id',set_value('armada_id', isset($default['armada_id']) ? $default['armada_id'] : ''),'id="armada_id" class="form-control" placeholder="Masukkan armada_id"'); ?>
                                                    </div>
                                                </div>
                                        </div>
                                  </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <div class="form-group">
                                                        <?php echo form_label('Keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                        <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                           <div class="form-group">
                                                <?php echo form_label('Tanggal Kirim: ','tanggal_kirim',array('class'=>'control-label')); ?>
                                                    <div class="input-daterange input-group controls" id="datepicker">
                                                       <?php if(!empty($default['tanggal_kirim'])): //print_r($default);?>
                                                        <?php //rint_r($default); ?>
                                                        <input id="tanggal_kirim" value="<?php echo $default['tanggal_kirim']; ?>" type="text" class="input-md form-control" name="tanggal_kirim" required />
                                                        <?php else: ?>
                                                        <input id="tanggal_kirim" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tanggal_kirim" required />
                                                        <?php endif; ?>
                                                    <span class="input-group-btn">
                                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                                  </span>                                    
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                <?php echo form_label('Persetujuan : ','is_approved',array('class'=>'control-label')); ?>
                                            <div class="checkbox i-checks">
                                                    <label for="is_approved" style="padding-left:0px;"> 
                                                        <?php echo form_checkbox('is_approved',$default['is_approved'],set_checkbox('is_approved',$default['is_approved'] ,$default['is_approved']),'id="is_approved" style="margin-left:20px" class="form-control"'); ?> 
                                                        <i></i> &nbsp; Disetujui 
                                                    </label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                      
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                                            
                                            <div class="form-group">
                                                <?php echo form_label('Alamat Tagihan : ','alamat_tagihan',array('class'=>'control-label')); ?>
                                                <div class="controls">
                                                <?php echo form_textarea('alamat_tagihan',set_value('alamat_tagihan', isset($default['alamat_tagihan']) ? $default['alamat_tagihan'] : ''),'id="alamat_tagihan" style="height:50px;font-size:11px" class="form-control" placeholder="Masukkan alamat_tagihan"'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php echo form_label('Alamat Kirim : ','alamat_kirim',array('class'=>'control-label')); ?>
                                                <div class="controls">
                                                <?php echo form_textarea('alamat_kirim',set_value('alamat_kirim', isset($default['alamat_kirim']) ? $default['alamat_kirim'] : ''),'id="alamat_kirim" class="form-control" style="height:50px;font-size:11px" placeholder="Masukkan alamat_kirim"'); ?>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            
                            
                           
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            
                           
                        
                           
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            
                          
                        
                       
                        
                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>Faktur</th>
                                                        <th>Tanggal</th>
                                                        <th>Faktur Penjualan</th>
                                                        <th>PO Customer</th>
                                                        <th>Customer</th>
                                                        <th>Tanggal Kirim</th>
                                                        <th>Kirim Via</th>
                                                        <th>keterangan</th>
                                                    
                                                        <th>Ardmada</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="10" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                             <div class="form-group">
                                <?php echo form_label('biaya_id : ','biaya_id',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_id',set_value('biaya_id', isset($default['biaya_id']) ? $default['biaya_id'] : ''),'id="biaya_id" class="form-control" placeholder="Masukkan biaya_id"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_kirim : ','biaya_kirim',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_kirim',set_value('biaya_kirim', isset($default['biaya_kirim']) ? $default['biaya_kirim'] : ''),'id="biaya_kirim" class="form-control" placeholder="Masukkan biaya_kirim"'); ?>
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
            


 