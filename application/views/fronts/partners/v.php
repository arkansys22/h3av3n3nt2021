<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body>
      <?php $this->load->view('fronts/utama/loading')?>
      <?php $this->load->view('fronts/utama/header')?>
      <br><br><br><br><br><br>
      <?php $this->load->view('fronts/utama/partnerskonten')?>
      <br><br><br><br>
      <?php $this->load->view('fronts/utama/footer')?>
      <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
