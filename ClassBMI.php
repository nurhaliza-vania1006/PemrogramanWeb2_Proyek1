<?php
    class BMIPasien{
        public $nama,
        $usia,
        $berat,
        $tinggi,
        $gender;

        public function hasilBMI(){
            return 
            "Nama : $this->nama <br>
            Usia : $this->usia <br>
            Berat Badan : $this->berat <br>
            Tinggi Badan : $this->tinggi <br>
            Jenis Kelamin : $this->gender <br>";
        }
        public function statusBMI($BMI){
            if ($BMI < 18.5){
                return "<td>Kekurangan Berat Badan</td>";
            } else if ($BMI >= 18.5 && $BMI <= 24.9){
                return "<td>Normal (Ideal)</td>";
            } else if ($BMI >= 25.0 && $BMI <= 29.9){
                return "<td>Kelebihan Berat Badan</td>";
            } else {
                return "<td>Kegemukan (Obesitas)</td>";
            }
        }
    }

    if(isset($_GET["nama_lgkp"])) {
        $bmi = new BMIPasien;
        $bmi->nama = $_GET["nama_lgkp"];
        $bmi->usia = $_GET["usia_"];
        $bmi->jeniskelamin = $_GET["jenis_kelamin"];
        $bmi->berat = $_GET["berat_"];
        $bmi->tinggi = $_GET["tinggi_"];
        // echo $bmi -> hasilBMI();
    }

    $pasien1 = ['nama'=>'Ira Rahmawati','usia'=>21, 'gender'=>'Perempuan', 'berat'=>65, 'tinggi'=>158];
    $pasien2 = ['nama'=>'Anugerah','usia'=>29, 'gender'=>'Laki-laki', 'berat'=>63, 'tinggi'=>168];
    $pasien3 = ['nama'=>'Risa Aprilia','usia'=>19, 'gender'=>'Perempuan', 'berat'=>95, 'tinggi'=>162];
    $pasien4 = ['nama'=>'Kian Putra','usia'=>19, 'gender'=>'Laki-laki', 'berat'=>47.4, 'tinggi'=>164];
    $pasien5 = ['nama'=> $bmi->nama,'usia'=>$bmi->usia, 'gender'=> $bmi->jeniskelamin, 'berat'=>$bmi->berat, 'tinggi'=>$bmi->tinggi];
  
    $ar_pasien = [$pasien1, $pasien2, $pasien3, $pasien4, $pasien5];
?>