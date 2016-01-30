 
<div class="btn-group" style="margin:20px 0px 20px">
    <a href="<?php echo base_url('bank/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/D') ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus"></i> Bank Masuk Baru</a>
    <a href="<?php echo base_url('bank/baru/'.strtoupper(md5(date('Y-m-d H:m'))).'/K') ?>" class="btn btn-lg btn-danger"><i class="fa fa-plus"></i> Bank Keluar Baru</a>

</div>
<h2  style="margin:20px 0px 30px">Form Transaksi Bank</h2>
                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'bank/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <!-- <input type="text" value='' id="id" name="id"> -->
                            <?php echo form_hidden('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control" required readonly placeholder="Masukkan id"'); ?>

                            <div class="form-group">
                                <?php echo form_label('Bukti Bank : ','bukti_bank',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('bukti_bank',set_value('bukti_bank', isset($default['bukti_bank']) ? $default['bukti_bank'] : ''),'id="bukti_bank" class="form-control" required readonly placeholder="Masukkan bukti_bank"'); ?>
                                </div>
                                    <span class="input-group-btn">
                                        <href="#" class="gen_new_kk btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                    </span>
                            </div>
                            </div>
                              
                            <div class="form-group">
                                <?php echo form_label('Tanggal: ','tgl_bank',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default)): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_bank" value="<?php echo isset($default['tgl_bank'])?$default['tgl_bank']:''; ?>" type="text" class="input-md form-control" name="tgl_bank" readonly required />
                                        <?php else: ?>
                                        <input id="tgl_bank" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control" name="tgl_bank" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class=" input-daterange btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                            
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                             <div class="form-group">
                                <?php echo form_label('Bank : ','id_bank',array('class'=>'control-label bank-text')); ?>
                                <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('id_bank',set_value('id_bank', isset($default['id_bank']) ? $default['id_bank'] : ''),'id="id_bank" class="form-control hidden" readonly placeholder="Masukkan id_bank"'); ?>
                                <?php echo form_input('banks',set_value('banks', isset($default['banks']) ? $default['banks'] : ''),'id="banks" class="form-control" readonly placeholder="Masukkan banks"'); ?>
                                </div>
                                <span class="input-group-btn">
                                        <a href="#modal-bank" data-toggle="modal" class="load_bank btn btn-info" type="button"><i class="fa fa-search"></i></a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Akun Bank : ','akun_bank',array('class'=>'control-label akun-bank-text')); ?>
                                 <div class="input-group">
 
                                <div class="controls">
                                <?php echo form_input('akun_bank',set_value('akun_bank', isset($default['akun_bank']) ? $default['akun_bank'] : ''),'id="akun_bank" readonly class="text-akun form-control" placeholder="Masukkan akun_bank"'); ?>
                                </div><span class="input-group-btn">
                                        <a href="#modal-bank" data-toggle="modal" class="load_bank btn btn-info" type="button"><i class="fa fa-search"></i></a>

                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                           
                        
                           
                        </div>
                        <?php //if(!empty($default['tipe_trx']) || $default['tipe_trx']!=null): ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-default">
                                  
                                  <div class="panel-body panel-heading">
                                        <div class="form-group">
                                            <?php echo form_label('Tipe Transaksi Bank : ','tipe_trx',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                         
                                           <?php $tipe1 = array(
                                                'name'  => 'tipe_trx',
                                                'id'    => 'trx_masuk',
                                                'class' => '',
                                                'style' => 'margin:10px',
                                                ); 
                                           $tipe2 = array(
                                                'name'  => 'tipe_trx',
                                                'id'    => 'trx_keluar',
                                                'class' => '',
                                                'style' => 'margin:10px',
                                                );
                                         
                                            echo form_radio($tipe1,"D", set_radio('tipe_trx', 'D',isset($default['tipe_trx'])?($default['tipe_trx']=='D'? true :false):'D')).form_label(' Bank Masuk','trx_masuk',array('class'=>'control-label')); 
                                            echo form_radio($tipe2,"K", set_radio('tipe_trx', 'K',isset($default['tipe_trx'])?($default['tipe_trx']=='K'? true :false):'K')).form_label(' Bank Keluar','trx_keluar',array('class'=>'control-label'))."<br>"; 

                          
                                            ?>
                                            </div>
                                        </div>
                                    <div class="form-group supplier" <?php echo !empty($default['tipe_trx'])?(($default['tipe_trx']=='D')?'style="display:none"':''):''; ?>>
                                        <?php echo form_label('id_supplier : ','id_supplier',array('class'=>'control-label')); ?>
                                          <div class="input-group">
                                            <span class="input-group-btn">
                                                <a href="#" class="add_supplier btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                            </span>
                                    
                                                <div class="controls">
                                                    <?php $selected = isset($default['id_supplier'])? $default['id_supplier'] : '0';  ?>

                                                <?php echo form_dropdown('id_supplier',$opt_supplier,$selected,'id="id_supplier" class="form-control"  data-placeholder="Choose a Country..." placeholder="Masukkan id_supplier"'); ?>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group customer" <?php echo !empty($default['tipe_trx'])?(($default['tipe_trx']=='K')?'style="display:none"':''):''; ?>>
                                        <?php echo form_label('Customer : ','id_customer',array('class'=>'control-label')); ?>
                                        <div class="input-group">

                                            <div class="controls">
                                                    <?php $customer = isset($default['id_customer'])? $default['id_customer'] : '0';  ?>

                                            <?php echo form_dropdown('id_customer',$opt_customer,$customer,'id="id_customer" class="form-control input-lg select2" placeholder="Masukkan id_customer"'); ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            
                        </div>
                        <?php //endif ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel_bank row panel <?php echo ($default['tipe_trx']=='D')?'panel-primary':'panel-danger'; ?>">
                                  <div class="add_panel panel-body panel-heading">
                                        

                                  <!-- </div> -->
                                  <!-- <div class="panel-body"> -->
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Faktur Lawan','faktur_lawan',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('faktur_lawan',set_value('faktur_lawan', isset($default['faktur_lawan']) ? $default['faktur_lawan'] : ''),'id="faktur_lawan" class="form-control input-lg" required placeholder="Masukkan faktur_lawan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                         
                                    
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">

                                            <?php echo form_label('Akun ','no_perkiraan',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('no_perkiraan',set_value('no_perkiraan', isset($default['no_perkiraan']) ? $default['no_perkiraan'] : ''),'id="no_perkiraan" class="form-control input-lg" required placeholder="Masukkan no_perkiraan"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Keterangan','deskripsi',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('deskripsi',set_value('deskripsi', isset($default['deskripsi']) ? $default['deskripsi'] : ''),'id="deskripsi" class="form-control input-lg" required placeholder="Masukkan deskripsi"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        
                                        <div class="form-group">
                                            <?php echo form_label('Bayar','nilai',array('class'=>'control-label')); ?>
                                            <div class="controls">
                                            <?php echo form_input('nilai','','id="nilai" class="form-control input-lg" required placeholder="Masukkan nilai"'); ?>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                                        <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>
                                        <button class="add_bank btn btn-lg btn-warning"><i class="fa fa-plus fa2x"></i></button>
                                    
                                    </div>
                                  </div>
                                 
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="table_bank_detail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                          
                                        <tr>
                                                       
                                                        <th class="text-center" style="width:10%">Bukti Bank</th>
                                                        <th class="text-center" style="width:10%">Faktur</th>
                                                        <th class="text-center" style="width:10%">Akun</th>
                                                        <th class="text-center" style="width:45%">Keterangan</th>
                                                        <th class="text-center" style="width:15%">Nominal</th>
                                                        <th class="text-center" style="width:5%">Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                               
                            <div class="form-group">
                                <?php echo form_label('Total Bank : ','total_bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_bank',set_value('total_bank', isset($default['total_bank']) ? $default['total_bank'] : ''),'id="total_bank" class="form-control hidden" readonly placeholder="Rp"'); ?>
                                <?php echo form_input('total_bankx',set_value('total_bankx', isset($default['total_bank']) ? $default['total_bank'] : ''),'id="total_bankx" class="form-control text-right" style="font-size:20px;" readonly placeholder="Rp"'); ?>
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>Giro</h3>
                            <table id="data" class="table_tt_giro table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                             

                                                       
                                                       <?php $tipe=array("T"=>"Transfer",'G'=>'Giro') ?>
                                                       <?php $select = isset($giro['tipe_tt_giro'])? $giro['tipe_tt_giro'] : '0';  ?>
                                                        <th style="width:20%"><?php echo form_dropdown('tipe_tt_giro',$tipe,$select,'id="tipe_tt_giro" class="form-control" placeholder="Tipe Giro"'); ?></th>
                                                        <th style="width:20%">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <?php echo form_input('no_tt_giro',set_value('no_tt_giro', isset($giro['no_tt_giro']) ? $giro['no_tt_giro'] : ''),'id="no_tt_giro" class="form-control" placeholder="No. Giro/Transfer"'); ?>
                                                                </div>
                                                            </div>
                                                        </th>
                                                        <th style="width:30%">
                                                                <div>
                                                                    <div class="input-daterange input-group controls" id="datepicker">
                                                                       <?php if(!empty($giro)): //print_r($giro);?>
                                                                        <?php //rint_r($giro); ?>
                                                                        <input id="tgl_tt_giro" style="100%" value="<?php echo isset($giro['tgl_tt_giro'])?$giro['tgl_tt_giro']:''; ?>" type="text" class="form-control" name="tgl_tt_giro" placeholder="<?php echo date('Y-m-d') ?>" readonly required />
                                                                        <?php else: ?>
                                                                        <input id="tgl_tt_giro" style="100%" value="<?php echo date('Y-m-d') ?>" type="text" class=" form-control" name="tgl_tt_giro" placeholder="<?php echo date('Y-m-d') ?>" readonly required />
                                                                        <?php endif; ?>
                                                                        <span class="input-group-btn">
                                                                        <a href="#" class=" input-daterange btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                                                      </span>                                    
                                                                    </div>    
                                                                </div>
                                                        </th>
                                                        <th style="width:20%">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                <?php echo form_input('nominal',set_value('nominal', isset($giro['nominal']) ? $giro['nominal'] : ''),'id="nominal" class="form-control" placeholder="Nominal"'); ?>
                                                                </div>
                                                            </div>
                                                        </th>
                                                      
                                                     
                                                        <th style="width:10%"><button class="add_tt_giro btn btn-md btn-danger"><i class="fa fa-plus"></i></button></th>

                                                    </tr>
                                        <tr>
                                                       
                                                        <th class="text-center" >Tipe</th>
                                                        <th class="text-center" >No</th>
                                                        <th class="text-center" >Tanggal</th>
                                                        <th class="text-center" >Nominal</th>
                                                        <th class="text-center" >Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="5" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                         
                            <div class="form-group">
                                <?php echo form_label('Total Giro : ','total_giro',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('total_giro',set_value('total_giro', isset($default['total_giro']) ? $default['total_giro'] : ''),'id="total_giro" class="form-control hidden" readonly placeholder="Rp"'); ?>
                                <?php echo form_input('total_girox',set_value('total_girox', isset($default['total_giro']) ? $default['total_giro'] : ''),'id="total_girox" class="form-control text-right" style="font-size:20px;" readonly placeholder="Rp"'); ?>
                                </div>
                            </div>
                        
                          
                       
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php $act=$this->session->userdata(md5('action')); //print_r($act)?>
                            <?php if($act['baru']==1): ?>
                            <button href="#modal-notif" id="save" data-toggle="modal" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <?php elseif($act['edit']==1): ?>
                            <button href="#modal-notif" data-toggle="modal" id="save_edit" type="submit" class="btn btn-lg btn-primary" ><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <?php endif; ?>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 