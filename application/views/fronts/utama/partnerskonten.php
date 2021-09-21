<div class="gallery_main_div">
    <section class="gallery_page event_page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="section_head">
                        <h2>Events</h2>
                        <div class="bar-c">
                            <div id="bar-1" class="bar"></div>
                            <div id="bar-2" class="bar"></div>
                            <div id="bar-3" class="bar"></div>
                            <div id="bar-4" class="bar"></div>
                            <div id="bar-5" class="bar"></div>
                            <div id="bar-6" class="bar"></div>
                        </div>
                    </div>
                </div>
                <?php
                   foreach ($post_partners as $post) {
                 ?>

                <div class="event_main">
                    <div class="col-md-6 col-sm-12">
                        <div class="hm_event_img">
                            <img src="<?php echo base_url()?>asset/foto_partners/<?php echo $post->gambar?>" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12">
                        <div class="hm_event_right_part">
                            <h2><?php echo $post->judul?></h2>
                            <h4>Start At <i class="fa fa-calendar"></i><?php echo $post->tgl_event?></h4>
                            <?php echo $post->konten?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php } ?>


            </div>
        </div>
    </section>
</div>
<!--  event part end -->

<!-- back to top button -->
<a href="#" class="back-top-btn"><span class="glyphicon glyphicon-menu-up"></span></a>
