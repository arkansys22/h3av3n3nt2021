<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body>
    <section id="jSplash">
    		<div id="circle"></div>
    </section>
    <div id="menutop"></div>
    <div id="wrapper">
    	<div id="mask">
        <?php $this->load->view('fronts/utama/header')?>
        <?php $this->load->view('fronts/utama/partner_kategori')?>
        <?php $this->load->view('fronts/utama/footer2')?>
      </div>
    </div>
    <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
