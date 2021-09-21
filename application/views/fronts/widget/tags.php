<div class="panel_inner categories-widget">
    <div class="panel_header">
        <h4><strong>TAGS</strong> </h4>
    </div>
    <div class="panel_body">
        <ul class="category-list">
          <?php
foreach ($get_all_tag_sidebar as $tag_sidebar)
{
?>
            <li><a href="#"><?php echo anchor('berita/tag/'.$tag_sidebar->tag_seo.'',''.$tag_sidebar->nama_tag.'') ?> </a></li>
<?php } ?>
        </ul>
    </div>
</div>
