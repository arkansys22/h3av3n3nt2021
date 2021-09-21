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
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr>
                    <td><input type='hidden' class='form-control' name='a' value='1' required></td>                  
                    <tr><th scope='row'>Ganti Gambar</th>
                        <td><input type='file' class='form-control' name='img1'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                        </td></tr>
                        <tr><th scope='row'>Ganti Gambar 2</th>
                            <td><input type='file' class='form-control' name='img2'>";
                            if ($rows['gambar2'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                              </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar2]'>$rows[gambar2]</a>"; } echo "
                            </td></tr>
                            <tr><th scope='row'>Ganti Gambar 3</th>
                                <td><input type='file' class='form-control' name='img3'>";
                                if ($rows['gambar3'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                                  </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar3]'>$rows[gambar3]</a>"; } echo "
                                </td></tr>
                                <tr><th scope='row'>Ganti Gambar 4</th>
                                    <td><input type='file' class='form-control' name='img4'>";
                                    if ($rows['gambar4'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                                      </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar4]'>$rows[gambar4]</a>"; } echo "
                                    </td></tr>
                                    <tr><th scope='row'>Ganti Gambar 5</th>
                                        <td><input type='file' class='form-control' name='img5'>";
                                        if ($rows['gambar5'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                                          </i><a target='_BLANK' href='".base_url()."asset/foto_galeri/$rows[gambar5]'>$rows[gambar5]</a>"; } echo "
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
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
