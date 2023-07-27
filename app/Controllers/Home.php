<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $komoditi = $this->request->getVar("komoditi");
        $wilayah = $this->request->getVar("wilayah");
        $is_show = $this->request->getVar("is_show");
        $jwt_token = getenv("JWT_TOKEN");
        $api_url = getenv("API_URL");
        $query = [
            "komoditi" => $komoditi,
            "wilayah" => $wilayah,
            "is_show" => $is_show
        ];
        $client = \Config\Services::curlrequest();
        $response = $client->get($api_url . '/api/komoditi', ["query" => $query, 'headers' => [
            'Authorization' => 'Bearer ' . $jwt_token
        ]]);
        $data = json_decode($response->getBody());
        $dictNamaKomoditi = [
            "BWGMRH"   => "Bawang Merah",
            "K0001" => "Kakao",
            "K0002" => "Jagung",
            "K0004" => "Beras Medium",
            "K0006" => "Kopi Robusta",
            "K0009" => "Karet",
            "K0010" => "Gabah",
            "K0015" => "Kopi Arabika",
            "K023" => "Lada Putih",
            "K0027" => "Kelapa Sawit"
        ];
        $dictNamaWilayah = [
            "BDG" => "Bandung",
            "AEK" => "Bpd Aeki Sumut",
            "BRB" => "Brebes",
            "CJR" => "Cianjur",
            "GPK" => "Gapki Sumatra Selatan",
            "JBI" => "Jambi",
            "KRI" => "Kendari",
            "KLK" => "Kolaka",
            "LEB" => "Lebak",
            "PDG" => "Padang",
            "PPG" => "Pangkal Pinang",
            "TSK" => "Tasikmalaya",
        ];
        foreach ($data as $i) {
            $i->nama_komoditi = $dictNamaKomoditi[$i->ckd_komoditi];
            $i->nama_wilayah = $dictNamaWilayah[$i->ckd_wilayah];
        }
        return view('welcome_message', ["data" => $data, "wilayah" => $dictNamaWilayah, "komoditi" => $dictNamaKomoditi, "query" => $query]);
    }
}
