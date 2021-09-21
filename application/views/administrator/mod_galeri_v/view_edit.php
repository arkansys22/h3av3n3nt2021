<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit Galeri Video</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listvideo',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul</th>
                    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td>
                    <td><input type='hidden' class='form-control' name='a' value='2' required></td>
                    <tr><th scope='row'>Ganti Gambar</th>
                        <td><input type='file' class='form-control' name='img1'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                        </td></tr>
                    </tr>
                    <tr><th scope='row'>LINK YOUTUBE</th>
                       <td><input type='text' class='form-control' name='urlyoutube' value='$rows[youtube]' required></td>
                    </tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>

                  </div>
            </div></div></div>";
            echo form_close();
