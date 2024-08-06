<?php

namespace App\Http\Traits;
use Route;

trait ActionButtonsTrait
{
    public function actionButtons($row, $editRoute, $deleteRoute, $showRoute = null, $restoreRoute = null, $permanentDeleteRoute = null)
    {
        if ($row->deleted_at) {
            $btn = '<button type="button" id="restoreButton" data-url="' . route($restoreRoute, base64_encode($row->id)) . '" class="edit btn btn-primary p-2 restoreButton" data-loading-text="Restore...." data-rest-text="Restore"><i class="fas fa-trash-restore fa-sm"></i></button>';
            $btn .= ' <button type="button" id="permanentdelete" data-url="' . route($permanentDeleteRoute, base64_encode($row->id)) . '" class="edit btn btn-danger p-2 permanentdelete" data-loading-text="Delete...." data-rest-text="Delete"><i class="fas fa-trash fa-sm"></i></button>';
        } else {
            $btn = '';
            if (!empty($editRoute)) {
                $btn .= '<a href="' . route($editRoute, base64_encode($row->id)) . '" class="edit btn btn-primary p-2"><i class="fas fa-edit fa-sm"></i></a>';
            }
            if (!empty($showRoute)) {
                $btn .= ' <a href="' . route($showRoute, base64_encode($row->id)) . '" class="view btn btn-info p-2"><i class="fas fa-eye fa-sm"></i></a>';
            }
            if (!empty($deleteRoute)) {
            $btn .= ' <button type="button" id="deleteButton" data-url="' . route($deleteRoute, base64_encode($row->id)) . '" class="edit btn btn-danger p-2 deleteButton" data-loading-text="Deleted...." data-rest-text="Delete"><i class="fas fa-trash fa-sm"></i></button>';
            }
           // $route = $request->path();
        
            if(Route::current()->getName() == "admin.vendor" && $row->status != "Completed"){
                if($row->status == "New"){
                    $option = '<select class="form-select" id="status" name="status" required>
                                    //<option disable>Select</option>
                                    <option value="Pending">Pending</option>
                                    <option value="New">New</option>
                                    <option value="Completed">Completed</option>
                                </select>';
                }
                if($row->status == "Pending"){
                    $option = '<select class="form-select" id="status" name="status" required>
                                    //<option disable>Select</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                </select>';
                }
                if($row->status == "Confirm"){
                    $option = '<select class="form-select" id="status" name="status" required>
                                    //<option disable>Select</option>
                                    <option value="Completed">Completed</option>
                                </select>';
                }
                if($row->status == "Completed"){
                    $option = '';
                }
            $btn .= '<button type="button" class="btn btn-primary p-2" style="margin-left:4px;" data-url="' . route('admin.vendor.status.update', base64_encode($row->id)) . '" data-bs-toggle="modal" data-bs-target="#myModal'.$row->id.'">
            Change Status
          </button>
          
          <!-- The Modal -->
          <div class="modal" id="myModal'.$row->id.'">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <form id="updateStatus" action="'.route('admin.vendor.status.update',$row->id).'"  method="post"> ';
                $btn .= csrf_field();
                $btn .= '
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Update Report Status</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                            data-bs-original-title="" title=""></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <input type="hidden" name="vendor_id" value="'.$row->id.'"/>
                            <label class="col-form-label" for="recipient-name">Status:</label>
                            '.$option.'
                        </div>
                   <div class="mb-3">
                            <label class="col-form-label" for="message-text">Comment:</label>
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="update-status-button"
                            type="submit" data-bs-original-title="" title="">Update</button>
                    </div>
                </form>
          
              </div>
            </div>
          </div>'; }             
        }
        return $btn;
    }
}
