<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit Foto Slide Terpilih</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listpromo',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr><th scope='row'>Konten</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required>$rows[konten]</textarea>
                    </td></tr>
                   <tr><th scope='row'>Gambar Lansccape</th>
                        <td><input type='file' class='form-control' name='k'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_promo/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                    </td></tr>
                        <tr><th scope='row'>URL</th>
                            <td><input type='text' class='form-control' value='$rows[keterangan_gambar]' name='ketgambar'></td>
                        </tr>

                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='../listpromo'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
