<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class home1Conroller extends Controller
{
    public function checkReferal($id)
    {
        if(User::where('referring_code',$id)->exists())
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function checkEmail($id)
    {
        if(User::where('email',$id)->exists())
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
    public function getCity($id)
    {
        $cities = DB::table('cities')->where('state',$id)->get();
        $html = <<<EOD
            <span><i aria-hidden="true" class="fa fa-building-o"></i></span>    
            <select name="city" id="city">
                <option value="" selected disabled>City</option>
EOD;
                foreach ($cities as $city)
                {
                $html .=<<<EOD
                <option value="$city->id">$city->name</option>
EOD;
                }
                $html .=<<<EOD
                </select>
EOD;
                return $html;


    }
}
