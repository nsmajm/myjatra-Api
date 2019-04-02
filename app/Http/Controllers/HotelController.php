<?php

namespace App\Http\Controllers;

use App\Model\HotelImageModel;
use App\Model\HotelInfoModel;
use App\Model\RoomPriceModel;
use Illuminate\Http\Request;
use Spatie\JsonApiPaginate;

class HotelController extends Controller
{
    public function hotelDetails(Request $request){
        $hotelInfo = HotelInfoModel::findOrFail($request->id);
        $roomPrice = RoomPriceModel::select('roomName','roomPrice')->where('hotel_id',$request->id)->get();
        $hotelImages = HotelImageModel::select('image_path')->where('hotel_id',$request->id)->get();
        return response()->json(array('hotelInfo'=>$hotelInfo,'roomPrice'=>$roomPrice,'hotelImage'=>$hotelImages));
    }
    public function getAllHotel(){
        $hotelInfo = HotelInfoModel::jsonPaginate(5);
        return response()->json($hotelInfo);
    }
    public function getApiLink(){
        return response()->json(array(
           "thumbnail"=>"http://portal.edugridbd.com/images/Hotel/Thumbnail",
           "gallery"=>"http://portal.edugridbd.com/images/Hotel/Gallery",
        ));
    }
}
