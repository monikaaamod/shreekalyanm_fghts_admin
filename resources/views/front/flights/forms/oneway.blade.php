<div class="hmg-frm">
    <form action="{{route('flights.list')}}" id="oneWayForm" method="post">
        @csrf
        <div class="row gx-1">
            <input type="hidden" name="type" id="type" value="O">
            <input type="hidden" name="no_segments" id="no_segments" value="1">
            <div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
                <span class="frm-tpname">Form</span>
                <input type="text" class="form-control autocomplete" value="@if(isset($requestd_data) && isset($requestd_data['origin'])) {{$requestd_data['origin']}} @endif" id="from_city" name="from_city" Placeholder="Enter City">

                <input type="hidden" name="origin_country" id="origin_country">
            </div>
            <div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
                <span class="frm-tpname">To</span>

                <input type="text" class="form-control autocomplete" id="to_city" name="to_city" value="@if(isset($requestd_data) && isset($requestd_data['destination'])) {{$requestd_data['destination']}} @endif" Placeholder="Enter City">
                <button class="interchange" data-from="from" data-to="to" type="button"><i class="far fa-exchange"></i></button>
                <input type="hidden" name="destination_country" id="destination_country">
            </div>
            <div class="form_bx col-lg-3 col-md-4 col-sm-6">
                <span class="frm-tpname">Departure</span>
                <div class="form-group">
                    <input type='text' name="departure" id="departure" value="@if(isset($requestd_data) && isset($requestd_data['flight_depart_date']) && $requestd_data['type'] == 'O') {{$requestd_data['flight_depart_date']}} @endif" class="form-control input-lg date" Placeholder="Enter Departure"/>
                </div>
            </div>
            <div class="form_bx col-lg-3 col-md-4 col-sm-6">
                <div class="form-group local-forms">
                <span class="frm-tpname">Travellers</span>
                    <div class="trav_engine">
                        <input type="text" id="txtTotalTravelers" class="txt_Traveler form-control" name="travelers" value="@if(isset($requestd_data) && isset($requestd_data['travelers']) && $requestd_data['type'] == 'O') {{$requestd_data['travelers']}} @else 1 Traveler(s),{{$class[0]->title}} @endif" readonly="readonly" />
                        <div class="trav_toggle open" style="width: 86%;">
                            <a href="#">Open</a>
                        </div>
                        <div class="trav_form" style="display: none;">
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Adults
                                    <span>12+ yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:process(-1)">-</a>
                                    <input type="text" value="@if(isset($requestd_data) && isset($requestd_data['ADT']) && $requestd_data['type'] == 'O') {{$requestd_data['ADT']}} @else 1 @endif" id="ddlAdult" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:process(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Children
                                    <span>2 - 11 yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:process2(-1)">-</a>
                                    <input type="text" value="@if(isset($requestd_data) && isset($requestd_data['CHD']) && $requestd_data['type'] == 'O') {{$requestd_data['CHD']}} @else 0 @endif" id="ddlChild" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:process2(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Infants
                                    <span>under 2 yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:process3(-1)">-</a>
                                    <input type="text" value="@if(isset($requestd_data) && isset($requestd_data['INF']) && $requestd_data['type'] == 'O') {{$requestd_data['INF']}} @else 0 @endif"  id="ddlInfant" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:process3(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1 w-100">
                                    <!--<lable >Choose Travel Class</lable>-->
                                    <select class="form-control h-100" onchange="GetClass(this);" name="class" id="class">
                                        <!--<option value="">Select Travel Class</option>-->
                                        @foreach($class as $key=>$val)
                                            <option data-id="{{$val->title}}"  @if(isset($requestd_data) && $requestd_data['class'] == $val->title && $requestd_data['type'] == 'O') selected @endif value="{{$val->title}}">{{$val->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="trav_item">
                                <span class="trav_done">Done</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="row align-items-center">
                    <div class="round-radio fare col-xl-2 col-lg-4 col-md-12 col-sm-12 mb-2">
                        <p>Fare Type:</p>
                    </div>
                    @foreach($fare_type as $key=>$val)
                        <div class="round-radio fare col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 mb-2">
                            <label class="radio  @if(isset($requestd_data)) @if($requestd_data['flexi'] == $val->id  && $requestd_data['type'] == 'O') fare-check @endif  @elseif($key == 0) fare-check @endif " onclick="SetActiveBox(this);">
                            <input type="radio" name="fare_type" @if(isset($requestd_data)) @if($requestd_data['flexi'] == $val->id  && $requestd_data['type'] == 'O') checked @endif  @elseif($key == 0) checked @endif value="{{$val->id}}" class="rdobtn">
                                <span class="checkmark"></span>
                                <em>{{$val->title}}</em>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 text-end mt-2">
                <!--<a href="{{route('flights')}}">--><button class="thm-shrt-btn rounded" type="submit" id="oneWayButton"> SEARCH FLIGHTS</button><!--</a> -->
            </div>
        </div>
    </form>
</div>