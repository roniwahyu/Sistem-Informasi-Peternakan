 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'sales_order/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <?php echo form_hidden('id',set_value('id', isset($default['id']) ? $default['id'] : ''),'id="id" class="form-control" placeholder="Masukkan id"'); ?>
                          
                            <div class="form-group">
                                <?php echo form_label('faktur : ','faktur',array('class'=>'control-label')); ?>
                                <div class="input-group">

                                <div class="controls">
                                <?php echo form_input('faktur',set_value('faktur', isset($default['faktur']) ? $default['faktur'] : ''),'id="faktur" class="form-control" placeholder="Masukkan faktur"'); ?>
                                </div> <span class="input-group-btn">
                                           <href="#" class="gen_new_kk btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal: ','tgl',array('class'=>'control-label'));?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl" value="<?php echo $default['tgl']; ?>" type="text" class="input-md form-control text-center" name="tgl" required />
                                        <?php else: ?>
                                        <input id="tgl" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                             <div class="form-group">
                                <?php echo form_label('Tanggal Terima: ','tgl_terima',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl_terima'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_terima" value="<?php echo $default['tgl_terima']; ?>" type="text" class="input-md form-control text-center" name="tgl_terima" required />
                                        <?php else: ?>
                                        <input id="tgl_terima" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl_terima" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tanggal : ','tgl_kedaluarsa',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                       <?php if(!empty($default['tgl_kedaluarsa'])): //print_r($default);?>
                                        <?php //rint_r($default); ?>
                                        <input id="tgl_kedaluarsa" value="<?php echo $default['tgl_kedaluarsa']; ?>" type="text" class="input-md form-control text-center" name="tgl_kedaluarsa" required />
                                        <?php else: ?>
                                        <input id="tgl_kedaluarsa" value="<?php echo date('Y-m-d') ?>"type="text" class=" form-control text-center" name="tgl_kedaluarsa" required />
                                        <?php endif; ?>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a>
                                  </span>                                    
                                </div>    
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                
                            
                           <div class="form-group">
                                <?php echo form_label('Customer: ','id_customer',array('class'=>'control-label')); ?>
                                  <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_customer btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                            
                                <div class="controls">
                                    <?php $customer = isset($default['id_customer'])? $default['id_customer'] : '0';  ?>

                                <?php echo form_dropdown('id_customer',$opt_customer,$customer,'id="id_customer" class="form-control"  data-placeholder="Choose a Country..." placeholder="Masukkan id_customer"'); ?>
                                </div></div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('id_sales : ','id_sales',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_sales',set_value('id_sales', isset($default['id_sales']) ? $default['id_sales'] : ''),'id="id_sales" class="form-control" placeholder="Masukkan id_sales"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan',set_value('keterangan', isset($default['keterangan']) ? $default['keterangan'] : ''),'id="keterangan" class="form-control" placeholder="Masukkan keterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('ref : ','ref',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('ref',set_value('ref', isset($default['ref']) ? $default['ref'] : ''),'id="ref" class="form-control" placeholder="Masukkan ref"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="table-detail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                    
                                                 
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                 
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="5" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('id_bayar : ','id_bayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('id_bayar',set_value('id_bayar', isset($default['id_bayar']) ? $default['id_bayar'] : ''),'id="id_bayar" class="form-control" placeholder="Masukkan id_bayar"'); ?>
                                </div>
                            </div>
                               
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('status',set_value('status', isset($default['status']) ? $default['status'] : ''),'id="status" class="form-control" placeholder="Masukkan status"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('totalbayar : ','totalbayar',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('totalbayar',set_value('totalbayar', isset($default['totalbayar']) ? $default['totalbayar'] : ''),'id="totalbayar" class="form-control" placeholder="Masukkan totalbayar"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('pajak : ','pajak',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('pajak',set_value('pajak', isset($default['pajak']) ? $default['pajak'] : ''),'id="pajak" class="form-control" placeholder="Masukkan pajak"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('biaya_lain : ','biaya_lain',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('biaya_lain',set_value('biaya_lain', isset($default['biaya_lain']) ? $default['biaya_lain'] : ''),'id="biaya_lain" class="form-control" placeholder="Masukkan biaya_lain"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('grandtotal : ','grandtotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('grandtotal',set_value('grandtotal', isset($default['grandtotal']) ? $default['grandtotal'] : ''),'id="grandtotal" class="form-control" placeholder="Masukkan grandtotal"'); ?>
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
            


 