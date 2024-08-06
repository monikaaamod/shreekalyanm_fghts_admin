<!-- preview.blade.php -->
<p class="darkText">Please ensure that the spelling of your name and other details match with your travel document/govt. ID, as these cannot be changed later. Errors might lead to cancellation penalties.</p>
<div class="reviewDtlsOverlayContent customScroll">

    @if(isset($formData['is_adult']))
        @foreach($formData['is_adult'] as $key => $value)
            @if($value === "on")
                <div class="tvlrDtlsCard">
                    <p class="makeFlex appendBottom7 title"><span class="blackText blackFont">ADULT {{ $key + 1 }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">First & Middle Name</span><span class="blackText boldFont flexOne">{{ $formData['adult_first_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Last Name</span><span class="blackText boldFont flexOne">{{ $formData['adult_last_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Gender</span><span class="blackText boldFont flexOne">{{ $formData['adult_gender'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Mobile No</span><span class="blackText boldFont flexOne">{{ $formData['adult_mobile_no'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Email</span><span class="blackText boldFont flexOne">{{ $formData['adult_email'][$key] }}</span></p>
                </div>
            @endif
        @endforeach
    @endif


    @if(isset($formData['is_child']))
        @foreach($formData['is_child'] as $key => $valuec)
            @if($valuec === "on")
                <div class="tvlrDtlsCard">
                    <p class="makeFlex appendBottom7 title"><span class="blackText blackFont">CHILD {{ $key + 1 }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">First & Middle Name</span><span class="blackText boldFont flexOne">{{ $formData['child_first_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Last Name</span><span class="blackText boldFont flexOne">{{ $formData['child_last_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Gender</span><span class="blackText boldFont flexOne">{{ $formData['child_gender'][$key] }}</span></p>
                </div>
            @endif
        @endforeach
    @endif


    @if(isset($formData['is_infent']))
        @foreach($formData['is_infent'] as $key => $valued)
            @if($valued === "on")
                <div class="tvlrDtlsCard">
                    <p class="makeFlex appendBottom7 title"><span class="blackText blackFont">INFENT {{ $key + 1 }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">First & Middle Name</span><span class="blackText boldFont flexOne">{{ $formData['infent_first_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Last Name</span><span class="blackText boldFont flexOne">{{ $formData['infent_last_name'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">Gender</span><span class="blackText boldFont flexOne">{{ $formData['infent_gender'][$key] }}</span></p>
                    <p class="makeFlex appendBottom7"><span class="tvlrLftInfo">DOB</span><span class="blackText boldFont flexOne">{{ $formData['infent_dob'][$key] }}</span></p>
                </div>
            @endif
        @endforeach
    @endif

</div>