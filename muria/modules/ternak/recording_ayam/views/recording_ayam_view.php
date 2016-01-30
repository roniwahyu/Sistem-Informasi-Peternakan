<div class="wrapper wrapper-content animated slideInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Recording Ayam</h5>

                    
                    <div class="ibox-tools">
                        <?php if(!empty($submodule)): ?>
                        <a href="<?php echo base_url('recording_ayam/baru/'.$submodule) ?>" class="btn btn-xs btn-primary close-link"><i class="fa fa-plus"></i> Faktur Baru</a>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="ibox-content">
                    <?php 
                        if(!empty($view)):
                            $this->load->view($view);
                        else:
                            $this->load->view('recording_ayam_table');
                        endif;
                    ?>


                    </div>
                </div>
                </div>
               
            </div>
          
            
</div>
<div class="modal animated slideInRight" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Detail recording_ayam</h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<div class="modal animated slideInDown" id="modal-akun">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal animated slideInLeft" id="modal-notif">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">Recording Ayam </h3>
                      </div>
                <div class="panel-body">
                   <div class="alert alert-success">
                       <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                       <strong>Berhasil</strong> Recording Ayam Berhasil disimpan ...
                   </div>
                   <div class="text-center">                   
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                   </div>
                </div>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->