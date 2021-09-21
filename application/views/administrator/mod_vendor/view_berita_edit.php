<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Edit $rows[nama_2]</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_list_pt',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_berita]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' value='$rows[judul]' required></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='a' class='form-control' required>";
                                                                            foreach ($record as $row){
                                                                                if ($rows['id_kategori'] == $row['id_kategori']){
                                                                                  echo "<option value='$row[id_kategori]' selected>$row[nama]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[id_kategori]'>$row[nama]</option>";
                                                                                }
                                                                            }echo"</td></tr>
                    <tr><th scope='row'>Nama</th>
                       <td><input type='text' class='form-control' name='e' value='$rows[nama_2]' required></td>
                    </tr>
                    <tr><th scope='row'>Deskripsi</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required>$rows[konten]</textarea>
                    </td></tr>
                    <tr><th scope='row'>Gambar</th>
                        <td><input type='file' class='form-control' name='k'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_private/$rows[gambar]'>$rows[gambar]</a>"; } echo "
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
                    <button type='submit' name='submit' class='btn btn-info'>Update Paket</button>
                    <a href='".base_url("administrator/list_pt/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
