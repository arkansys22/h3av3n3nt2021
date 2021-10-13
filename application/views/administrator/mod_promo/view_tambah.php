<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Tambah Artis Indonesia ".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_listpromo',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Konten</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Gambar<p>W:1500px H:1500px<br>(max 2 mb)</p></th>
                    <td><input type='file' class='form-control' name='k'><i style='color:red'>Ukuran file gambar terlalu besar mengakibatkan kinerja website menjadi lambat. Save for web file gambar yang ingin upload di photoshop.</i></td>
                    </tr>
                    <tr><th scope='row'>URL</th>
                        <td><input type='text' class='form-control' name='ketgambar'></td>
                    </tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='listpromo'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
