<?php header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
     <loc><?php echo base_url();?></loc>
     <priority>1.0</priority>
  </url>
  <url>
     <loc><?php echo base_url(services);?></loc>
     <priority>0.5</priority>
  </url>
  <?php foreach($datakategori as $data) { ?>
  <url>
     <loc><?php echo base_url("services/").$data->kategori_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>
  <?php foreach($datavendor as $data) { ?>
  <url>
     <loc><?php echo base_url("detail/").$data->judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>
 
  <url>
     <loc><?php echo base_url(kontak);?></loc>
     <priority>0.5</priority>
  </url>
  
 
  <url>
     <loc><?php echo base_url(blogs);?></loc>
     <priority>0.5</priority>
  </url>
  <?php foreach($dataartikel as $data) { ?>
  <url>
     <loc><?php echo base_url("blogs/").$data->judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
  <?php } ?>


</urlset>
