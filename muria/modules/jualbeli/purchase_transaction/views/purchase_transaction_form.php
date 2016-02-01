 <!-- Second tab content -->
 
<div class="tab-pane active fade in" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-th"></i> Form Transaksi Pembelian</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="fa fa-database"></i> Data Tranksasi Pembelian</a>
                <a class="btn btn-info reset" href="#" ><i class="fa fa-refresh"></i> Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <?php $this->load->view('form_transaksi_beli') ?>

                
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
