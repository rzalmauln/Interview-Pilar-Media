<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getProvinsi()
    {
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');

        if ($response->successful()) {
            $provinces = $response->json();
            return response()->json($provinces);
        } else {
            return response()->json(['error' => 'Failed to fetch provinces'], $response->status());
        }
    }

    public function getKabupaten($idProvisi)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/' . '' . $idProvisi . '' . '.json');

        if ($response->successful()) {
            $regencies = $response->json();
            return response()->json($regencies);
        } else {
            return response()->json(['error' => 'Failed to fetch regencies'], $response->status());
        }
    }

    public function getKecamatan($idKabupaten)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/' . '' . $idKabupaten . '' . '.json');

        if ($response->successful()) {
            $districts = $response->json();
            return response()->json($districts);
        } else {
            return response()->json(['error' => 'Failed to fetch districts'], $response->status());
        }
    }

    public function getKelurahan($idKecamatan)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/villages/' . '' . $idKecamatan . '' . '.json');

        if ($response->successful()) {
            $villages = $response->json();
            return response()->json($villages);
        } else {
            return response()->json(['error' => 'Failed to fetch villages'], $response->status());
        }
    }
}
