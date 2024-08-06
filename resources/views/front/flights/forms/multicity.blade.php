<div class="hmg-frm">
    <form action="{{route('flights.list')}}" method="post" id="multicityForm">
        @csrf
        <div class="row gx-1">
            <input type="hidden" name="type" id="type" value="M">
            <input type="hidden" name="no_segments" id="no_segments" value="3">
            <div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
                <span class="frm-tpname">Form</span>
                <input type="text" class="form-control autocomplete" id="from_city2" name="from_city2" Placeholder="Enter City">

                <!-- <select name="from[]" id="from2" class="form-control multi" onchange="GetCountry(this);" data-id="#origin_countryM">
                    <option value=""></option>
                    @foreach($airports as $key=>$val)
                        <option value="{{$val->code}}" data-country="{{$val->country_code}}">{{$val->name}} ({{$val->code}})</option>
                    @endforeach
                </select> -->
                <input type="hidden" name="origin_country[]" id="origin_countryM">
            </div>
            <div class="form_bx col-lg-3 col-md-6 col-sm-6 col-6">
                <span class="frm-tpname">To</span>
                <input type="text" class="form-control autocomplete" id="to_city2" name="to_city2" Placeholder="Enter City">

                <!-- <select name="to[]" id="to2" class="form-control multi" onchange="GetCountry(this);" data-id="#destination_countryM">
                    <option value=""></option>
                    @foreach($airports as $key=>$val)
                        <option value="{{$val->code}}" data-country="{{$val->country_code}}">{{$val->name}} ({{$val->code}})</option>
                    @endforeach
                </select> -->
                <button class="interchange" data-from="from2" data-to="to2" type="button"><i class="far fa-exchange"></i></button>
                <input type="hidden" name="destination_country" id="destination_countryM">
            </div>
            <div class="form_bx col-lg-3 col-md-4 col-sm-6">
                <span class="frm-tpname">Departure</span>
                <div class="form-group">
                    <input type='text' name="departure[]" id="departureM" class="form-control input-lg date" />
                </div>
            </div>
            <div class="form_bx col-lg-3 col-md-4 col-sm-6">
                <div class="form-group local-forms">
                <span class="frm-tpname">Travellers</span>
                    <div class="trav_engine">
                        <input type="text" id="txtTotalTravelers2" class="txt_Traveler form-control" name="travelers" value="1 Traveler(s),{{$class[0]->title}}" readonly="readonly" />
                        <div class="trav_toggle open">
                            <a href="#">Open</a>
                        </div>
                        <div class="trav_form" style="display: none;">
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Adults
                                    <span>12+ yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:processM(-1)">-</a>
                                    <input type="text" value="{{isset($post)?$post->adults:'1'}}" id="ddlAdult2" name="adults" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:processM(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Children
                                    <span>2 - 11 yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:processM2(-1)">-</a>
                                    <input type="text" value="{{isset($post)?$post->childs:'0'}}" id="ddlChild2" name="childs" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:processM2(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1">
                                    Infants
                                    <span>under 2 yrs</span>
                                </div>
                                <div class="trav_inner2">
                                    <a href="javascript:void(0)" class="minus" onclick="javascript:processM3(-1)">-</a>
                                    <input type="text" value="{{isset($post)?$post->infants:'0'}}" id="ddlInfant2" name="infants" class="txt_trav" readonly="readonly" onkeypress="return false;" />
                                    <a href="javascript:void(0)" class="plus" onclick="javascript:processM3(1)">+</a>
                                </div>
                            </div>
                            <div class="trav_item">
                                <div class="trav_inner1 w-100">
                                    <!--<lable >Choose Travel Class</lable>-->
                                    <select class="form-control h-100" onchange="GetClassM(this);" name="class" id="class2">
                                        <!--<option value="">Select Travel Class</option>-->
                                        @foreach($class as $key=>$val)
                                            <option data-id="{{$val->title}}" value="{{$val->title}}">{{$val->title}}</option>
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
            <div id="MultiCity"></div>
            <div class="form_bx col-lg-12 col-md-4 col-sm-6">
                <button type="button" class="btn btn-outline-danger btn-fw btn-sm" onclick="AddMultiCity();">Add City</button>
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
                                <label class="radio @if($key == 0) fare-check @endif" onclick="SetActiveBox(this);">
                                <input type="radio" name="fare_type" @if($key == 0) checked @endif value="{{$val->title}}" class="rdobtn">
                                    <span class="checkmark"></span>
                                    <em>{{$val->title}}</em>
                                </label>
                            </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 text-end mt-2">
                <button class="thm-shrt-btn rounded" id="multicityButton" type="submit">SEARCH FLIGHTS</button>
            </div>
        </div>
    </form>
</div>