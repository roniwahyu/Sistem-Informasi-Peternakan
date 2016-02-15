 

                    <div id="form_input" class="row">
                    <?php echo form_open(base_url().'purchase_request/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            <input type="hidden" value='<?php echo $hash['token']; ?>' id="token" name="token">
                            
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
                            
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                   
                             <div class="form-group">
                                <?php echo form_label('Mitra : ','id_mitra',array('class'=>'control-label')); ?>
                                 <div class="input-group"><span class="input-group-btn">
                                            <a href="#" class="add_mitra btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                        </span>
                                <div class="controls">
                                <?php $mitra = isset($default['id_mitra'])? $default['id_mitra'] : '1';  ?>
                                <?php echo form_dropdown('id_mitra',$opt_mitra,$mitra,'id="id_mitra" class="form-control" placeholder="Enter id_mitra"'); ?>
                                                                </div>
                                    </div>
                            </div>

                           
                        
                        
                           <div class="form-group">
                                        <?php echo form_label('Gudang : ','id_gudang',array('class'=>'control-label')); ?>
                                         <div class="input-group">
                                           <span class="input-group-btn">
                                                    <a href="#" class="add_gudang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                                </span> 
                                           
                                        <div class="controls">
                                        <?php $gudang = isset($default['id_gudang'])? $default['id_gudang'] : '1';  ?>
                                        <?php echo form_dropdown('id_gudang',$opt_gudang,$gudang,'id="id_gudang" class="form-control" placeholder="Enter id_gudang"'); ?>
                                        
                                        </div> 
                                        </div>
                                    </div>  
                        
                          
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                              <div class="form-group">
                                                    <?php echo form_label('Kandang : ','id_kandang',array('class'=>'control-label')); ?>
                                                     <div class="input-group">
                                                        <span class="input-group-btn">
                                                                <a href="#" class="add_kandang btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                                            </span>
                                                    <div class="controls">
                                                    <?php $kandang = isset($default['id_kandang'])? $default['id_kandang'] : '1';  ?>
                                                    <?php echo form_dropdown('id_kandang',$opt_kandang,$kandang,'id="id_kandang" class="form-control" placeholder="Enter id_kandang"'); ?>
                                                                                    </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                 <div class="checkbox i-checks">
                                                    <label for="is_approved" style="padding-left:0px;"> 
                                                        <?php 
                                                        $checkbox = array(
                                                            'name'        => 'is_approved',
                                                            'value'       => $default['is_approved'],
                                                            'checked'     => set_checkbox('is_approved', $default['is_approved'],0));
                                                            echo form_checkbox($checkbox);
                                                         ?>
                                                        <i></i> &nbsp; Setujui
                                                    </label>
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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                        
                            <div class="panel_tambah panel panel-danger">
                                    <div class="panel-body panel-heading">
                                        <div class="tambah row">
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                             
                                                <div class="form-group">
                                                    <?php echo form_label('Barang: ','id_barang',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_barang',$opt_barang,'','id="id_barang" class="form-control input-lg select2" placeholder="Ayam"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Jumlah: ','jumlah',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('jumlah',set_value('jumlah', isset($default['jumlah']) ? $default['jumlah'] : ''),'id="jumlah" class="form-control input-lg text-right" placeholder="Jumlah"'); ?>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Satuan: ','id_satuan',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_dropdown('id_satuan',$opt_satuan,'','id="id_satuan" class="form-control input-lg" placeholder="id_satuan"'); ?>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                
                                                <div class="form-group">
                                                    <?php echo form_label('Keterangan: ','ket_detail',array('class'=>'control-label')); ?>
                                                    <div class="controls">
                                                    <?php echo form_input('ket_detail',set_value('ket_detail', isset($default['ket_detail']) ? $default['ket_detail'] : ''),'id="ket_detail" class="form-control input-lg" placeholder="Keterangan Barang"'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                                                <?php echo form_label('Tambah','',array('class'=>'control-label')); ?>

                                               <a href="#" class="btn-add-req btn btn-lg btn-block btn-primary"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table id="data" class="tablereq table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                      
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="6" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                        </div>
                        <?php if($hash['token']==$this->session->userdata['secureit']): ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php 
                            $new=$hash['new'];
                            $edit=$hash['edit'];
                            // print_r($this->session->userdata($new)); ?>
                            <?php if($this->session->userdata($new)==true && $this->session->userdata($edit)==false ): ?>
                                <button data-toggle="modal" href="#modal-notif" id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                <a href="#" id="cancel" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal Tambah</a>
                            <?php elseif($this->session->userdata($new)==false && $this->session->userdata($edit)==true): ?>
                                <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" data-faktur="<?php echo $default['faktur'] ?>"class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    <?php echo form_close();?>
                    </div>
            
<?php 
$array = array($new => '', $edit => '','secureit'=>'');
$this->session->unset_userdata($array); ?>

 