<?php
function GetQuickCountData()
{
    // curl get data from api with no auth
    $url = "https://gateway.narasi.tv/core/api/quick-count/capres";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data;
}

function GetRealCountData()
{
    // curl get data from api with no auth
    $url = "https://sirekap-obj-data.kpu.go.id/pemilu/hhcw/ppwp.json";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data;
}

function GetCandidateList()
{
    // curl get data from api with no auth
    $url = "https://sirekap-obj-data.kpu.go.id/pemilu/ppwp.json";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return $data;
}