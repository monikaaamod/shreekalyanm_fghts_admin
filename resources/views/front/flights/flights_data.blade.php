@foreach($data as $key=>$val)
	<div class="cards ">
		<div class="p-10">
			<ul class="flight-lst-dtl">
				<li>
					<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60">
				</li>
				<li><h5>indigo <span>6E-2132</span></h5> </li>
				<li><h5>3:15 <span>Delhi</span></h5>  </li>
				<li><h5>02h 35m <span>+1 Stop</span></h5>  </li>
				<li><h5>5:30 <span>Jaipur</span></h5>  </li>
				<li><h5>₹ 5000</h5> </li>
				<li><a href="{{route('flight-booking')}}" class="thm-shrt-btn">Buy Now</a></li>
			</ul>
			<h3 class="off-txt">Get Rs 335 off using MMTDEAL* + Additional Flat Rs 50 off on UPI payments</h3>
		</div>
		<div class="accordion" id="accordionExample">
			<div class="flight-lst-dtl-innr">
				<h6 class="accordion-header" data-bs-toggle="collapse" data-bs-target="#flight-details{{$key}}">Flight Details</h6>
				<div id="flight-details{{$key}}" class="collapse">
					<div class="p-10 fligh-dtl-tab">
						<div class="nav" id="nav-tab">
							<a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#dtl-{{$key + 1}}">Flight Information</a>
							<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-{{$key + 2}}" >Fare Details & Rules</a>
							<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-{{$key + 3}}" >Baggage Information</a>
							<a href="javascript:void(0);" class="nav-link"  data-bs-toggle="tab" data-bs-target="#dtl-{{$key + 4}}" >Cancellation & Change Rule</a>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="dtl-{{$key + 1}}" role="tabpanel" >
								<h4 class="lft-bar-head pb-2">Delhi To Jaipur</h4>
								<ul class="flight-lst-dtl">
									<li><img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-60"></li>
									<li> <h5>indigo <span>6E-2132</span></h5>  </li>
									<li> <h5>3:15 <span>Delhi</span></h5>  </li>
									<li> <h5>02h 35m <span>+1 Stop</span></h5>  </li>
									<li> <h5>5:30 <span>Jaipur</span></h5>  </li>
									<li> <h5>₹ 5000</h5> </li>
									<li><a href="javascript:void(0);" class="thm-shrt-btn">Buy Now</a></li>
								</ul>
							</div>
							<div class="tab-pane fade" id="dtl-{{$key + 2}}">
								<table class="table table-bordered table-second">
									<tr>
										<td>1 x Adult</td>
										<td>₹ 4700</td>
									</tr>
									<tr>
										<td>Total (Base Fare)</td>
										<td>₹ 4700</td>
									</tr>
									<tr>
										<td>Total Tax</td>
										<td>₹ 300</td>
									</tr>
									<tr>
										<td>Total (Fee & Tax)</td>
										<td>₹ 5000</td>
									</tr>
								</table>
								<h4 class="lft-bar-head mb-2 pb-0">Rules Details</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
							</div>
							<div class="tab-pane fade" id="dtl-{{$key + 3}}">
								<table class="table table-bordered">
									<thead class="table-primary">
										<tr>
											<th>Airline</th>
											<th>Check-in Baggage</th>
											<th>Cabin Baggage</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img src="{{asset('front/assets/images/flight-img.png')}}" alt="" class="img-30">
												<span>indigo </span> <span>/ </span> <span>6E-2132</span>
											</td>
											<td> 15 KG </td>
											<td>7 KG</td>
										</tr>
									</tbody>
									
								</table>
								<h4 class="lft-bar-head mb-2 pb-0">Note</h4>
								<p class="mb-1">Baggage information mentioned above is obtained from airline's reservation system, sky n ocean does not guarantee the accuracy of this information.</p>
								<p> The baggage allowance may vary according to stop-overs, connecting flights. changes in airline rules. etc.</p>
							</div>
							<div class="tab-pane fade" id="dtl-{{$key + 4}}">
								<table class="table table-bordered">
									<thead class="table-primary">
										<tr>
											<th>Time Frame to cancel <span class="d-block">Before scheduled departure time</span></th>
											<th>Airline Fees <span class="d-block">per passenger</span></th>
											<th>Service Fees <span class="d-block">per passenger</span></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td> 2 hours to 4 days* </td>
											<td> ₹ 5000 </td>
											<td>₹ 300</td>
										</tr>
										<tr>
											<td>4 days to 365 days*</td>
											<td>₹ 4800</td>
											<td>₹ 300</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
						