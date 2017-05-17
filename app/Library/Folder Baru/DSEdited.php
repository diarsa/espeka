<?php

namespace App\Library;

class DSEdited {

    // Untuk Pre Combinasi
    private $c = array();

    // Untuk hitungan selanjutnya
    private $cHasil = array();

    // Tampung nilai probabilitas
    private $probVal = array();

    private $indexKejadian = 0;

    private $nilaiTeta = 0;

    const TETA = 'teta';

    private $isUsingResultFirstTime = false;

    public function __construct() {}

    /**
    * Fungsi untuk mencari kejadian yang sama
    * @param $kejadian kejadian hasil query
    */
    public function CariKejadianSama($kejadian) {
        $value_obj  = $kejadian[0]['values'];
        // Variable untuk mendapatkan total objek yang sama
        $objekSama = 0;

        $t = array();
        // Todo: Inisialisasi nilai awal = 0
        foreach ($kejadian as $kj) {
            $t[$kj['values']] = 0;
        }

        // Todo: Cari kejadian yang sama
        for ($i = 0; $i < sizeof($kejadian); $i++) {
            $t[$kejadian[$i]['values']]++;
            $objekSama++;
        }

        // Todo: Bagi untuk mendapatkan nilai desimal
        foreach ($t as $a => $val) {
            $t[$a] = $val / $objekSama;
        }

        $this->c[$this->indexKejadian] = $t;

        // print_r($this->c[$this->indexKejadian]);
        // echo "<hr>";

        $this->indexKejadian++;
    }

    /**
    * Fungsi ini digunakan untuk melakukan perkalian
    * Dikalikan berdasarkan indeks kejadian terakhir,
    * misalkan indexKejadian = 1, maka yang dikalikan adalah
    * index 0 dan 1
    * @param $isUsingResult (boolean) untuk mengetahui bahwa
    *       gunakan hasil perhitungan terakhir
    */
    public function PreKombinasi() {
        $c1 = array();
        $c2 = array();

        if (!$this->isUsingResultFirstTime) {
            $c1 = $this->c[0];
            $c2 = $this->c[1];
            $this->isUsingResultFirstTime = true;
        } else {
            $c1 = $this->cHasil;
            $c2 = $this->c[$this->indexKejadian - 1];
            $this->cHasil = array();
        }

        $this->nilaiTeta = 0;
        $nilaiTeta = 0;

        foreach ($c1 as $key => $value) {
            foreach ($c2 as $key1 => $value1) {
                // Todo: Cari string yang sama
                $newkey = '';
                $isSameKey = $this->adaKeySama($key, $key1);
                if ($isSameKey) {
                    // Cari value jika ada sebelumnya
                    $newkey = $this->GetSameKey($key, $key1);
                    $p = isset($this->cHasil[$newkey]) ? $this->cHasil[$newkey] : 0;
                    $hasilHitung = $p + $value * $value1;
                    $this->cHasil[$newkey] = $hasilHitung;
                    // echo 'A: ' . $key . ' | ' . $key1 . ' | HSL= '. ($value * $value1) .'<br>'; 
                } else {
                    $nilaiTeta += $value * $value1;
                    // echo "A: ". $key ." | ". $key1 ." TETA: " . ($value * $value1) . '<br>';
                }

                // $newkey = $this->GetSameKey($key, $key1);



                // echo 'A: ' . $key . ' val = '. $value .' | ' . $key1 . ' val= '. $value1 .' | HSL= '. ($value * $value1) .'<br>'; 

                // echo 'A: ' . $key . ' | ' . $key1 . ' | HSL= '. ($value * $value1) .'<br>'; 

                // if (!$isSameKey) {
                //  $this->nilaiTeta += $hasilHitung;
                // }
            }
        }

        // print_r($this->cHasil);

        // $this->nilaiTeta = 1 - $this->cHasil[self::TETA];
        $this->PreHasilKombinasi(1 - $nilaiTeta);
    }

