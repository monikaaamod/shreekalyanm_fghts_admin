<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\Airport;
use App\Models\TravelClass;
use App\Models\Aircraft;
use App\Models\Airlines;
use App\Models\FareType;
use App\Models\TourCity;
use App\Models\TourState;
use App\Models\TourCountry;
use Carbon\Carbon;
/// for reuse methods ///
use Intervention\Image\Facades\Image;
use App\Http\Controllers\BaseController;
use App\Http\Traits\ActionButtonsTrait;
use App\Http\Traits\StatusColumnTrait;
use App\Http\Traits\ImageColumnTrait;

class SearchFlightsController extends BaseController
{

    use ActionButtonsTrait;
    use StatusColumnTrait;
    use ImageColumnTrait;

     // For  destroy, restore, permanentdelete, and status methods.
     public function __construct()
     {
         parent::__construct(new Airport());
     }
     //+
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function search_flights()
    {
        // echo "hello";exit;
        $data['page_name']= 'Search';
        $data['airports']= Airport::where('status','Active')->get();
        $data['class']= TravelClass::where('status','Active')->get();
        $data['fare_type']= FareType::where('status','Active')->get();
        $data['airline']= Airlines::where('status','Active')->get();
        $data['page_title'] = "Search For Flights";
        $data['page_url'] = route('admin.agency.store');
        $data['method'] = 'POST';
       
        return view('admin.search.search_flights',$data);
    }


    public function flights()
    {
        // echo "hello";exit;
        $data['page_name']= 'Flights';
        $data['page_title'] = "Flights";
        $data['airports']= Airport::where('status','Active')->get();
        $data['class']= TravelClass::where('status','Active')->get();
        $data['airline']= Airlines::where('status','Active')->get();
        $data['aircraft']= Aircraft::where('status','Active')->get();
        
        return view('admin.search.flights',$data);
    }



}
