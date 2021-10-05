<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Tambah Paket".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_list_pt',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Kategori</th>               <td><select name='a' class='form-control' required>
                                                                            <option value='' selected>- Pilih Kategori -</option>";
                                                                            foreach ($record as $row){
                                                                                echo "<option value='$row[id_kategori]'>$row[nama]</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Nama</th>
                        <td><input type='text' class='form-control' name='e' required></td>
                    </tr>
                    <tr><th scope='row'>Deskripsi Tempat</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Gambar <br>(max 2mb)</th>
                    <td><input type='file' class='form-control' name='k'><i style='color:red'>Ukuran file gambar terlalu besar mengakibatkan kinerja website menjadi lambat. Save for web file gambar yang ingin upload di photoshop.</i></td>
                    </tr>
                    <tr><th scope='row'>Meta Description</th>
                        <td><textarea class='form-control' name='meta' style='height:60px' required></textarea></td>
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
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan Paket</button>
                    <a href='".base_url("administrator/list_pt/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
