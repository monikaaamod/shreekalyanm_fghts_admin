<?php

namespace App\Http\Traits;

trait AccountStatusColumnTrait
{
    public function getAccountStatusColumn($row, $baseUrl)
    {   
      
        if ($row->account_status == 'blocked') {
            return '<div class="form-check-inline">
                        <label class="form-check-label">
                           <span class="badge badge-danger"> <input data-id=' . $row->id . ' type="checkbox" data-url="' . url($baseUrl . '/account_status/varified/' . base64_encode($row->id)) . '"   class="form-check-input account_status-check" value="verified" checked>  &nbsp; Blocked</span>
                        </label>
                    </div>
                    ';
        } else {
            return '
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <span class="badge badge-success"><input data-id=' . $row->id . ' type="checkbox" data-url="' . url($baseUrl . '/account_status/blocked/' . base64_encode($row->id)) . '"  class="form-check-input account_status-check"  value="Unverified"> Varified</span>
                        </label>
                    </div>
                    ';
        }
    }
}
