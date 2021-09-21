<header id="header" class="header-v4 header-top-absolute">
		<div class="container">
				<div class="row">
						<div class="vow-topbar">
						  <div class="topbar-mobile-l hidden-lg hidden-md">
                            
                            <div class="element-mobile">
                                <a href="<?=$identitas->instagram ?>" target="_blank"><i class="ion-social-instagram f-24"></i></a>
                            </div>
                            <div class="element-mobile">
                                <a href="<?=$identitas->youtube ?>" target="_blank"><i class="ion-social-youtube f-16 f-style"></i></a>
                            </div>
                            
                            <div class="element-mobile">
                                <a href="https://api.whatsapp.com/send?phone=<?=$identitas->whatsapp ?>&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank"><i class="ion-social-whatsapp f-16 f-style"></i></a>
                            </div>
                            <div class="element-mobile">
                                <a href="https://api.whatsapp.com/send?phone=6281285562382&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank"><i class="ion-social-whatsapp f-16 f-style"></i></a>
                            </div>
                        </div>
                        

								<div class="topbar-left v4 hidden-xs hidden-sm">
								    <ul class="navbar-topbar-left">
                                <li><a href="<?=$identitas->instagram ?>" target="_blank">Instagram</a></li>
                                <li><a href="<?=$identitas->youtube ?>" target="_blank">Youtube</a></li>
                                
                                <li><a href="https://api.whatsapp.com/send?phone=<?=$identitas->whatsapp ?>&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank">WhatsApp 1</a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=6281285562382&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank">Whatsapp 2</a></li>
                            </ul>
										<div class="vow-icon-menu v4 js-menu hidden-xs hidden-sm">
												<span class="vow-iconbar"></span>
												<span class="vow-iconbar"></span>
												<span class="vow-iconbar"></span>
										</div>
								</div>
								<div class="topbar-right">
										<div class="logo v4"><a href="<?php echo base_url () ?>"><img src="<?php echo base_url()?>asset/images/<?=$identitas->logo ?>" alt="logo"></a></div>
										<button type="button" class="navbar-toggle vow-icon-menu v4 js-menu icon-mobile hidden-lg hidden-md" data-toggle="collapse" data-target="#myNavbar">
												<span class="vow-iconbar"></span>
												<span class="vow-iconbar"></span>
												<span class="vow-iconbar"></span>
										</button>
								</div>
						</div>
						<div class="vow-bottom">
										<nav class="main-menu v2 js-open-menu">
												<div class="collapse navbar-collapse" id="myNavbar">
														<ul class="nav navbar-nav js-menubar">
																<li class="level1 active dropdown"><a href="<?php echo base_url () ?>">Home</a>
																</li>
																<li class="level1 dropdown"><a href="<?php echo base_url () ?>services">Services</a>
																</li>
																<li class="level1 dropdown">Gallery
																	<span class="plus js-plus-icon"></span>
																	<ul class="dropdown-menu menu-level-1 ">
																			<li class="level2"><a href="<?php echo base_url () ?>gallery-foto">Foto - Foto</a></li>
																			<li class="level2"><a href="<?php echo base_url () ?>gallery-video">Video</a></li>
																	</ul>
																</li>
																<li class="level1 dropdown"><a href="<?php echo base_url () ?>blogs">Blog</a>
																</li>
																<li class="level1 dropdown"><a href="<?php echo base_url () ?>kontak">Contact</a>
																</li>
														</ul>
												</div>
										</nav>
								</div>
				</div>
		</div>
</header>
<div class="wrapper-slider">
		<div class="slider-home4 js-slider-home4">
			<?php foreach ($post_menu as $post) {	 ?>
				<div class="slider-img">
				        
				        <a href="<?php echo base_url("services/$post->kategori_seo ")?>">
						<img src="<?php echo base_url()?>asset/foto_privatetrip/<?=$post->gambar ?>" alt="" class="img-responsive">
						</a>
						<div class="slider-content">
								<div class="container">
								    <a href="<?php echo base_url("services/$post->kategori_seo ")?>">
										<h3><?php echo $post->nama?></h3>
										</a>
								</div>
						</div>
						
				</div>
				<?php  }  ?>



		</div>
		<div class="clearfix"></div>
		<div class="rotate">
				<div class="container container-rotate">
						<div class="custom v2">
								<div class="pagingInfo"></div>
								 <div class="post-fade">
								 </div>

						 </div>
				</div>
		</div>
</div>
