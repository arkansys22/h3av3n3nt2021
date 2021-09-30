<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Galeri Foto</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_listgaleri'>Tambah Galeri</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:20px'>No</th>
            <th>Judul Galeri</th>
            <th style='width:75px'>Action</th>
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;
        foreach ($record as $row){
        $tgl_posting = tgl_indo($row['tanggal']);
        if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
        echo "<tr><td>$no</td>
                  <td>
                  $row[judul]
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