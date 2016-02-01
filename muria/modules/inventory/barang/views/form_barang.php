 
<!-- <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none"> -->
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="fa fa-warning"></i> <strong>Perhatian!</strong> <br>
        <p>Penambahan Barang pada form ini merupakan penambahan barang secara sederhana, silakan klik <a class="btn btn-xs btn-warning" data-dismiss="modal" href="<?php echo base_url('barang') ?> ">Detail</a> untuk penambahan barang lebih detail</p>
</div>
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'barang/submit',array('id'=>'form_barang','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="id" name="id">
                             <div class="form-group">
                                <?php echo form_label('Supplier: ','id_supplier',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_dropdown('id_supplier',$opt_supplier,'','id="id_supplier" class="form-control" placeholder="Enter id_supplier"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Kategori Barang: ','id_golongan',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" class="add_kategori btn btn-default" type="button"><i class="fa fa-plus"></i></a>
                                    </span>
                                <div class="controls">
                                <?php echo form_dropdown('id_golongan',$opt_kategori,'','id="id_golongan" class="form-control" placeholder="Enter id_golongan"'); ?>
                                </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                             <div class="form-group">
                                <?php echo form_label('Kode : ','Kode',array('class'=>'control-label')); ?>
                                <div class="input-group">
                                    <div class="controls">
                                    <?php echo form_input('Kode','','id="Kode" class="form-control" readonly placeholder="Enter Kode"'); ?>
                                    </div>
                                        <span class="input-group-btn">
                                            <a href="#" class="gen_kdbarang btn btn-info" type="button"><i class="fa fa-refresh"></i></a>
                                        </span>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Nama : ','Nama',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Nama','','id="Nama" class="form-control" placeholder="Enter Nama"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Keterangan : ','Keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Keterangan','','id="Keterangan" class="form-control" placeholder="Enter Keterangan"'); ?>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('Kemasan : ','Kemasan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kemasan','','id="Kemasan" class="form-control" placeholder="Enter Kemasan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi2 : ','Isi2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi2','','id="Isi2" class="form-control" placeholder="Enter Isi2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Isi3 : ','Isi3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Isi3','','id="Isi3" class="form-control" placeholder="Enter Isi3"'); ?>
                                </div>
                            </div>
                        
                           
                        
                           
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button  id="save_barang" type="submit" data-dismiss="modal" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <!-- <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a> -->
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                <!-- </div> -->


