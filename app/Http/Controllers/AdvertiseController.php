<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;
use DB;

class AdvertiseController extends Controller
{
    public function advertiseForm()
    {
    	return view('add-advertise');
    }

    public function storeAdvertise(Request $request)
    {
        $objQuery = new Advertise();
        $objQuery->advertise_name = $request->advertise_name;
        $objQuery->advertise_latitude = $request->advertise_latitude;
        $objQuery->advertise_longitude = $request->advertise_longitude;
        $objQuery->created_at = date('Y-m-d H:i:s');
        $objQuery->updated_at = NULL;
        $objQuery->save();

        return redirect('add-advertise')->with('success', 'Advertise has been added successfully.');
    }

    public function showAdvertise()
    {
        return view('advertise-list');
    }

    public function searchAdvertise(Request $request)
    {

        $advertiseData = DB::table("advertise")->get();

        $latitudeFrom = $request->cityLat;
        $longitudeFrom = $request->cityLng;

        $advertiseList = array();
        foreach($advertiseData as $key => $advertise)
        {
            $latitudeTo = $advertise->advertise_latitude;
            $longitudeTo = $advertise->advertise_longitude;

            //Calculate distance from latitude and longitude
            $theta = $longitudeFrom - $longitudeTo;
            $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            $distance = ($miles * 1.609344).' km';

            if(round($distance,0) <= round($request->radius,0))
            {
                $advertiseList[$key]['advertise_name'] = $advertise->advertise_name;
                $advertiseList[$key]['advertise_distance'] = round($distance, 2)." KM";
            }
        }
        // echo "<pre>"; print_r($advertiseList); exit;
        return view('search-advertise', compact("advertiseList"));
    }
}
