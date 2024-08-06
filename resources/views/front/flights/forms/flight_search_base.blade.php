<div class="hmg-tab">
    <ul class="nav" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#hmg-tab-01" type="button">
            <span></span>One-way</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hmg-tab-02" type="button"><span></span>Round-trip</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#hmg-tab-03" type="button"><span></span>Multi-city</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="hmg-tab-01" role="tabpanel">
            <!-- One-way form -->
            <!-- Include the HTML code for the one-way form here -->
                @include('front.flights.forms.oneway')
        </div>
        <div class="tab-pane fade" id="hmg-tab-02" role="tabpanel">
            <!-- Round-trip form -->
            <!-- Include the HTML code for the round-trip form here -->
            @include('front.flights.forms.roundtrip')
        </div>
        <div class="tab-pane fade" id="hmg-tab-03" role="tabpanel">
            <!-- Multi-city form -->
                <!-- Include the HTML code for the multi-city form here -->
                @include('front.flights.forms.multicity')
        </div>
    </div>
</div>

<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script src="https://unpkg.com/fuse.js@2.5.0/src/fuse.min.js"></script>

@include('front.flights.forms.scripts')