<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    public function getdata($id = false)
    {
        if ($id == false) {
            $link = "http://localhost/restfull/public/users/";
            // return $this->findAll();
        } else {
            $link = "http://localhost/restfull/public/users/" . $id;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
