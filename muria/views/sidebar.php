
<nav class="navbar-default navbar-static-side animated slideInLeft" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <!-- <img alt="image" style="width:100px;" class="img-circle" src="<?php //echo assets_url() ?>/images/pemkot.png" /> -->
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php if ($this->ion_auth->logged_in()): ?>
                                 <?php $user = $this->ion_auth->user()->row(); ?>
                                    <?php if ( ! empty($user)): ?>
                            <span class="clear"> <span class="text-muted text-xs block m-t-xs"><strong class="font-bold"><?php echo $user->id." ".$user->first_name." ".$user->last_name; ?></strong><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
                            </ul>
                        <?php endif;endif; ?>
                        </div>
                        <div class="logo-element">
                            SIM MURIA PS
                        </div>
                    </li>
                  
                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li class="active"><a href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                            <!--<li ><a href="dashboard_2.html">Dashboard v.2</a></li>
                            <li ><a href="dashboard_3.html">Dashboard v.3</a></li>
                            <li ><a href="dashboard_4_1.html">Dashboard v.4</a></li> -->
                        </ul>
                    </li>
                    
                    <?php 
                    if ($this->ion_auth->logged_in()):
                        $user = $this->ion_auth->user()->row();
                            if ( ! empty($user)):
                                $userid=$user->id;
                            $usergroup=$this->ion_auth->get_users_groups($user->id)->result();
                        // $this->ion_auth->get_users_groups($userid)->row()->id
                        foreach ($usergroup as $k => $v) {
                            # code...
                            // print_r($v->id);
                            $group[]=$v->id;
                        }

                        endif;
                    endif;

                        $module=$this->session->userdata('module');
                        
                        $mainmenu=$this->menu_model->getmenus(0,$group,$module);

                        if(!empty($mainmenu)): 
                            // echo domain();
                            foreach ($mainmenu as $key => $value) {
                                    # code...
                                $child=$this->menu_model->getchild($value['id']);

                                echo "<li><a href='".domain().$value['module']."/".$value['url']."' title='".$value['title']."'><i class='fa fa-sitemap'></i>";
                                if(empty($child)){
                                    echo "".$value['title']."</a></li>";
  
                                }elseif(!empty($child)||$child!=null){
                                    echo "<span class='nav-label'>".$value['title']."</span><span class='fa arrow'></span></a>";
                                    echo "<ul class='nav nav-second-level'>";
                                    foreach ($child as $k => $v){
                                        // echo "<li><a href='".$v['url']."'>".$v['title']."</a>";
                                        $grandchild=$this->menu_model->getchild($v['id']);
                                            $url3=domain().$v['module']."/".$v['url']."/";
                                             $isajax=$v['is_ajax_url'];
                                             $isactive=$v['is_active'];
                                             // print_r($isactive);
                                            if($isajax=='0'):
                                                if($isactive=='1'):
                                                    echo "<li><a href='".$url3."' title='".$v['title']."'>".$v['title'];
                                                else:
                                                    echo "<li class='disabled'><a href='#' title='".$v['title']."'>".$v['title'];
                                                endif;
                                            else:
                                                if($isactive=='1'):
                                                    echo '<li><a class="" href="#" title="'.$v['title'].'" data-load="'.$url3.'getdatatables" data-table="'.$url3.'tables" data-remote-target="#ajax-remote">'.$v['title'].'</a>';
                                                else:
                                                    echo '<li class="disabled"><a class="" href="#" title="'.$v['title'].'" data-load="'.$url3.'getdatatables" data-table="'.$url3.'tables" data-remote-target="#ajax-remote">'.$v['title'].'</a>';
                                                endif;
                                            endif;
                                            
                                            if(empty($grandchild)){
                                                echo "</a></li>";
              
                                            }elseif(!empty($grandchild)||$grandchild!=null){
                                                echo "</a>";
                                                echo "<ul class='nav nav-third-level'>";
                                                foreach ($grandchild as $kunci => $val){
                                                    $url=domain().$val['module']."/".$val['url']."/";
                                                    $isajax=$val['is_ajax_url'];
                                                    if($isajax=='0'):
                                                        echo "<li><a href='".$url."' title='".$val['title']."'>".$val['title']."</a>";
                                                    else:
                                                        echo '<li><a class="" title="'.$val['title'].'" href="#" data-load="'.$url.'getdatatables" data-table="'.$url.'tables" data-remote-target="#ajax-remote">'.$val['title'].'</a></li>';
                                                    endif;
                                                }
                                                echo "</ul>";
                                                echo "</li>";

                                            }   
                                    }
                                    echo "</ul>";
                                    echo "</li>";

                                }
                            }    
                        endif; ?>
                </ul>
               
            </div>
        </nav>
  