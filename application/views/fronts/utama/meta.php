<title><?php echo $headers?><?php echo $post_news->judul?> <?php echo $identitas->nama_website ?> <?php echo $identitas->no_telp ?></title>
<meta name="title" content="<?php echo $headers?><?php echo $identitas->nama_website?> <?php echo $identitas->no_telp ?><?php echo $post_news->judul ?>">
<meta name="site_url" content="<?php echo base_url()?><?php echo $url?><?php echo $post_news->kategori_seo ?><?php echo $post_news->judul_seo ?>">
<meta name="description" content="<?php echo $identitas->nama_website ?> <?php echo $identitas->meta_deskripsi ?><?php echo $headers?><?php echo $post_news->meta_desc?>">
<meta name="keywords" content="<?php echo $identitas->meta_keyword ?><?php echo $tag2?><?php echo $post_news->tag?>">
<meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="web_author" content="arkansys.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="shortcut icon" href="<?php echo base_url()?>asset/images/favicon-heaven-01.png" type="image/x-icon">
<meta property="og:site_name" content="<?php echo $headers?> <?php echo $identitas->nama_website ?> <?php echo $identitas->whatsapp ?>">
<meta property="og:title" content="<?php echo $headers?> <?php echo $identitas->nama_website ?> <?php echo $identitas->whatsapp ?><?php echo $post_news->judul ?>">
<meta property="og:description" content="<?php echo $identitas->nama_website ?> <?php echo $identitas->meta_deskripsi ?><?php echo $headers?><?php echo $post_news->meta_desc?>">
<meta property="og:url" content="<?php echo base_url()?><?php echo $url?><?php echo $post_news->kategori_seo ?><?php echo $post_news->judul_seo ?>">
<?php $this->load->view('fronts/utama/gambar')?>
<meta property="og:type" content="article">
<meta name="google-site-verification" content="uXi8N_lSHSnx0LQZnsN_hbeCEmIOMrGbPgfh3Mw8Y_s" />
