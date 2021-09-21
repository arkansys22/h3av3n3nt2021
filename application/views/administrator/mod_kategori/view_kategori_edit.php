<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Kategori</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_kategori_pt',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_kategori]'>
                    <tr><th width='120px' scope='row'>Judul Kategori</th>    <td><input type='text' class='form-control' name='a' value='$rows[nama_kategori]' required></td></tr>
                   <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='nama' value='$rows[nama]' required></td></tr>
                    <tr><th scope='row'>Gambar</th>
                    <td><input type='file' class='form-control' name='img'>";
                        if ($rows['gambar'] != ''){ echo "<i style='color:red'>Lihat Gambar Saat ini :
                          </i><a target='_BLANK' href='".base_url()."asset/foto_privatetrip/$rows[gambar]'>$rows[gambar]</a>"; } echo "
                        </td>
                    </tr>
                    <tr><th scope='row'>Konten</th>
                        <td><textarea id='editor1' class='form-control' name='desc_kat' style='height:260px' required>$rows[desc_kat]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Meta Description</th>
                        <td><textarea class='form-control' name='meta_desc' style='height:260px' required>$rows[meta_desc]</textarea></td>
                    </tr>
                    <tr><th scope='row'>Keyword</th>
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
                    <a href='".base_url("administrator/kategori_pt/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
