<?php
    if($admin['akses']=='admin'){
        admin();
    }else {
        kasir();
    }
?>
<?php function admin(){?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="admin/dist/img/admin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Dimas Seto</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="GET" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="?page=dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                <i class="fa fa-cogs"></i><span>Module</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right">4</span>
                </span>
            </a>

                <ul class="treeview-menu">
                   <li>
                        <a href="?page=artikel">
                          <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=gallery">
                      <i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span>
                    </a>
                    </li>
                    <li>
                        <a href="?page=testimoni">
                      <i class="fa fa-comment-o" aria-hidden="true"></i><span>Testimoni</span>
                    </a>
                    </li>
                    <li>
                        <a href="?page=album">
                        <i class="fa fa-picture-o" aria-hidden="true"></i><span>Album</span>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Toko Online</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="label label-primary pull-right">6</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?page=member">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Member</span>
                        </a> 
                    </li>
                    <li>
                        <a href="?page=konfirmasi">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            <span>konfirmasi</span>
                        </a> 
                    </li>
                    <li>
                        <a href="?page=distributor">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <span>Fotographer</span>
                        </a> 
                    </li>
                    <li>
                        <a href="?page=pasok">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <span>Pasok</span>
                        </a> 
                    </li>
                    <li>
                        <a href="?page=penjualan">
                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                            <span>Penjualan</span>
                        </a> 
                    </li>
                    <li>
                        <a href="?page=kasir">
                                <i class="fa fa-desktop" aria-hidden="true"></i>
                            <span>Kasir</span>
                        </a> 
                    </li>
                </ul>
            </li>
             
            <li class="">
                <a href="?page=metadata">
            <i class="fa fa-terminal" aria-hidden="true"></i><span>Metadata</span>
          </a>
            </li>
            <li class="">
                <a href="?page=navigasi">
            <i class="fa fa-bars" aria-hidden="true"></i><span>Navigasi</span>
          </a>
            </li>
            <li class="">
                <a href="?page=pesan">
            <i class="fa fa-envelope" aria-hidden="true"></i><span>Pesan</span>
          </a>
            </li>
            <li class="">
                <a href="?page=subscribe">
            <i class="fa fa-heart" aria-hidden="true"></i><span>Subscribe</span>
          </a>
            </li>
            <li class="">
                <a href="?page=contact">
            <i class="fa fa-map" aria-hidden="true"></i><span>Contact</span>
          </a>
            </li>
            <li class="">
                <a href="home">
            <i class="fa fa-globe" aria-hidden="true"></i><span>Lihat Web</span>
          </a>
            </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>
<?php }?>
<?php function kasir(){?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="admin/dist/img/admin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Dimas Seto</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="GET" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="?page=dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?page=member">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Member</span>
                </a> 
            </li>
            <li>
                <a href="?page=pesanan">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span>Pesanan</span>
                </a> 
            </li>
            <li>
                <a href="?page=distributor">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <span>Fotographer</span>
                </a> 
            </li>
            <li>
                <a href="?page=pasok">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <span>Pasok</span>
                </a> 
            </li>
            <li>
                <a href="?page=penjualan">
                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                    <span>Penjualan</span>
                </a> 
            </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>
<?php }?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>

