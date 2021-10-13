<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Kategori</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_kategori_pt',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul Kategori</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th width='120px' scope='row'>Nama Kategori</th>    <td><input type='text' class='form-control' name='nama' required></td></tr>
                    <tr><th scope='row'>Gambar<p>W:1920px H:1080px<br>(max 2 mb)</p></th>
                    <td><input type='file' class='form-control' name='img'>
                    <i style='color:red'>Ukuran file gambar terlalu besar mengakibatkan kinerja website menjadi lambat. Save for web file gambar yang ingin upload di photoshop.</i>
                    </td>
                    </tr>
                    <tr><th scope='row'>Konten</th>
                        <td><textarea id='editor1' class='form-control' name='desc_kat' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Meta Description</th>
                        <td><textarea class='form-control' name='meta_desc' style='height:260px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Keyword</th>
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
                    <a href='".base_url("administrator/kategori_pt/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
