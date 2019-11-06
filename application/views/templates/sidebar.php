<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="<?=base_url()?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="<?=base_url()?>assets/images/logo-light-icon3.png" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                <img src="<?=base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->    
                <img src="<?=base_url()?>assets/images/logo-light-text1.png" class="light-logo" alt="homepage" />
                
            </span> 
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- Messages -->
                <!-- ============================================================== -->
                <?php
                $role = $this->session->userdata('role_id');
                if($role == 1 || $role == 2){
                    // admin atau direktur 
                    $notif = $this->db->get_where('suratmasuk',['status' => 0])->result();

                } elseif($role == 3) {
                    // wadir
                    $jabatan = $this->session->userdata('jabatan_id');
                    $query = "SELECT `suratmasuk`.* from `suratmasuk`, `dispo_direktur` where `suratmasuk`.`id` = `dispo_direktur`.`surat_masuk_id` and `dispo_direktur`.`wadir_id` = $jabatan and `suratmasuk`.`dispo_direktur_id` = 0 and `suratmasuk`.`status` = 2";
                    $notif = $this->db->query($query)->result();
                } elseif($role == 4){
                    //pimpinan
                    $jabatan = $this->session->userdata('jabatan_id');
                    $query = "SELECT `suratmasuk`.* from `suratmasuk`, `dispo_wadir` where `suratmasuk`.`id` = `dispo_wadir`.`surat_masuk_id` and `dispo_wadir`.`pimpinan_id` = $jabatan and `suratmasuk`.`dispo_wadir_id` = 0 and `suratmasuk`.`status` = 2";
                    $notif = $this->db->query($query)->result();
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                        <?php if($notif) : ?>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                        <ul>
                            <?php if($notif) : ?>
                            
                            <li>
                                <div class="drop-title">Ada <?= count($notif) ?> Surat Baru</div>
                            </li>
                                <?php foreach ($notif as $s) : ?>
                                
                                <li>
                                    <div class="message-center">
                                        <!-- Message  -->
                                        <a href="#">
                                            <div class="user-img"> <img style="background : black" src="<?=base_url()?>assets/images/logo-light-icon3.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5><?= $s->pengirim ?></h5> <span class="mail-desc"><?= $s->perihal ?></span> <span class="time"><?= $s->tgl_surat ?></span> </div>
                                        </a>
                                        
                                    </div>
                                </li>

                                <?php endforeach ?>                            
                            <?php else : ?>

                                <li>
                                    <div class="drop-title">Tidak ada surat baru</div>
                                </li>
                            <?php endif ?>
                           
                        </ul>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>assets/images/users/profile.png" alt="user" class="profile-pic" />
                    
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?=base_url()?>assets/images/users/profile.png" alt="user"></div>
                                    <div class="u-text">
                                        <h4><?= $this->session->userdata['username']; ?></h4>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url('profile'); ?>"><i class="ti-user"></i> Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url('auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>                
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <!-- <div class="user-profile" style="background: url(<?=base_url()?>assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image --!
            <div class="profile-img"> <img src="<?=base_url()?>assets/images/users/profile.png" alt="user" /> 
            </div>            
        </div> -->
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <?php $role_id = ($this->session->userdata('role_id')); ?> 

        <nav class="sidebar-nav">
        
            <ul id="sidebarnav">         
                <li class="nav-small-cap">Main menu</li>
                <?php if($role_id=='1'){ ?> 
                <li> 
                    <a class="" href="<?= base_url('admin/Dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Dashboard</span></a>
                    
                </li>
                <?php } ?>

            <?php if($role_id=='1') { ?> 
                <li> 
                    <a class="has-arrow" href="<?= base_url('admin/suratmasuk/index'); ?>" aria-expanded="false">
                    <i class="mdi mdi-bullseye"></i><span class="hide-menu">Surat Masuk </span></a>
                </li>
                <?php } ?>

                <!-- <?php if($role_id=='1') { ?> 
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="<?= base_url('admin/disposisi/index'); ?>" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Disposisi</span></a>
                </li>
                <?php } ?> -->

                <?php if($role_id=='1') { ?> 
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">User</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('admin/user/index'); ?>">User</a></li>
                        <li><a href="<?= base_url('admin/jabatan/index'); ?>">Jabatan</a></li>
                    </ul>
                </li>
                <?php } ?>

                <?php if($role_id == '1' ) { ?> 
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Rekapitulasi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('admin/rekap/approve'); ?>">Diterima</a></li>
                        <li><a href="<?= base_url('admin/rekap/pending'); ?>">Proses</a></li>
                    </ul>
                </li>
                 <?php } ?>

                

                 <!-- diretur -->
                <?php if($role_id=='2') { ?> 
                <li> 
                    <a class="" href="<?= base_url('direktur/disposisi/index'); ?>" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Disposisi </span></a>
                </li>
                <?php } ?>

                <?php if($role_id == '2' ) { ?> 
                <li> 
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Rekapitulasi</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('admin/rekap/approve'); ?>">Diterima</a></li>
                        <li><a href="<?= base_url('admin/rekap/pending'); ?>">Proses</a></li>
                    </ul>
                </li>
                 <?php } ?>



                <!-- wadir -->
                <?php if($role_id=='3') { ?> 
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="<?= base_url('wadir/disposisi/index'); ?>" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Disposisi</span></a>
                </li>
                <?php } ?>

                <!-- <?php if($role_id=='3'){ ?> 
                <li>  -->
                    <!-- <a class="" href="<?= base_url('Dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Pelaporan</span></a> -->
                    <!-- <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Disposisi</a></li>
                    </ul> -->
                <!-- </li>
                <?php } ?> -->


                <!-- pimpinan -->
                <?php if($role_id=='4') { ?> 
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="<?= base_url('pimpinan/disposisi/index'); ?>" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">Disposisi</span></a>
                </li>
                <?php } ?>
            </ul>
            
        </nav>
        
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Proyek Akhir | Aplikasi Pengelolaan Arsip Surat Disposisi
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->