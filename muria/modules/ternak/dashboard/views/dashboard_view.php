<div class="wrapper wrapper-content">
    <div class="row">
    <?php $this->load->view('dashboard_widget') ?>

    </div>
        
        <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Tabel</h5>
                              
                            </div>
                            <div class="ibox-content ajax">
                                <div id="ajax-remote" class="row">
                                        
                                </div>
                            
                            </div>
                        </div>
                    </div>
        </div>
</div>
<!-- <a class="btn btn-primary" data-toggle="modal" data-load-remote="http://sim.muriaps.com/inv/barang/getone/1" data-remote-target="#modal-id .modal-body" href='#modal-id'>Trigger modal</a> -->

<div class="modal fade" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Recording</h3>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->