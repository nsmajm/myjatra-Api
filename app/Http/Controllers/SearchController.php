<?php

namespace App\Http\Controllers;

use App\Model\DistrictModel;
use App\Model\DivisionModel;
use App\Model\HotelInfoModel;
use App\Model\SubDistrictModel;
use App\Model\UnionBdModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function hotelSearch(Request $request){
        $rules = $request->get('rules');
        $result = HotelInfoModel::select('id', 'hotel_name', 'hotelPrice', 'phone', 'thumbnail')
            ->where('hotel_name','LIKE','%' . $rules . '%')
            ->orWhere('division_id','LIKE','%' . $rules . '%')
            ->orWhere('district_id','LIKE','%' . $rules . '%')
            ->orWhere('union_id','LIKE','%' . $rules . '%')->jsonPaginate(10);
        return $this->transformToArray($result);
    }
    public function transformToArray($results){
       foreach($results as $hotel)
       {
           return [
               'hotel_id' =>$hotel->id,
               'hotel_name' =>$hotel->hotel_name
           ];
       }
        return $hotel->id;
        }


    public function searchSuggestion(Request $request){
        $rules = $request->get('rules');
        $result = HotelInfoModel::select('hotel_name','id')->where('hotel_name','LIKE','%' . $rules . '%')
            ->UNION(SubDistrictModel::select('sub_district_name','sub_district_id')->where('sub_district_name','LIKE','%' . $rules . '%'))
            ->UNION(DistrictModel::select('district_name','district_id')->where('district_name','LIKE','%' . $rules . '%'))
            ->UNION(UnionBdModel::select('union_name','union_id')->where('union_name','LIKE','%' . $rules . '%'))
            ->UNION(DivisionModel::select('division_name','division_id')->where('division_name','LIKE','%' . $rules . '%'))
            ->get();
        return response()->json(($result));
    }
}
