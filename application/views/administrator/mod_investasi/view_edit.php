<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit Berita Terpilih</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_listinvestasi',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='a' class='form-control' required>";
                                                                            foreach ($record as $row){
                                                                                if ($rows['id_kategori'] == $row['id_kategori']){
                                                                                  echo "<option value='$row[id_kategori]' selected>$row[nama_kategori]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                                                                }
                                                                            }echo"</td></tr>
                    <tr><th scope='row'>Nama Vendor</th>
                       <td><input type='text' class='form-control' name='e' value='$rows[nama]' required></td>
                    </tr>
                    <tr><th scope='row'>Konten</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required>$rows[konten]</textarea>
                    </td></tr>
                    <tr><th scope='row'>Harga Minimal</th>
                      <td><input type='text' class='form-control' value='$rows[harga_min]' name='hargamin' id='harga_min'></td>
                    </tr>
                    <tr><th scope='row'>Harga Maksimal</th>
                      <td><input type='text' class='form-control' value='$rows[harga_max]' name='hargamax' id='harga_max'></td>
                    </tr>
                    <tr><th scope='row'>Ganti Gambar</th>
                        <td><input type='file' class='form-control' name='k'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_vendor/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                        </td></tr>
                        <tr><th scope='row'>Keterangan Gambar</th>
                            <td><input type='text' class='form-control' value='$rows[keterangan_gambar]' name='ketgambar'></td>
                        </tr>
                        <tr><th scope='row'>URL Youtube</th>
                            <td><input type='text' class='form-control' value='$rows[youtube]'name='urlyoutube'></td>
                        </tr>
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
