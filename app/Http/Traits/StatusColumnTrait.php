<?php

namespace App\Http\Traits;

trait StatusColumnTrait
{
    public function getStatusColumn($row, $baseUrl)
    {
        if ($row->status == 'Active') {
            return '<div class="form-check-inline">
                        <label class="form-check-label">
                           <span class="badge badge-success"> <input data-id=' . $row->id . ' type="checkbox" data-url="' . url($baseUrl . '/status/Inactive/' . base64_encode($row->id)) . '"   class="form-check-input status-check" value="Active" checked>  &nbsp; Active</span>
                        </label>
                    </div>
                    ';
        } else {
            return '
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <span class="badge badge-danger"><input data-id=' . $row->id . ' type="checkbox" data-url="' . url($baseUrl . '/status/Active/' . base64_encode($row->id)) . '"  class="form-check-input status-check"  value="Inactive"> Inactive</span>
                        </label>
                    </div>
                    ';
        }
    }
}
