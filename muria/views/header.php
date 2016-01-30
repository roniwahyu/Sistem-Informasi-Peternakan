 
 <div class="top-navigation">

                <nav class="navbar navbar-static-top" role="navigation">

                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <i class="fa fa-reorder"></i>
                        </button> 
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-minimalize minimalize-styl-2 btn btn-success" type="button">
                            <i class="fa fa-reorder"></i>
                        </button>
<!--                     <a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
 -->
                    </div>
                    <div style="height: 1px;" aria-expanded="false" class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav">
                             <li> <a data-module="inv" href="<?php echo domain() ?>inv">Inventory</a> </li>
                                <li> <a data-module="pos" href="<?php echo domain() ?>pos">Jual Beli</a> </li>
                                <li> <a data-module="fin" href="<?php echo domain() ?>fin">Keuangan</a> </li>
                                <li> <a data-module="acc" href="<?php echo domain() ?>acc">Akuntansi</a> </li>
                                <li> <a data-module="acc" href="<?php echo domain() ?>pay">Kepegawaian</a> </li>
                                <li> <a data-module="farm" href="<?php echo domain() ?>farm">Peternakan</a> </li>
                          
                            <!-- <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                    <li><a href="#">Menu item</a></li>
                                </ul>
                            </li> -->

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <?php if ($this->ion_auth->logged_in()):?> 
                                <li>
                                    <a href="<?php echo base_url('auth/logout') ?>">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                            <?php elseif(!$this->ion_auth->logged_in()): ?>
                                <li>
                                    <a href="<?php echo base_url('auth/login') ?>">
                                        <i class="fa fa-sign-in"></i> Login
                                    </a>
                                </li>
                            <?php endif; ?> 
                        </ul>
                    </div>
                </nav>
        
            </div>