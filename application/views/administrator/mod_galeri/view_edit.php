<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit Galeri</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listgaleri',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr>
                      <th width='120px' scope='row'>Judul</th>
                      <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td>
                    </tr>
                    <tr>
                    <td><input type='hidden' class='form-control' name='a' value='1' required></td>
                    <tr><th scope='row'>Gambar <p>W:1920px H:1080px<br>(max 2 mb)</p></th>
                        <td><input type='file' class='form-control' name='gambar'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Ukuran file gambar terlalu besar mengakibatkan kinerja website menjadi lambat. Save for web file gambar yang ingin upload di photoshop.<br>Gambar Saat ini :</i><br>
                        <img width='100%' src='".base_url()."asset/foto_galeri/$rows[gambar]'>"; } echo "
                        </td></tr>
                                        <tr><th scope='row'>Meta Description</th>
                                              <td><textarea class='form-control' name='meta' style='height:260px' required>$rows[meta_desc]</textarea></td>
                                          </tr>
                                      <tr><th scope='row'>Tag</th>
                                      <td><div class='checkbox-scroll2'>
                              					<input type='text' name='j' value='" . $rows['tag'] . "' class='form-control tags' data-role='tagsinput'/>
                              					";                                                    $_arrNilai = explode(',', $rows['tag']);
                                                                                              foreach ($tag as $tag){
                                                                                                  $_ck = (array_search($tag['tag_seo'], $_arrNilai) === false)? '' : 'checked';
                                                                                              }
                                      echo "</div></td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='../listgaleri'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
