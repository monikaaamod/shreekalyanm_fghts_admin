@extends('admin.layouts.app')
@section('title')
    Role Create
@stop
@section('stylecss')

<style>
.checktoggle {
   
    margin: 0 auto;
}


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
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                        <div class="card-body">                    
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$newdata['page_title']}}</h4>
                            </div>
                            <form enctype="multipart/form-data" class="theme-form"
                                id="submitForm"action="{{ route('roles-store') }}" method="post">
                                @csrf
                                
                                <div class="row">
                                    
                                    <div class="col-12 col-sm-12">
                                        <div
                                            class="form-group
                                            local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" type="text" aria-describedby="" placeholder="Enter Name">
                                        </div>
                                    </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table">
                                                <thead>
                                                    <tr>
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="select-all" type="checkbox">
                                                            <label for="select-all"> Check All</label>
                                                        </div>
                                                        <th>Module Permission</th>
                                                        <th class="text-center">Master</th>
                                                        <th class="text-center">List</th>
                                                        <th class="text-center">Create</th>
                                                        <th class="text-center">Update</th>
                                                        <th class="text-center">Delete</th>
                                                        <th class="text-center">Permanent Delete / Restore</th>
                                                         <!--<th class="text-center">Restore</th>
                                                        <th class="text-center">Force Delete</th>
                                                        <th class="text-center">Excel</th>
                                                        <th class="text-center">PDF</th>
                                                        <th class="text-center">Print</th> -->
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($permission as $key => $vals)
                                                    <tr>
                                                        <td>{{ $vals->name }}</td>

                                                        <td class="text-center">
                                                            <input name="permission[]" onclick="setAllChildren(this)" type="checkbox" id="Primary{{ $vals->id }}" class="check childrens{{ $vals->id }}" value="{{ $vals->id }}">
                                                            <label for="Primary{{ $vals->id }}" class="checktoggle">{{ $vals->name }}</label>
                                                        </td>

                                                        @foreach ($vals->child_permission as $key => $valsd)
                                                        <td class="text-center">
                                                        <input name="permission[]" type="checkbox" id="Children{{ $valsd->id }}" class="check childrens{{ $vals->id }}" value="{{ $valsd->id }}">
                                                        <label for="Children{{ $valsd->id }}" class="checktoggle">{{ $valsd->name }}</label>

                                                        <!-- <input name="permission[]" value="{{ $valsd->id }}"
                                                                                        id="Children{{ $valsd->id }}"
                                                                                        class="childrens{{ $vals->id }}" type="checkbox">
                                                                                    <label for="Children{{ $valsd->id }}">
                                                                                        {{ $valsd->name }} </label> -->
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
                                            data-rest-text="Submit" class="btn btn-primary">Submit</button>
                                    </div>
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
