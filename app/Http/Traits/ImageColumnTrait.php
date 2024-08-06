<?php

namespace App\Http\Traits;

trait ImageColumnTrait
{
    public function getImageColumn($row, $imageColumn, $placeholderUrl = 'https://pipdigz.co.uk/p3/img/placeholder-square.png', $imageSize = '80px')
    {
        if ($row->$imageColumn) {
            $img = '<img src="' . asset($row->$imageColumn) . '" class="img-thumbnail" style="height: ' . $imageSize . ';width:auto;border-radius: inherit;" alt="">';
            // echo $img;die;
        } else {
            // echo "no";die;
            $img = '<img src="' . $placeholderUrl . '" style="height: ' . $imageSize . ';width:auto;border-radius: inherit;" />';
        }
        return $img;
    }
}
