@extends('admin.layouts.app')
@section('title')
{{ $page_title }}
@stop
@section('stylecss')
@stop
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{ $page_title }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="exam.html">{{ $page_name }}</a></li>
                        <li class="breadcrumb-item active">{{ $page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="data1">
                <tbody>
                    <tr>
                       <td td colspan="12"><h4> Profile Image</h4></td>
                    </tr>
                    <tr>
                        <form id="submitForm" action="{{route('admin.vendor.image_approve',$vendor->id)}}" method="post">
                            @csrf
                            <td colspan="12">
                                <input type="checkbox" @if($vendor->image_status == 1) checked @endif style="margin: 10px;vertical-align: top;" value="{{$vendor->id}}" name="image" id="image">
                                <a href="{{ url('public/'.$vendor->image)}}" target="_blank">
                                <img src="{{ url('public/'.$vendor->image)}}" style="height: 100px; width: 100px;border-radius: 50%;">
                                </a>
                            </td>
                            <td style="vertical-align: middle;"><button class="btn btn-primary btn-lg" type="submit" id="submitButton">Approve</button></td>
                        </form>
                    </tr>
                    <form id="submitForm2" action="{{route('admin.vendor.image_approve',$vendor->id)}}" method="post">
                        @csrf
                    <tr>
                       <td colspan="12"><h4> Banner Images</h4></td>
                       <td colspan="12" style="vertical-align: middle;"><button class="btn btn-primary btn-lg" type="submit" id="submitButton2">Approve</button></td>
                    </tr>
                    <tr>
                    <td colspan="12">
                        <div class="row">
                            @foreach($vendor->banner_images as $key=>$val)
                                <div class="col-md-3">
                                    <input type="checkbox" @if($val->image_status == 1) checked @endif class="checkbox" style="margin: 10px;vertical-align: top;" value="{{$val->id}}" name="banner_images[]" id="banner_images">
                                    <a href="{{ url('public/'.$val->banner_images)}}" target="_blank">
                                    <img src="{{ url('public/'.$val->banner_images)}}" style="height: 100px; width: 100px;border-radius: 50%;margin-top: 10px;">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td colspan="12" style="vertical-align: middle;">
                        <input id="select-all" type="checkbox">
                        <label for="select-all"> Check All</label>
                    </td>
                    </tr>
                </form>
                <form id="submitForm3" action="{{route('admin.vendor.image_approve',$vendor->id)}}" method="post">
                    @csrf
                    <tr>
                       <td colspan="12"><h4> Past Work Images</h4></td>
                       <td colspan="12" style="vertical-align: middle;"><button class="btn btn-primary btn-lg" type="submit" id="submitButton3">Approve</button></td>
                    </tr>

                    <tr>
                        <td colspan="12">
                            <div class="row">
                                @foreach($vendor->past_work as $key=>$val)
                                    @if($val->is_image == 1)
                                    <div class="col-md-3">
                                        <input type="checkbox" @if($val->image_status == 1) checked @endif class="banner" style="margin: 10px;vertical-align: top;" value="{{$val->id}}" name="past_image[]" id="past_image">
                                        <a href="{{ url('public/'.$val->pastimage)}}" class="mt-2" target="_blank">
                                        <img src="{{ url('public/'.$val->pastimage)}}" style="height: 100px; width: 100px;border-radius: 50%;margin-top: 10px;">
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td colspan="12" style="vertical-align: middle;">
                            <input id="select-banner" type="checkbox">
                            <label for="select-banner"> Check All</label>
                        </td>
                    </tr>
                </form>
                <form id="submitForm4" action="{{route('admin.vendor.image_approve',$vendor->id)}}" method="post">
                    @csrf

                    <tr>
                       <td colspan="12"><h4> Past Work Video's</h4></td>
                       <td colspan="12" style="vertical-align: middle;"><button class="btn btn-primary btn-lg" type="submit" id="submitButton4">Approve</button></td>
                    </tr>

                    <tr>
                        <td colspan="12">
                            <div class="row">
                                @foreach($vendor->past_work as $key=>$val)
                                    @if($val->is_image == 0)
                                    <div class="col-md-3">
                                        <input type="checkbox" @if($val->image_status == 1) checked @endif class="banner_video" style="margin: 10px;vertical-align: top;" value="{{$val->id}}" name="past_video[]" id="past_video">
                                        <a href="{{$val->pastimage}}" class="mt-2" target="_blank">
                                        <img src="{{$val->thumbnail}}" style="height: 100px; width: 100px;border-radius: 50%;margin-top: 10px;">
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td colspan="12" style="vertical-align: middle;">
                            <input id="select-video" type="checkbox">
                            <label for="select-video"> Check All</label>
                        </td>
                    </tr>
                </form>
                    
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@stop

@section('scriptjs')

<script>
    $('#select-all').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('#select-banner').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.banner').each(function() {
                this.checked = true;
            });
        } else {
            $('.banner').each(function() {
                this.checked = false;
            });
        }
    });
    $('#select-video').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $('.banner_video').each(function() {
                this.checked = true;
            });
        } else {
            $('.banner_video').each(function() {
                this.checked = false;
            });
        }
    });


    $(function () {
           $('#submitForm').submit(function(){
            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
    $(function () {
           $('#submitForm2').submit(function(){
            var $this = $('#submitButton2');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm2').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm2')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm2')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
    $(function () {
           $('#submitForm3').submit(function(){
            var $this = $('#submitButton3');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm3').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm3')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm3')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
    $(function () {
           $('#submitForm4').submit(function(){
            var $this = $('#submitButton4');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();
            $.ajax({
                url: $('#submitForm4').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm4')[0]),
                success: function(data) {
                    if(data.status){
                        
                        successMsg('Create Banner', data.msg);
                        $('#submitForm4')[0].reset();
                        setTimeout(function() {
                          // alert(data.url);
                          location.reload();
                                }, 1000);
                        
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
						errorMsg('Create Banner', data.msg);
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create Banner', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }
            });
            return false;
           });
           
        });
</script>
@stop