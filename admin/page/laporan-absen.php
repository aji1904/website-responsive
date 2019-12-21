
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">     
      <div class="card mb-3">
        <div class="card-header">
          <h3><i class="fa fa-users"></i> Data PHL</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode PHL</th>
                <th>Nama PHL</th>
                <th>Wilayah Kerja</th>
                <th>Jam Kerja</th>
                <th>Kehadiran</th>
              </tr>
            </thead> 
            <?php
              $sql = "SELECT *, count(if(tb_absen.status='H',status,null)) as absen FROM ((tb_phl LEFT JOIN 
                  tb_wilayah ON tb_wilayah.kode_wilayah=tb_phl.kode_wilayah)
                   JOIN tb_absen ON tb_phl.kode_phl=tb_absen.kode_phl)
                   GROUP BY tb_absen.kode_phl";
              $query = mysqli_query($db, $sql);
              echo(mysqli_error($db));
            ?>                         
            <tbody>
              <?php
                $x=0;
                while($ambil_data = mysqli_fetch_array($query)){
                $x++;
              ?>
              <tr>
                <td><?php echo $x ?></td>
                <td><?php echo $ambil_data['kode_phl'] ?></td>
                <td><?php echo $ambil_data['nama_phl'] ?></td>
                <td><?php echo $ambil_data['kecamatan'] ?></td>
                <td><?php echo $ambil_data['jam_kerja'] ?></td>
                <td><?php echo $ambil_data['absen'] ?> Hari </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
          
        </div>                            
      </div><!-- end card-->          
    </div>
</div>