<div class="container">
    <div class="contact">
        <h3 class="text-center v-heading">Contact</h3>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7">
                <iframe src="<?=$identitas->maps ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-5 contact-right">
                <div class="contact-intro">
                  <p class="email"><a href="mailto:<?=$identitas->email ?>"><?=$identitas->email ?></a></p>
                  <p class="c-address v-color2"><a href="https://api.whatsapp.com/send?phone=<?=$identitas->whatsapp ?>&text=Halo,%20<?=$identitas->nama_website ?>.%20Bisa%20Bantu%20Kami%20?">Chat by WhatsApp</a></p>
                  <p class="phone v-color1"><a href="tel:<?=$identitas->no_telp ?>"><?=$identitas->no_telp ?></a></p>
                </div>

            </div>
        </div>

    </div>
</div>
