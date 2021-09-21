<nav class="navbar navbar-default navbar-sticky navbar-mobile bootsnav">
<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">

            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>

            <?php echo form_open('berita/cari_berita', array('class' => 'form_search')) ?>
        <form  class="searchform" id="searchform" method="get">
          <?php echo form_input(array('class'  => 'form-control', 'name'  => 'cari_berita','placeholder'  => 'Cari Berita ....')) ?>
          <input type="submit" value="Search" id="submit" class="submit"><?php echo form_open('berita/cari_berita', array('class' => 'nav-search')) ?>
        </form>
        </div>
    </div>
</div>
<!-- End Top Search -->
<div class="container">
    <!-- Start Atribute Navigation -->
    <div class="attr-nav">
        <ul>
            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
        </ul>
    </div>
    <!-- End Atribute Navigation -->
    <!-- Start Header Navigation -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
             <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo base_url()?>"><img src="<?php echo base_url()?>asset/frontend/BANYUWANGI.png" class="logo" alt=""></a>
    </div>
    <!-- End Header Navigation -->

<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
      <li class="home_item current_item"><a href="<?php echo base_url("") ?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo base_url("berita/kategori/daerah") ?>">Daerah</a></li>
      <li><a href="<?php echo base_url("berita/kategori/nasional") ?>">Nasional</a></li>
      <li><a href="<?php echo base_url("berita/kategori/olahraga") ?>">Olahraga</a></li>
      <li><a href="<?php echo base_url("berita/kategori/politik") ?>">Politik</a></li>      
      <li><a href="<?php echo base_url("berita/kategori/wisata") ?>">Wisata</a></li>
    </ul>
</div>

</div>
</nav>
