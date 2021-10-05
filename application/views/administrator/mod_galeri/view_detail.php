<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo $galeri->judul ?></h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/listgaleri_detail_tambahkan/<?php echo $galeri->id_berita ?>'>Tambah Galeri</a>
       <a class='pull-right btn btn-light btn-sm' href='<?php echo base_url(); ?>administrator/listgaleri'>Kembali</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:20px'>No</th>
            <th>Foto Galeri</th>
            <th style='width:75px'>Action</th>
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;
        foreach ($galeri_detail as $row){
        echo "<tr><td>$no</td>
                  <td>
                  $row[galeri_detail_tbl_gambar]
                  </td>
                  <td><center>
                  <a class='btn btn-primary btn-xs' title='Buka Data' href='".base_url()."administrator/listgaleri_detail/$row[id_berita]'><span class='glyphicon glyphicon-open'></span></a>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listgaleri/$row[id_berita]'><span class='glyphicon glyphicon-edit'></span></a>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_listgaleri/$row[id_berita]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
              </tr>";
          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
