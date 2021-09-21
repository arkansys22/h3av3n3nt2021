<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Tambah Foto Baru ".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_listgaleri',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <td><input type='hidden' class='form-control' name='a' value='1' required></td>                    
                    <tr><th scope='row'>Gambar 1</th>
                    <td><input type='file' class='form-control' name='img1'></td>
                    </tr>
                    <tr><th scope='row'>Gambar 2</th>
                    <td><input type='file' class='form-control' name='img2'></td>
                    </tr>
                    <tr><th scope='row'>Gambar 3</th>
                    <td><input type='file' class='form-control' name='img3'></td>
                    </tr>
                    <tr><th scope='row'>Gambar 4</th>
                    <td><input type='file' class='form-control' name='img4'></td>
                    </tr>
                    <tr><th scope='row'>Gambar 5</th>
                    <td><input type='file' class='form-control' name='img5'></td>
                    </tr>
                    <tr><th scope='row'>Meta Description</th>
                        <td><textarea class='form-control' name='meta' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Tag</th>
                    <td><div class='checkbox-scroll2'>
					               <input type='text' id='j' name='j' class='form-control tags' value='' data-role='tagsinput' />					";
                            foreach ($tag as $tag){   }
                            echo "
                        </div>
                    </td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='#'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
