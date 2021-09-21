<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit $rows[nama]</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_list_ot',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    
                    <tr><th scope='row'>Nama Trip</th>
                       <td><input type='text' class='form-control' name='e' value='$rows[nama]' required></td>
                    </tr>
                    <tr><th scope='row'>Deskripsi Tempat</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required>$rows[konten]</textarea>
                    </td></tr>
                    <tr><th scope='row'>Trip Info</th>
                    <td><textarea id='editor2' class='form-control' name='info' style='height:160px' required>$rows[info]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Fasilitas</th>
                    <td><textarea id='editor7' class='form-control' name='fasilitas' style='height:160px' required>$rows[fasilitas]</textarea></td>
                    </tr>
                    
                    <tr><th scope='row'>Itinerary</th>
                    <td><textarea id='editor3' class='form-control' name='itinerary' style='height:160px' required>$rows[itinerary]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Personal Equiptment</th>
                    <td><textarea id='editor4' class='form-control' name='equip' style='height:160px' required>$rows[equip]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Mulai Dari</th>
                       <td><input type='text' class='form-control' name='lokasi' value='$rows[lokasi]' required></td>
                    </tr>
                    <tr><th scope='row'>Harga</th>
                      <td><input type='text' class='form-control' value='$rows[harga_min]' name='hargamin' ></td>
                    </tr>
                    <tr><th scope='row'>Uang Muka</th>
                      <td><input type='text' class='form-control' value='$rows[harga_max]' name='hargamax'></td>
                    </tr>
                    <tr><th scope='row'>Kapasitas Minimal</th>
                      <td><input type='number' class='form-control' value='$rows[kapasitas_min]' name='kapasitas_min'></td>
                    </tr>
                    <tr><th scope='row'>Kapasitas Maksimal</th>
                      <td><input type='number' class='form-control' value='$rows[kapasitas_max]' name='kapasitas_max'></td>
                    </tr>
                    <tr><th scope='row'>Partisipan</th>
                    <td><textarea id='editor5' class='form-control' name='partisipan' style='height:160px' required>$rows[partisipan]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Syarat & Ketentuan</th>
                    <td><textarea id='editor6' class='form-control' name='syarat' style='height:160px' required>$rows[syarat]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Gambar Square</th>
                        <td><input type='file' class='form-control' name='k'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_open/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                    </td></tr>
                    <tr><th scope='row'>Gambar Landscape</th>
                        <td><input type='file' class='form-control' name='img2'>";
                        if ($rows['gambar2'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                        </i><a target='_BLANK' href='".base_url()."asset/foto_open/$rows[gambar2]'>$rows[gambar2]</a>"; } echo "
                    </td></tr>
                    <tr><th scope='row'>Meta Description</th>
                        <td><textarea class='form-control' name='meta' style='height:60px' required>$rows[meta_desc]</textarea></td>
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
                    <button type='submit' name='submit' class='btn btn-info'>Update Open Trip</button>
                    <a href='".base_url("administrator/list_ot/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
