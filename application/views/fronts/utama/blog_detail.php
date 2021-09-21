<div class="single-post">
		<div class="container">
				<div class="post-content text-center">
						<ul class="breadcrumb">
								<li><a href="<?php echo base_url()?>">Home</a></li>
								<li class=""><a href="<?php echo base_url("blogs")?>">Blog</a></li>
								<li class="active"><a href="#"><?php echo $post_news->judul?></a></li>
						</ul>
					 <div class="heading-content">
							 <p><?php echo tgl_indo($post_news->tanggal)?> <?php echo $post_news->jam?>
							 <h3><?php echo $post_news->judul?></h3></p>
							 <div class="post-element v3">
										<div class="post-date">by : <?php echo $post_news->username?></div>
										<div class="post-date post-author"><?php echo $post_news->views?> views</div>
										<div class="post-date post-author"><i class="fa fa-share-alt"></i></div>
								</div>
					 </div>
					 <div class="single-post-content">
							 <a href="#" class="hover-images"><img src="<?php echo base_url()?>asset/foto_blogs/<?php echo $post_news->gambar?>" alt="" class="img-responsive"></a>
							 <div class="content-width v1">
									 <p><?php echo $post_news->konten?></p>
							 </div>


					 </div>
				</div>
		</div>
		<div class="related-post">
				<h3 class="text-center">Similar post</h3>
				<div class="container">
						<div class="owl-carousel owl-theme js-owl-blog">
							<?php
								 foreach ($post_popular as $post_new) {
							 ?>

								<div class="blog-item">
										<div class="post-img"><a class="hover-images"><img src="<?php echo base_url()?>asset/foto_blogs/<?php echo $post_new->gambar?>" alt="" class="img-responsive"></a></div>
										<div class="post-info v2">
												<h3 class="post-title v3"><a href="<?php echo base_url("blogs/$post_new->judul_seo ")?>"><?php echo $post_new->judul?></a></h3>
												<div class="post-element">
														<div class="post-date"><?php echo tgl_indo($post->tanggal)?> <?php echo $post->jam?></div>
														<div class="post-date post-author"><?php echo $post_new->views?> Views</div>
												</div>
										</div>
								</div>
						<?php } ?>
						</div>
				</div>
		</div>
</div>
