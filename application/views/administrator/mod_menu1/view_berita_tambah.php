<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header'>
                  <h3 class='box-title'>Tambah Partner ".$this->session->disabled." </h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_list_ot',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>Nama Trip</th>
                        <td><input type='text' class='form-control' name='e' required></td>
                    </tr>
                    <tr><th scope='row'>Deskripsi Tempat</th>
                        <td><textarea id='editor1' class='form-control' name='h' style='height:260px' required></textarea></td>
                    </tr>
                     <tr><th scope='row'>Trip Info</th>
                        <td><textarea id='editor2' class='form-control' name='info' style='height:160px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Fasilitas</th>
                        <td><textarea id='editor7' class='form-control' name='fasilitas' style='height:160px' required></textarea></td>
                    </tr>
                     <tr><th scope='row'>Itinerary</th>
                        <td><textarea id='editor3' class='form-control' name='itinerary' style='height:160px' required></textarea></td>
                    </tr>
                     <tr><th scope='row'>Personal Equiptment</th>
                        <td><textarea id='editor4' class='form-control' name='equip' style='height:160px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Tanggal Mulai</th>
                        <td><input type='text' class='form-control' name='lokasi' required></td>
                    </tr>
                    <tr><th scope='row'>Harga</th>
                      <td><input type='number' class='form-control' name='hargamin'></td>
                    </tr>
                    <tr><th scope='row'>Uang Muka</th>
                      <td><input type='number' class='form-control' name='hargamax'></td>
                    </tr>
                    <tr><th scope='row'>Kapasitas Minimal</th>
                      <td><input type='number' class='form-control' name='kapasitasmin'></td>
                    </tr>
                    <tr><th scope='row'>Kapasitas Maksimal</th>
                      <td><input type='number' class='form-control' name='kapasitasmax'></td>
                    </tr>
                    <tr><th scope='row'>Partisipan</th>
                     <td><textarea id='editor5' class='form-control' name='partisipan' style='height:160px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Syarat & Ketentuan</th>
                     <td><textarea id='editor6' class='form-control' name='syarat' style='height:160px' required></textarea></td>
                    </tr>
                    <tr><th scope='row'>Gambar Square</th>
                    <td><input type='file' class='form-control' name='k'></td>
                    </tr>
                    <tr><th scope='row'>Gambar Landscape</th>
                    <td><input type='file' class='form-control' name='img2'></td>
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
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan Open Trip</button>
                    <a href='".base_url("administrator/list_ot/")."'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();

			?>
