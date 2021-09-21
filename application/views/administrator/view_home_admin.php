  <a style='color:#000' href='<?php echo base_url(); ?>administrator/list_pt'>
  <div class="col-md-5 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-suitcase"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Layanan</span>
        <?php $jmla = $this->model_app->view('vendor_tbl')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  
  <a style='color:#000' href='<?php echo base_url(); ?>administrator/listpromo'>
  <div class="col-md-5 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Foto Slide</span>
        <?php $jmld = $this->model_app->view('promo_tbl')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmld; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>
  <a style='color:#000' href='<?php echo base_url(); ?>administrator/listblog'>
  <div class="col-md-5 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Blog</span>
        <?php $jmld = $this->model_app->view('blogs_tbl')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmld; ?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>
