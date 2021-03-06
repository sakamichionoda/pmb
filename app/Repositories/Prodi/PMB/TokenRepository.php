<?php

namespace App\Repositories\Prodi\PMB;

use App\Models\PMB\Token;

class TokenRepository
{
    public function getAllData()
    {
        $getMataKuliah = MataKuliah::orderBy('created_at', 'DESC')
            ->get();
        
        return $getMataKuliah;
    }

    public function getSingleData($id)
    {
        $getMataKuliah = MataKuliah::where('id', '=', $id)
            ->firstOrFail();

        return $getMataKuliah;
    }

    public function getSingleDataForSoal($token)
    {
        $getToken = Token::where('token', '=', $token)
            ->first();
            
        return $getToken;
    }

    public function getSingleDataForBlogDetail($slug)
    {
        $getMataKuliah = MataKuliah::where('slug', '=', $slug)
            ->firstOrFail();

        return $getMataKuliah;
    }

    public function storeTokenData($data)
    {
        $storeTokenData = Token::create($data);
        
        return $storeTokenData;
    }

    public function updateFromSoalData($data, $kode)
    {
        $updateToken = Token::where('kode_soal', '=', $kode)
            ->update($data);

        return $updateToken;
    }

    public function updateOnlyStatus($data, $token)
    {
        $updateMataKuliah = Token::where('token', $token)
            ->update($data);

        return $updateMataKuliah;
    }

    public function destroyTokenData($token)
    {
        $destroyToken = Token::where('token', '=', $token)
            ->delete();

        return $destroyToken;
    }
}
