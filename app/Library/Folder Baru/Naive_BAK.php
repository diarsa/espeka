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
        $this->x = $x;

        // Cek jika ada element yang hanya ada 1
        $arr = array();
        foreach ($queryResult as $key => $value) {
            if (!isset($arr[$value['kode_kunjungan']])) {
                $arr[$value['kode_kunjungan']] = 1;
            } else {
                $arr[$value['kode_kunjungan']]++;
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

        // echo "<pre>";
        // print_r($this->frekuensi);
        // echo "</pre>";
        // Hitung rata-rata
        foreach ($this->totalFrekuensi[$this->indexFrekuensi] as $key => $value) {
            $banyakData = sizeof($this->frekuensi[$this->indexFrekuensi][$key]);
            $this->rataRataFrekuensi[$this->indexFrekuensi][$key] = $value / $banyakData;
        }

        // Hitung ?? Logonya sigma

        foreach ($this->rataRataFrekuensi[$this->indexFrekuensi] as $rt => $rtVal) {

            foreach ($this->frekuensi[$this->indexFrekuensi][$rt] as $fr => $frVal) {
                if (empty($this->sigma2[$this->indexFrekuensi][$rt])) {
                    $this->sigma2[$this->indexFrekuensi][$rt] = pow(($frVal - $rtVal), 2);
                } else {
                    $this->sigma2[$this->indexFrekuensi][$rt] += pow(($frVal - $rtVal), 2);
                }
            }

            // echo 'a: ' .sizeof($this->frekuensi[$this->indexFrekuensi][$rt]);
            $hasil = 0;
            // if ((sizeof($this->frekuensi[$this->indexFrekuensi][$rt]) - 1) > 0) {
                $hasil = $this->sigma2[$this->indexFrekuensi][$rt] / (sizeof($this->frekuensi[$this->indexFrekuensi][$rt]) - 1);
                
                $this->sigma2[$this->indexFrekuensi][$rt] = $hasil;
                $this->sigma[$this->indexFrekuensi][$rt] = sqrt($hasil);
                $hasil = 0;

                $lf = 1 / ((sqrt(2 * self::PI)) * $this->sigma[$this->indexFrekuensi][$rt]);

                $rx = exp((-1 * pow(($this->x - $this->rataRataFrekuensi[$this->indexFrekuensi][$rt]), 2)) / (2 * $this->sigma2[$this->indexFrekuensi][$rt]));

                $this->preProb[$this->indexFrekuensi][$rt] = ($lf * $rx);
                $this->hasilKRKN[$this->indexFrekuensi][$rt] = ($lf * $rx);
            // }
            // $this->preProb[$this->indexFrekuensi][$rt] = 0;
            // $this->hasilKRKN[$this->indexFrekuensi][$rt] = 0;
        }

        // Hitung PreProb
        $totalPreProb = 0;
        foreach ($this->preProb[$this->indexFrekuensi] as $key => $value) {
            $totalPreProb += $value;
        }

        // bagi preprob
        foreach ($this->preProb[$this->indexFrekuensi] as $key => $value) {
            if ($totalPreProb > 0) {
            $tmpHasil = $this->preProb[$this->indexFrekuensi][$key] / $totalPreProb;
            } else {
                $tmpHasil = 0;
            }
            $this->preProb[$this->indexFrekuensi][$key] = $tmpHasil;
        }
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
        return $result;
    }

}
