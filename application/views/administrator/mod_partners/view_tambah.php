<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Tambah Testimoni ".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_testimoni',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Nama</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th width='120px' scope='row'>Url Youtube</th>    <td><input type='text' class='form-control' name='youtube' required></td></tr>

                    <tr><th scope='row'>Deskripsi</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Gambar Lanscape</th>
                    <td><input type='file' class='form-control' name='k'></td>
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
                    <a href='testimoni'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
