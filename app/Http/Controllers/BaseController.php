<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use File;

class BaseController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {

        //echo $model; die;
        $this->model = $model;
    }

    public function destroy(Request $request, $id)
    {
        $id = base64_decode($id);

        $deleteItem = $this->model->find($id);
        $deleteItem->deleted_at = 1;
        $deleteItem->save();
        return response()->json(['status' => true, 'msg' => 'Item Deleted successfully']);
    }

    public function restore(Request $request, $id)
    {
        $id = base64_decode($id);
        $restoreItem = $this->model->find($id);
        $restoreItem->deleted_at = 0;
        $restoreItem->save();
        return response()->json(['status' => true, 'msg' => 'Item Restore successfully']);
    }

    // public function permanentdelete(Request $request, $id)
    // {
    //     $id = base64_decode($id);

    //     $data = $this->model->find($id);
    //     $large_image_path = public_path($data->large_image);  // Value is not URL but directory file path

    //     if(File::exists($large_image_path)) {
    //         File::delete($large_image_path);
    //     }
    //     $medium_image_path = public_path($data->medium_image);  // Value is not URL but directory file path
    //     if(File::exists($medium_image_path)) {
    //         File::delete($medium_image_path);
    //     }

    //     $small_image_path = public_path($data->small_image);  // Value is not URL but directory file path
    //     if(File::exists($small_image_path)) {
    //         File::delete($small_image_path);
    //     }

    //     $deleteItem = $this->model->find($id)->delete();
    //     return response()->json(['status' => true, 'msg' => 'Item Delete successfully', 'redirect_url' => route('admin.banner')]);
    // }

    public function status(Request $request, $status, $id)
    {
        
        $id = base64_decode($id);
     
        $item = $this->model->find($id);
        
        $item->status = $status;
        $item->save();
        
        return response()->json(['status' => true]);
    }

    public function account_status(Request $request, $account_status, $id)
    {
   
       // return "ff";
        $id = base64_decode($id);

        //echo $account_status; die;
        $verified = $this->model->find($id);

      
        $verified->account_status = $account_status;

       // print_r($verified); die;
        $verified->save();
       //    die;
        return response()->json(['account_status' => true]);
    }


    public function deleteimage($id)
    {
        $data = $this->model->find($id);

        $large_image_path = public_path($data->large_image);  // Value is not URL but directory file path
        if(File::exists($large_image_path)) {
            File::delete($large_image_path);
        }
        $medium_image_path = public_path($data->medium_image);  // Value is not URL but directory file path
        if(File::exists($medium_image_path)) {
            File::delete($medium_image_path);
        }

        $small_image_path = public_path($data->small_image);  // Value is not URL but directory file path
        if(File::exists($small_image_path)) {
            File::delete($small_image_path);
        }
    }

    function displaywords($number){
        $no = (int)floor($number);
        $point = (int)round(($number - $no) * 100);
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
         '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
         '7' => 'seven', '8' => 'eight', '9' => 'nine',
         '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
         '13' => 'thirteen', '14' => 'fourteen',
         '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
         '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
         '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
         '60' => 'sixty', '70' => 'seventy',
         '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
          $divider = ($i == 2) ? 10 : 100;
          $number = floor($no % $divider);
          $no = floor($no / $divider);
          $i += ($divider == 10) ? 1 : 2;
     
     
          if ($number) {
             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
             $str [] = ($number < 21) ? $words[$number] .
                 " " . $digits[$counter] . $plural . " " . $hundred
                 :
                 $words[floor($number / 10) * 10]
                 . " " . $words[$number % 10] . " "
                 . $digits[$counter] . $plural . " " . $hundred;
          } else $str[] = null;
       }
       $str = array_reverse($str);
       $result = implode('', $str);
     
     
       if ($point > 20) {
         $points = ($point) ?
           "" . $words[floor($point / 10) * 10] . " " . 
               $words[$point = $point % 10] : ''; 
       } else {
           $points = $words[$point];
       }
       if($points != ''){        
        return $result . "Rupees  " . $points . " Paise Only";
       } else {
     
           return $result . "Rupees Only";
       }
     
     }
}
