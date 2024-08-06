@extends('admin.layouts.app')
@section('title')
{{$newdata['page_title']}}
@stop
@section('stylecss')

<link href="{{ asset('admin/assets/multiselectbox/css/multi-select.css') }}" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/summernote.css')}}">
 <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .ui-datepicker-calendar {
        display: none;
    }

    #previewContainer img {
        width: 200px !important;
        height: 200px !important;
        margin: 0 30px 30px 14px
    }

    #previewContainer .docDiv {
        height: 200px;
        overflow: auto;
       
    }

    .image-container {
        position: relative;
    }

    .delete-button {
      position: absolute;
      top: 0;
      right: 0;
      cursor: pointer;
      /* background-color: red; */
      color: red;
      font-size:15px;
      border: none;
      /* border-radius: 50%; */
      padding: 5px;
  }

  .select2-container {
    width: 100% !important;
}

  
 </style>

@stop
@section('content')
 
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="card-title card-title-dash">{{$newdata['page_title']}}</h4>
                            </div>
                            <form id="submitForm" method="post" action="{{ $newdata['url'] }}"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                            value="{{isset($post)?$post->name:''}}" />
                                        </div>
                                    </div>
                                    @if(!isset($post))
                                        <div class="col-md-6 mt-5">
                                            <div class="form-group" style="display: flex;justify-content: end;">
                                            <button class="btn btn-sm btn-primary me-2" type="button" id="AddChilds">Add Childs</button>
                                            </div>
                                        </div>
                                    

                                        <div class="row d-none" id="childs">
                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="childs[]" id="list" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="childs[]" id="create" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="childs[]" id="update" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="childs[]" id="delete" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="childs[]" id="permanent_delete" />
                                                </div>
                                            </div>
                                        </div>
                                    @elseif(isset($childs) && $childs != "")
                                        <div class="row">
                                            @foreach($childs as $key=>$val)
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <input type="hidden" name="childs_id[]" value="{{$val->id}}">
                                                        <input type="text" class="form-control" value="{{$val->name}}" name="childs[]" id="childs{{$key}}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    
                                    <div class="col-md-12 mt-3">
                                        <div class="card-footer"></div>
                                        <button type="submit" id="submitButton" class="btn btn-primary float-end save-assessment"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..."
                                            data-rest-text="Create">{{ $newdata['btn'] }}</button>
                                    </div>
                                </div>
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

<script>

        formHandler.initializeSimpleForm('submitForm', "{{ route('admin.permission') }}");

        $(document).ready(function () {
            $('#AddChilds').on('click', function(){
                var val = $('#name').val();
                var list = val + ' List';
                var create = val + ' Create';
                var update = val + ' Update';
                var dbutton = val + ' Delete';
                var pdbutton = val + ' Permanent Delete';

                $('#childs').removeClass('d-none');

                $('#list').val(list);
                $('#create').val(create);
                $('#update').val(update);
                $('#delete').val(dbutton);
                $('#permanent_delete').val(pdbutton);
                
                
            });
            
        });

        
</script>
@stop