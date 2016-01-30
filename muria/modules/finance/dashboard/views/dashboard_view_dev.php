<div class="wrapper wrapper-content">
     
        
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Orders</h5>
                              
                            </div>
                            <div class="ibox-content ">
                                <div class="row">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>AJax</h5>
                              
                            </div>
                            <div class="ibox-content ajax">
                                <div class="btn-group">
                                <a class="btn btn-info btn-lg" href="#" data-load-remote="http://sim.muriaps.com/inv/barang/getone/1" data-remote-target="#ajax-remote">GET AJAX</a>
                                <a class="reseter btn btn-primary btn-lg" href="#" data-load="http://sim.muriaps.com/inv/gudang/getdatatables" data-table="http://sim.muriaps.com/inv/gudang/tables" data-remote-target="#ajax-remote">GET TABLE</a>
                                </div>
                                <div id="ajax-remote" class="row">
                                        
                                </div>
                            
                            </div>
                        </div>
                    </div>
        </div>
</div>
<a class="btn btn-primary" data-toggle="modal" data-load-remote="http://sim.muriaps.com/inv/barang/getone/1" data-remote-target="#modal-id .modal-body" href='#modal-id'>Trigger modal</a>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
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