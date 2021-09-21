<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Identitas Website</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/identitaswebsite',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$record[id_identitas]'>
                    <tr><th width='120px' scope='row'>Nama Website</th>   <td><input type='text' class='form-control' name='a' value='$record[nama_website]'></td></tr>
                    <tr><th scope='row'>Email</th>                        <td><input type='email' class='form-control' name='b' value='$record[email]'></td></tr>
                    <tr><th scope='row'>Domain</th>                       <td><input type='url' class='form-control' name='c' value='$record[url]'></td></tr>
                    <tr><th scope='row'>Facebook</th>                     <td><input type='text' class='form-control' name='d' value='$record[facebook]'></td></tr>
                    <tr><th scope='row'>Instagram</th>                     <td><input type='text' class='form-control' name='ig' value='$record[instagram]'></td></tr>
                    <tr><th scope='row'>Whatsapp</th>                     <td><input type='text' class='form-control' name='wa' value='$record[whatsapp]'></td></tr>
                    <tr><th scope='row'>Youtube</th>                     <td><input type='text' class='form-control' name='yt' value='$record[youtube]'></td></tr>
                    <tr><th scope='row'>Slogan</th>                     <td><input type='text' class='form-control' name='slogan' value='$record[slogan]'></td></tr>
                    <tr><th scope='row'>Alamat</th>                  <td><textarea class='form-control' name='address' style='height:80px'>$record[alamat]</textarea></td></tr>
                    <tr><th scope='row'>Deskripsi</th>                  <td><textarea id='editor1' class='form-control' name='e'>$record[deskripsi]</textarea></td></tr>
                    <tr><th scope='row'>No Telpon</th>                    <td><input type='number' class='form-control' name='f' value='$record[no_telp]'></td></tr>
                    <tr><th scope='row'>Meta Deskripsi</th>               <td><input type='text' class='form-control' name='g' value='$record[meta_deskripsi]'></td></tr>
                    <tr><th scope='row'>Meta Keyword</th>                 <td><input type='text' class='form-control' name='h' value='$record[meta_keyword]'></td></tr>
                    <tr><th scope='row'>Google Maps</th>                  <td><textarea class='form-control' name='i' style='height:80px'>$record[maps]</textarea></td></tr>
                    <tr><th scope='row'>Favicon</th>
                    <td><input type='file' class='form-control' name='j' value='$record[favicon]'>
                    <hr style='margin:5px'>Favicon Aktif Saat ini : <img style='width:32px; height:32px' src='".base_url()."asset/images/$record[favicon]'>
                    </td></tr>
                    <tr><th scope='row'>Logo</th>
                    <td><input type='file' class='form-control' name='logo' value='$record[logo]'>
                    <hr style='margin:5px'>Logo Aktif Saat ini : <img style='width:50px; height:50px' src='".base_url()."asset/images/$record[logo]'>
                    </td></tr>
                    <tr><th scope='row'>Foto Profil</th>
                    <td><input type='file' class='form-control' name='minilogo' value='$record[minilogo]'>
                    <hr style='margin:5px'>Mini logo Aktif Saat ini : <img style='width:50px; height:50px' src='".base_url()."asset/images/$record[minilogo]'>
                    </td></tr>
                  </tbody>
                  </table>
                </div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='home'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
