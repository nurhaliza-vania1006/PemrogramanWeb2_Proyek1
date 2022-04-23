<?php
include_once 'header.php';
include_once 'sidebar.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menghitung BMI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kalkulator Indeks Massa Tubuh (Body Mass Index)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <form action="index.php" method="GET">
                <H2>Formulir Pasien</H2>
                <div class="form-group row">
                    <label for="text" class="col-4 col-form-label">Nama Lengkap</label> 
                    <div class="col-8">
                    <input id="text" name="nama_lgkp" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="usia" class="col-4 col-form-label">Usia</label> 
                    <div class="col-8">
                    <input id="usia" name="usia_" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Jenis Kelamin</label> 
                    <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jenis_kelamin" id="laki" type="radio" class="custom-control-input" value="Lak--laki"> 
                        <label for="laki" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jenis_kelamin" id="perempuan" type="radio" class="custom-control-input" value="Perempuan"> 
                        <label for="perempuan" class="custom-control-label">Perempuan</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berat" class="col-4 col-form-label">Berat Badan (kg)</label> 
                    <div class="col-8">
                    <input id="berat" name="berat_" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tinggi" class="col-4 col-form-label">Tinggi Badan (cm)</label> 
                    <div class="col-8">
                    <input id="tinggi" name="tinggi_" type="text" class="form-control">
                    </div>
                </div> 
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <input type="submit" value="Hitung" name="simpan" class="btn btn-primary" >
                    </div>
                </div>
                </form>

                <?php 
                require_once "ClassBMI.php";
                ?>

                <div class="container">
                <div class="row">
                <div class="col-12">
                <h2 class="text-center mb-5">Data BMI Pasien</h2>
                <table class="table table-info table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>                            
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Berat Badan (kg)</th>
                            <th scope="col">Tinggi Badan (cm)</th>
                            <th scope="col">BMI</th>
                            <th scope="col">Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nomor = 1;
                            foreach ($ar_pasien as $pasien) {
                                echo '<tr><td>'.$nomor.'</td>';
                                echo '<td>'.$pasien['nama'].'</td>';
                                echo '<td>'.$pasien['usia'].'</td>';
                                echo '<td>'.$pasien['gender'].'</td>';
                                echo '<td>'.$pasien['berat'].'</td>';
                                echo '<td>'.$pasien['tinggi'].'</td>';
                                $BMI = $pasien["berat"] / (($pasien["tinggi"] /100) **2);
                                echo '<td>'.number_format($BMI,1).'</td>';
                                $status = new bmiPasien();
                                echo $status->statusBMI($BMI);
                                echo '</tr>';
                                $nomor++;
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                Footer
              </div> -->
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php
include_once "footer.php";
?>