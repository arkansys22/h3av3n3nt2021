<header id="header" class="header-v1">

            <div class="container container-75">
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
                    <div class="topbar-left v1 hidden-xs hidden-sm">
                        
                        <div class="has-element l-center">
                            <a href="https://www.bridestory.com/id/heaven-entertainment" target="_blank">Bridestory</a>
                        </div>
                        <div class="has-element l-center">
                            <a href="<?=$identitas->instagram ?>" target="_blank">Instagram</a>
                        </div>
                        <div class="has-element l-center">
                            <a href="<?=$identitas->youtube ?>" target="_blank">Youtube</a>
                        </div>
                        <div class="has-element l-center">
                            <a href="https://api.whatsapp.com/send?phone=<?=$identitas->whatsapp ?>&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank">WhatsApp 1</a>
                        </div>
                        <div class="has-element l-center">
                            <a href="https://api.whatsapp.com/send?phone=6281285562382&text=Halo,%20Heaven%20Group.%20Saya%20ingin%20tanya%20pricelist%20untuk%0ATanggal%3A%0ABulan%3A%0ALokasi%3A" target="_blank">Whatsapp 2</a>
                        </div>
                        <div class="has-element popup-element">
                       
                        </div>
                        
                    </div>
                    <div class="topbar-right">
                        <div class="logo v1"><a href="<?php echo base_url () ?>"><img  src="<?php echo base_url()?>asset/images/<?=$identitas->logo ?>" alt="logo"></a></div>
                        <button type="button" class="navbar-toggle vow-icon-menu v4 c-v3 js-menu icon-mobile hidden-lg hidden-md" data-toggle="collapse" data-target="#myNavbar">
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                            <span class="vow-iconbar"></span>
                        </button>
                        <nav class="main-menu">
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav js-menubar">
                                    <li class="level1 active dropdown"><a href="<?php echo base_url () ?>">Home</a></li>
                                    <li class="level1 active dropdown"><a href="<?php echo base_url () ?>services">Services</a>
                                     <span class="plus js-plus-icon"></span>
                                     <ul class="dropdown-menu menu-level-1 ">
                                   
                                   
                                    <?php   foreach ($post_1 as $post_menu2) {  ?>
															<li class="level2"><a href="<?php echo base_url("services/$post_menu2->kategori_seo")?>"><?php echo $post_menu2->nama?></a></li>
															<?php } ?>
                                    </ul>
                                    </li>
                                    <li class="level1 active dropdown"><a href="#">Gallery</a>
                                        <span class="plus js-plus-icon"></span>
                                        <ul class="dropdown-menu menu-level-1 ">
                                            <li class="level2"><a href="<?php echo base_url () ?>gallery-foto" title="photo">Photo</a></li>
                                            <li class="level2"><a href="<?php echo base_url () ?>gallery-video" title="video">Video</a></li>
                                        </ul>
                                    </li>
                                    </li>
                                    <li class="level1 dropdown"><a href="<?php echo base_url () ?>blogs">Blogs</a></li>
                                    <li class="level1 dropdown"><a href="<?php echo base_url () ?>blogs">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

        </header>
        
        <div class="slider-home3">
            <div class="js-slider-home3">
              <?php foreach ($post_menu as $post) {	 ?>
                <div class="items">
                    <img src="<?php echo base_url()?>asset/foto_privatetrip/<?=$post->gambar ?>" alt="images">
                    <div class="container">
                        <div class="box-content-left text-ver2 white">
                            <a href="<?php echo base_url("services/$post->kategori_seo ")?>"><h3 class="h3-slide-title"><?php echo $post->nama?></h3></a>
                        </div>
                    </div>
                </div>
                <?php  }  ?>
                
            </div>
            <a class="btn-next">NEXT</a>
        </div>