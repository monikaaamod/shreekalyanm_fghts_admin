      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                        Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('admin/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('admin/images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('admin/images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('admin/images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="{{asset('admin/images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- sidebar -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
            @canany(['Roles','Permission','Customer','Vendor'])
              <li class="nav-item nav-category">Main Menu</li>
              @can('Roles')
              <li class="nav-item">
                <a class="nav-link" href="{{route('roles-list')}}">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">Roles</span>
                </a>
              </li>
              @endcan
              @can('Permission')
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.permission')}}">
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                    <span class="menu-title">Permissions</span>
                  </a>
                </li>
              @endcan
              @can('Customer')
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.customer')}}">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                  <span class="menu-title">Customers</span>
                </a>
              </li>
              @endcan
              @can('Vendor')
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.vendor')}}">
                    <i class="menu-icon mdi mdi-layers-outline"></i>
                    <span class="menu-title">Vendors</span>
                  </a>
                </li>
              @endcan

              @can('Flights')
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.flights_list')}}">
                    <i class="menu-icon mdi mdi-layers-outline"></i>
                    <span class="menu-title">Flights</span>
                  </a>
                </li>
              @endcan

              @endcanany
              @canany('Booking')
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#booking-management" aria-expanded="false" aria-controls="booking-management">
                  <i class="menu-icon mdi mdi-filter"></i>
                  <span class="menu-title">Booking Management</span>
                  <i class="menu-arrow"></i> 
                </a>
                <div class="collapse" id="booking-management">
                  <ul class="nav flex-column sub-menu">
                    @can('Booking')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.search.flights')}}">Search Flights</a></li>
                    @endcan
                    @can('Booking')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.booking.list')}}">Booking List</a></li>
                    @endcan
                    @can('Booking')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.booking.search')}}">Search Bookings</a></li>
                    @endcan
                    @can('Booking')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.booking.card')}}">Booking Card</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany
            @canany(['Airports','Fare Type','Travel Class','Trip Type'])
              <li class="nav-item nav-category">Global Management</li>
                
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#search-filters" aria-expanded="false" aria-controls="search-filters">
                    <i class="menu-icon mdi mdi-filter"></i>
                    <span class="menu-title">Search Filters</span>
                    <i class="menu-arrow"></i> 
                  </a>
                  <div class="collapse" id="search-filters">
                    <ul class="nav flex-column sub-menu">
                      @can('Airports')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.airports')}}">Airports</a></li>
                      @endcan
                      @can('Aircraft')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.aircraft')}}">Aircraft</a></li>
                      @endcan
                      @can('Airlines')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.airlines')}}">Airlines</a></li>
                      @endcan
                      @can('Fare Type')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.fare_type')}}">Fare Type</a></li>
                      @endcan
                      @can('Travel Class')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.travel_class')}}">Travel Class</a></li>
                      @endcan
                      @can('Trip Type')
                      <li class="nav-item"> <a class="nav-link" href="{{route('admin.trip_type')}}">Trip Type</a></li>
                      @endcan
                    </ul>
                  </div>
                </li>
            @endcanany

            @canany(['Agency','Coupon','Product','Charges','Sales Channel','Supplier','Service Fee','Payment Mode','Wallet Discount','Convenience Fee'])
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                  <i class="menu-icon mdi mdi-database-settings"></i>
                  <span class="menu-title">Settings</span>
                  <i class="menu-arrow"></i> 
                </a>
                <div class="collapse" id="settings">
                  <ul class="nav flex-column sub-menu">
                    <!-- @can('Charges')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.charges')}}">Charges</a></li>
                    @endcan -->
                    @can('Agency')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.agency')}}">Agency</a></li>
                    @endcan
                    @can('Coupon')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.coupon')}}">Coupon</a></li>
                    @endcan
                    @can('Product')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.products')}}">Product</a></li>
                    @endcan
                    @can('Sales Channel')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.sales_channels')}}">Sales Channel</a></li>
                    @endcan
                    @can('Supplier')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.suppliers')}}">Supplier</a></li>
                    @endcan
                    @can('Service Fee')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.service_fee')}}">Service Fee</a></li>
                    @endcan

                    @can('Payment Mode')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.paymentmodes')}}">Payment Mode</a></li>
                    @endcan

                    @can('Wallet Discount')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.walletdiscount')}}">Wallet Discount</a></li>
                    @endcan
                    
                    @can('Convenience Fee')
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.conveniencefee')}}">Convenience Fee</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany
          
          {{-- <li class="nav-item nav-category">Forms and Datas</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="#">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Mdi icons</a></li>
              </ul>
            </div>
          </li> --}}
        </ul>
      </nav>