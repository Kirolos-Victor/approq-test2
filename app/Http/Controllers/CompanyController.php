<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Country;

class CompanyController extends Controller
{
    public function fetchAllData()
    {
        $country = 'Canada';
        $countryId=Country::where('name','=',$country)->first();
        $data=Company::with('users','users.companies')
            ->where('country_id','=',$countryId)
            ->get();

        return response($data);
    }
}
