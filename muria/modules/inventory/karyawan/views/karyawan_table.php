
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar Karyawan</a></li>
            <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah Karyawan Baru</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Daftar Karyawan</h6> 
                                <div class="btn-group pull-right">
                                    <a href="#outside" data-toggle="tab" class="baru btn btn-success"><i class="icon-plus"></i> Tambah Karyawan Baru</a>
                                </div> 
                            </div>
                            <?php $this->load->view('karyawan_data') ?>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('karyawan_form') ?>

            </div>
    </div>
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="pull-right btn btn-md btn-warning" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body" style="">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-warning" data-dismiss="modal">Close</button>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                

