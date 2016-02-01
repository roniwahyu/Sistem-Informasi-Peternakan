<div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                       
                     
                    <div class="panel panel-primary">
                          <div class="panel-heading">
                                <h3 class="panel-title"><?php echo !empty($title)?$title:'Panel' ?></h3>
                          </div>
                          <div class="panel-body">
                                <?php if(!empty($forms)):
                                    $this->load->view($forms);
                                    endif;
                                 ?>
                          </div>
                    </div>
                </div> 
            </div>
            
</div>