    public function KombinasiDenganBayes($bayesResult) {
        $c1 = array();
        $c2 = array();

        $c1 = $this->cHasil;
        $c2 = $bayesResult;
        $this->cHasil = array();

        $this->nilaiTeta = 0;
        $nilaiTeta = 0;

        foreach ($c1 as $key => $value) {
            foreach ($c2 as $key1 => $value1) {
                // Todo: Cari string yang sama
                $newkey = '';
                $isSameKey = $this->adaKeySama($key, $key1);
                if ($isSameKey) {
                    // Cari value jika ada sebelumnya
                    $newkey = $this->GetSameKey($key, $key1);
                    $p = isset($this->cHasil[$newkey]) ? $this->cHasil[$newkey] : 0;
                    $hasilHitung = $p + $value * $value1;
                    $this->cHasil[$newkey] = $hasilHitung;
                    // echo 'A: ' . $key . ' | ' . $key1 . ' | HSL= '. ($value * $value1) .'<br>'; 
                } else {
                    $nilaiTeta += $value * $value1;
                    // echo "A: ". $key ." | ". $key1 ." TETA: " . ($value * $value1) . '<br>';
                }

                // $newkey = $this->GetSameKey($key, $key1);



                // echo 'A: ' . $key . ' val = '. $value .' | ' . $key1 . ' val= '. $value1 .' | HSL= '. ($value * $value1) .'<br>'; 

                // echo 'A: ' . $key . ' | ' . $key1 . ' | HSL= '. ($value * $value1) .'<br>'; 

                // if (!$isSameKey) {
                //  $this->nilaiTeta += $hasilHitung;
                // }
            }
        }

        // print_r($this->cHasil);

        // $this->nilaiTeta = 1 - $this->cHasil[self::TETA];
        $this->PreHasilKombinasi(1 - $nilaiTeta);
    }

    public function getHasil() {
        return $this->cHasil;
    }

    private function PreHasilKombinasi($finalTetaValue) {
        foreach ($this->cHasil as $key => $value) {
            $this->cHasil[$key] = $value / $finalTetaValue; 
        }

        // print_r($this->cHasil);
    }

    /**
    * Fungsi untuk mendapatkan key yang sama
    * ex: 20,21 & 20,21,22 = 20,21
    * @param key1
    * @param key2
    * @return key sama yang sudah di kombinasikan
    */
    private function GetSameKey($key1, $key2) {
        $explodedKey1 = explode(',', $key1);
        $explodedKey2 = explode(',', $key2);

        $newkey = '';
        // echo $key1 . ', ' . $key2 . '<br>';
        for ($i = 0; $i < sizeof($explodedKey1); $i++) {
            for ($j = 0; $j < sizeof($explodedKey2); $j++) {
                // echo $explodedKey1[$i] . ', '. $explodedKey2[$j] . '<br>';
                if ($explodedKey1[$i] == $explodedKey2[$j]) {
                    $newkey .= $explodedKey1[$i] . ',';
                } 
            }
        } 
        $newkey = rtrim($newkey, ',');
        return $newkey;
    }

    /**
    * Fungsi untuk mendapatkan key yang sama
    * ex: 20,21 & 20,21,22 = 20,21
    * @param key1
    * @param key2
    * @return boolean
    */
    private function adaKeySama($key1, $key2) {
        $explodedKey1 = explode(',', $key1);
        $explodedKey2 = explode(',', $key2);

        $newkey = false;
        for ($i = 0; $i < sizeof($explodedKey1); $i++) {
            for ($j = 0; $j < sizeof($explodedKey2); $j++) {
                if ($explodedKey1[$i] == $explodedKey2[$j]) {
                    $newkey = true;
                } 
            }
        } 
        return $newkey;
    }

    public function getNilaiProbabilitas() {
        $result = array();
        // Get key from c
        $nc = array();
        for ($i = 0; $i < $this->indexKejadian; $i++) {
            foreach ($this->c[$i] as $key => $value) {
                $nc[] = $key;
            }
        }

        foreach ($nc as $key => $value) {
            $result[$value] = 0;
        }

        // print_r($nc);

        // first run
        foreach ($result as $k => $v) {
            $x = isset($this->c[0][$k]) ? $this->c[0][$k] : 0;
            $result[$k] = $x;
        }

        // second run
        foreach ($result as $k => $v) {
            // echo $k . '<br>';
            for ($i = 1; $i < $this->indexKejadian; $i++) {
                $x = isset($this->c[$i][$k]) ? $this->c[$i][$k] : 0;
                // echo $x . ' <br> ';
                $result[$k] *= $x;
            }
        }

        // print_r($result);


        // foreach($this->c as $indexProb) {
        //  foreach ($indexProb as $keys => $val) {
        //      $v = isset($this->probVal[$keys]) ? $this->probVal[$keys] : 1;
        //      $vs = $val * $v;
        //      $this->probVal[$keys] = $vs;
        //  }
        //  // echo "<hr>";
        // }
        // print_r($this->probVal);

        return $result;
    }

    public function Debug() {
        // print_r($this->c);
    }
}