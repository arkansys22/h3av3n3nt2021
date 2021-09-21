<!DOCTYPE html>
<html lang="id">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body>
      <?php $this->load->view('fronts/utama/widget')?>
    <div class="wrappage">
     
      <?php $this->load->view('fronts/utama/homeheader1')?>
      <?php $this->load->view('fronts/utama/homekonten')?>
      <?php $this->load->view('fronts/utama/footer')?>
      <?php $this->load->view('fronts/utama/js')?>
    </div>
  </body>
</html>
