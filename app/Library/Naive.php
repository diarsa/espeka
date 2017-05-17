<?php

namespace App\Library;

class Naive {

    const PI = 3.14;

    // Hasil DS yang sudah didapat
    private $dsResult = array();
    // Frekuensi data yang tampil berdasarkan kunjungan
    private $frekuensi = array();
    // Total Frekuensi
    private $totalFrekuensi = array();
    // Rata-rata Frekuensi
    private $rataRataFrekuensi = array();
    //
    private $sigma2 = array();
    // 
    private $sigma = array();
    private $preProb = array();
    // Penampungan hasil kiri dan kanan
    private $hasilKRKN = array();
    // index untuk menentukan dimana total frekuensi akan ditempatkan
    private $indexFrekuensi = 0;
    private $x = 0;

    // public function __construct() {}

    public function cariObjekSama($queryResult, $x) {
        // echo "<h1>i: " . $this->indexFrekuensi . '</h1><br>';
        $this->x = $x;
        $arr = array();
        foreach ($queryResult as $key => $value) {
            if (!isset($arr[$value['kode_kunjungan']])) {
                $arr[$value['kode_kunjungan']] = 1;
            } else {
                $arr[$value['kode_kunjungan']] ++;
            }
        }

        foreach ($queryResult as $key => $value) {
            if ($arr[$value['kode_kunjungan']] > 1) {
                $valuefreq = substr($value['values'], 2);
                $this->frekuensi[$this->indexFrekuensi][$value['kode_kunjungan']][] = $valuefreq;

                // Cek jika array sudah berisi atau tidak
                if (empty($this->totalFrekuensi[$this->indexFrekuensi][$value['kode_kunjungan']])) {
                    $this->totalFrekuensi[$this->indexFrekuensi][$value['kode_kunjungan']] = $valuefreq;
                } else {
                    $this->totalFrekuensi[$this->indexFrekuensi][$value['kode_kunjungan']] += $valuefreq;
                }
            }
        }

        // Hitung rata-rata
        foreach ($this->totalFrekuensi[$this->indexFrekuensi] as $key => $value) {
            $banyakData = sizeof($this->frekuensi[$this->indexFrekuensi][$key]);
            $this->rataRataFrekuensi[$this->indexFrekuensi][$key] = $value / $banyakData;
            // echo '<h5>' . $key . ': '. $value .' / '. $banyakData .' = '. $this->rataRataFrekuensi[$this->indexFrekuensi][$key] .'</h5><br>';
        }

        // Hitung ?? Logonya sigma
        foreach ($this->rataRataFrekuensi[$this->indexFrekuensi] as $rt => $rtVal) {
            // echo $rt . '<br>';
            foreach ($this->frekuensi[$this->indexFrekuensi][$rt] as $fr => $frVal) {
                // print_r($frVal); echo ', ' . $rtVal . ' <br>';
                if (empty($this->sigma2[$this->indexFrekuensi][$rt])) {
                    $this->sigma2[$this->indexFrekuensi][$rt] = pow(($frVal - $rtVal), 2);
                } else {
                    $this->sigma2[$this->indexFrekuensi][$rt] += pow(($frVal - $rtVal), 2);
                }
                // echo $frVal . ' - ' . $rtVal . ' ^2 = ' . ($frVal - $rtVal) . ' = ' .pow(($rtVal - $frVal), 2) . '<br>';
            }
            // echo $this->sigma2[$this->indexFrekuensi][$rt] . '<br>';
//**            
            // $hasil = $this->sigma2[$this->indexFrekuensi][$rt] / (sizeof($this->frekuensi[$this->indexFrekuensi][$rt]) - 1);
// Error Division by zero 
// dihandle menjadi 
// jika $pembagihasil == 0 maka diubah menjadi 0.5 
            $pembagihasil = (sizeof($this->frekuensi[$this->indexFrekuensi][$rt]) - 1);
            if ($pembagihasil == 0) {
                $pembagihasil = 1;
                $hasil = $this->sigma2[$this->indexFrekuensi][$rt] / $pembagihasil;
            } else {
                $hasil = $this->sigma2[$this->indexFrekuensi][$rt] / $pembagihasil;
            }
//****
            $this->sigma2[$this->indexFrekuensi][$rt] = $hasil;
            $this->sigma[$this->indexFrekuensi][$rt] = sqrt($hasil);
            $hasil = 0;

//**
            // $lf = 1 / ((sqrt(2 * self::PI)) * $this->sigma[$this->indexFrekuensi][$rt]);
// Error Division by zero 
// dihandle menjadi 
// jika $pembagi == 0 maka diubah menjadi 0.5 
            $pembagi = ((sqrt(2 * self::PI)) * $this->sigma[$this->indexFrekuensi][$rt]);
            if ($pembagi == 0) {
                $pembagi = 1;
                $lf = 1 / $pembagi;
            } else {
                $lf = 1 / $pembagi;
            }
//****
// dd($lf);
            // =EXP((-1*($D$69-C62)^2/(2*C64)))
            // echo 'A: ' . $this->sigma2[$this->indexFrekuensi][$rt] . '<br>';
//**
            // $rx = exp((-1 * pow(($this->x - $this->rataRataFrekuensi[$this->indexFrekuensi][$rt]), 2)) / (2 * $this->sigma2[$this->indexFrekuensi][$rt]));
// Error Division by zero 
// dihandle menjadi 
// jika $pembagirx == 0 maka diubah menjadi 0.5 
            $pembagirx = (2 * $this->sigma2[$this->indexFrekuensi][$rt]);
            if ($pembagirx == 0) {
                $pembagirx = 1;
                $rx = exp((-1 * pow(($this->x - $this->rataRataFrekuensi[$this->indexFrekuensi][$rt]), 2)) / $pembagirx);
            } else {
                $rx = exp((-1 * pow(($this->x - $this->rataRataFrekuensi[$this->indexFrekuensi][$rt]), 2)) / $pembagirx);
            }
//****
            $this->preProb[$this->indexFrekuensi][$rt] = ($lf * $rx);
            $this->hasilKRKN[$this->indexFrekuensi][$rt] = ($lf * $rx);
        }

        // Hitung PreProb
        $totalPreProb = 0;
        foreach ($this->preProb[$this->indexFrekuensi] as $key => $value) {
            $totalPreProb += $value;
        }

        // bagi preprob
        foreach ($this->preProb[$this->indexFrekuensi] as $key => $value) {
            $tmpHasil = $this->preProb[$this->indexFrekuensi][$key] / $totalPreProb;
            $this->preProb[$this->indexFrekuensi][$key] = $tmpHasil;
        }

        // echo $totalPreProb;
        // print_r($this->sigma2[$this->indexFrekuensi]);
        // print_r($this->frekuensi[$this->indexFrekuensi]);
    }

    public function getResult() {
        $preProb = $this->preProb[$this->indexFrekuensi];
        $this->indexFrekuensi++;
        return $preProb;
    }

    public function getResultProbabilitas() {
        $result = array();
        foreach ($this->hasilKRKN as $ky) {
            foreach ($ky as $s => $value) {
                $x = isset($result[$s]) ? $result[$s] : 1;
                $result[$s] = $x * $value;
            }
        }
        // print_r($result);
        return $result;
    }

}
