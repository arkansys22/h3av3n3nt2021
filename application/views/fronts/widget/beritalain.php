<div class="tabs-wrapper">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">BERITA LAIN</a></li>
    </ul>
    <!-- Tab panels one -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">
          <?php $start = 0;
    foreach ($post_new_random as $post_new)
    {
      $jdl = character_limiter($post_new->judul,50);
    ?>
            <div class="most-viewed">
                <ul id="most-today" class="content tabs-content">
                    <li><span class="count"><?php echo ++$start ?></span><span class="text"><a href="<?php echo base_url("$post_new->judul_seo ") ?>"><?php echo $jdl ?></a></span></li>

                </ul>
            </div>
        </div>
        <?php } ?>
            </div>
        </div>
    </div>
</div>
