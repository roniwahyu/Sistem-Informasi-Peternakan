<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo !empty($title)?$title:'' ?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php if(!empty($view)): 
                            $this->load->view($view);
                       endif; 
                       ?>
                    </div>
                </div>
                </div>
               
            </div>
          
            
</div>
<div class="row">
    
</div>
