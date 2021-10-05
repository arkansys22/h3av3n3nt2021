<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>$galeri->judul".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/listgaleri_detail_tambahkan',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='galeri_tbl_id_berita' value='$galeri->id_berita'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='galeri_detail_tbl_judul' required></td></tr>
                    <tr><th scope='row'>Gambar 1</th>
                    <td><input type='file' class='form-control' name='gambar'></td>
                    </tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='../listgaleri_detail/$galeri->judul_seo'><button type='button' class='btn btn-default pull-right'>Batal</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
