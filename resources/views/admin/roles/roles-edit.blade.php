@extends('admin.layouts.app')
@section('title')
Roles Edit
@stop
@section('stylecss')

<style>
    .check {
    display: block;
    margin: 0;
    padding: 0;
    width: 0;
    height: 0;
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    position: absolute;
}

.check:checked + .checktoggle {
    background-color: #3d5ee1;
    border: 1px solid #3d5ee1;
}

.check:checked + .checktoggle:after {
    background-color: #fff;
    left: 100%;
    transform: translate(calc(-100% - 5px), -50%);
}

.checktoggle {
    background-color: #fff;
    border: 1px solid rgba(0, 0, 0, 0.25);
    border-radius: 12px;
    cursor: pointer;
    display: block;
    font-size: 0;
    height: 24px;
    margin-bottom: 0;
    position: relative;
    width: 48px;
}

.checktoggle:after {
    content: " ";
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(5px, -50%);
    width: 16px;
    height: 16px;
    background-color: rgba(0, 0, 0, 0.25);
    border-radius: 50%;
    transition: left 300ms ease, transform 300ms ease;
}
</style>
@stop
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$newdata['page_title']}}</h4>
                            </div>
                            <form enctype="multipart/form-data" class="theme-form" id="submitForm" method="POST"
                                action="{{ $newdata['url'] }}">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-12">
                                        <div class="form-group local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{explode('_', $post['name'])[0] ?? ''}}" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Name">
                                        </div>
                                    </div>

                                            <table class="table table-striped custom-table">
                                                <thead>
                                                    <tr>

                                                        <div class="checkbox checkbox-primary">
                                                            <input id="select-all" type="checkbox">
                                                            <label for="select-all"> Check All</label>
                                                        </div>

                                                        <th>Module Permission</th>
                                                        <th>Master</th>
                                                        <th>List</th>
                                                        <th>Create</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                        <th>Permanent Delete / Restore</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permission as $key => $vals)
                                                    <tr>
                                                        <td>{{ $vals->name }}</td>

                                                        <td class="text-center">
                                                            <input name="permission[]" onclick="setAllChildren(this)" type="checkbox" id="Primary{{ $vals->id }}" @if (in_array($vals->id, $rolePermissions)) checked @endif  class="check childrens{{ $vals->id }}" value="{{ $vals->id }}">
                                                            <label for="Primary{{ $vals->id }}" class="checktoggle">{{ $vals->name }}</label>
                                                        </td>

                                                        @foreach ($vals->child_permission as $key => $valsd)
                                                        <td class="text-center">
                                                        <input name="permission[]" type="checkbox" @if (in_array($valsd->id, $rolePermissions)) checked @endif id="Children{{ $valsd->id }}" class="check childrens{{ $vals->id }}" value="{{ $valsd->id }}">
                                                        <label for="Children{{ $valsd->id }}" class="checktoggle">{{ $valsd->name }}</label>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>



                                </div>
                                <div class="card-footer">
                                    <button id="submitButton" type="submit"
                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i> Saving..."
                                    data-rest-text="Save" class="btn btn-primary"> <i class="fa fa-save"></i>
                                    Save</button>

                                </div>
                                
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scriptjs')

    <script src="{{ asset('admin/assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone-script.js') }}"></script>

    <script type="text/javascript">
        $('#select-all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        function setAllChildren(thisOBJ) {

            var childrenID = $(thisOBJ).val();


            $.each($(".childrens" + childrenID), function(key, val) {

                if ($(thisOBJ).prop("checked")) {
                    $(this).prop("checked", true);
                } else {
                    $(this).prop("checked", false);
                }

            })
        }

        formHandler.initializeForm('submitForm', "{{ route('roles-list') }}",'');

    </script>
@stop
