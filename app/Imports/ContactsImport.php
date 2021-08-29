<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contact([
            'name'       => $row[0],
            'birthdate'  => $row[1],
            'telephone'  => $row[2],
            'address'    => $row[3],
            'creditcard_number' => Crypt::encryptString($row[4]),
            'creditcard_lastnumbers' => substr($row[4], -4),
            'franchise'  => '',
            'email'      => $row[5],
            'user_id'    => Auth::id(),
            'created_at' => now(),
        ]);
    }

    function getFranchise($ccnumber)
    {
        $franchise_catalog = [];
    }
}
