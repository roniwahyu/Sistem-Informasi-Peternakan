<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Beli</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php $this->load->view('beli_table') ?>


                    </div>
                </div>
                </div>
               
            </div>
            <div class="row">
                <div class="panel panel-primary">
                      <div class="panel-heading">
                            <h3 class="panel-title">Panel</h3>
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

