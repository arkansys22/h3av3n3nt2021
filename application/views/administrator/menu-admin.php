        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            <?php $usr = $this->model_app->view_where('users', array('username'=> $this->session->username))->row_array();
                  if (trim($usr['foto'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['foto']; } ?>
            <img src="<?php echo base_url(); ?>/asset/foto_user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php echo "<p>$usr[nama_lengkap]</p>"; ?>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <span class='uppercase'><?php echo $this->session->level; ?></span></li>
            <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <?php
                $cek=$this->model_app->umenu_akses("kategori_pt",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
                    echo "
                    <li><a href='".base_url()."administrator/identitaswebsite'><i class='fa fa-dashboard'></i><span>Data Website</span></a></li>
                    <li class='treeview'>

                      <a href='#'><i class='fa fa-location-arrow'></i> <span>Layanan</span><i class='fa fa-angle-left pull-right'></i></a>
                      <ul class='treeview-menu'>
                      <li><a href='".base_url()."administrator/kategori_pt'><i class='fa fa-circle-o'></i> Kategori Layanan</a></li>
                      <li><a href='".base_url()."administrator/list_pt'><i class='fa fa-circle-o'></i>List Layanan</a></li>
               </ul>
            </li>";
                }
              ?>
              <?php
              if($cek==1 OR $this->session->level=='kontributor'){
                echo "
                <li><a href='".base_url()."administrator/testimoni'><i class='fa fa-rocket'></i> <span>Testimoni</span></a></li>
                <li class='treeview'><a href='".base_url()."administrator/listpromo'><i class='fa fa-gift'></i>Foto Slide</a></li>
                <li><a href='".base_url()."administrator/listgaleri'><i class='fa fa-file-photo-o'></i> <span>Galeri Foto</span></a></li>
                <li><a href='".base_url()."administrator/listvideo'><i class='fa fa-file-photo-o'></i> <span>Galeri Video</span></a></li>
                 <li><a href='".base_url()."administrator/listblog'><i class='fa fa-newspaper-o'></i> <span>Blog</span></a></li>
                ";
              }
            ?>
            <?php
              if($cek==1 OR $this->session->level=='admin'){
                echo "
                <li><a href='".base_url()."administrator/testimoni'><i class='fa fa-rocket'></i> <span>Testimoni</span></a></li>
                <li class='treeview'><a href='".base_url()."administrator/listpromo'><i class='fa fa-gift'></i>Foto Slide</a></li>
                <li><a href='".base_url()."administrator/listgaleri'><i class='fa fa-file-photo-o'></i> <span>Galeri Foto</span></a></li>
                <li><a href='".base_url()."administrator/listvideo'><i class='fa fa-file-photo-o'></i> <span>Galeri Video</span></a></li>
                 <li><a href='".base_url()."administrator/listblog'><i class='fa fa-newspaper-o'></i> <span>Blog</span></a></li>
                ";
              }
            ?>
            <?php
                $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
                if($cek==1 OR $this->session->level=='admin'){
            echo"<li class='treeview'>
              <a href='#'><i class='fa fa-users'></i> <span>Modul Users</span><i class='fa fa-angle-left pull-right'></i></a>
              <ul class='treeview-menu'>
              <li><a href='".base_url()."administrator/manajemenuser'><i class='fa fa-circle-o'></i> Manajemen User</a></li>

              </ul>
            </li>";
                }
              ?>

            <li><a href="<?php echo base_url(); ?>administrator/edit_manajemenuser/<?php echo $this->session->username; ?>"><i class="fa fa-edit"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>
