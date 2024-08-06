//traveller 1

    $(document).ready(function () {
        if ($("div.trav_toggle").length > 0) {
            $("div.trav_toggle").click(function () {
                if ($(this).hasClass("open")) {
                    $(this).removeClass("open");
                    $(this).addClass("close");
                    $(this).next().slideDown(100);
                    return false;
                } else {
                    $(this).removeClass("close");
                    $(this).addClass("open");
                    $(this).next().slideUp(100);
                    return false;
                }
            });
        }
        $(".trav_done").click(function () {
            if($("div.trav_toggle").hasClass("close")) {
                $("div.trav_toggle").removeClass("close");
                $("div.trav_toggle").addClass("open");
                $("div.trav_toggle").next().slideUp(100);
            }
        }); 
    });





    function process(v) {
        var Adult = parseInt(document.getElementById("ddlAdult").value);
        var Child = parseInt(document.getElementById("ddlChild").value);
        var Infant = parseInt(document.getElementById("ddlInfant").value);
        var classDropdown = document.getElementById("class");
        var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Adult += v;
        var total = Adult + Child;
        if (total <= 9 && Adult >= 1) {
            document.getElementById("ddlAdult").value = Adult;
            if (Infant > Adult) {
                document.getElementById("ddlInfant").value = Adult;
            }
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)," + travel_class);
        }
    }


    function process2(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult").value);
        var Child = parseInt(document.getElementById("ddlChild").value);
        var Infant = parseInt(document.getElementById("ddlInfant").value);
        var classDropdown = document.getElementById("class");
        var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Child += s;
        var total = Adult + Child;
        if (total <= 9 && Child >= 0) {
            document.getElementById("ddlChild").value = Child;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)," + travel_class);
        }
    }


    function process3(sh) {
        var Adult = parseInt(document.getElementById("ddlAdult").value);
        var Infant = parseInt(document.getElementById("ddlInfant").value);
        var Child = parseInt(document.getElementById("ddlChild").value);
        var classDropdown = document.getElementById("class");
         var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Infant += sh;
        if (Infant <= Adult && Infant >= 0) {
            document.getElementById("ddlInfant").value = Infant;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)," + travel_class);
        }
    }
    
    
    function GetClass(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult").value);
        var Child = parseInt(document.getElementById("ddlChild").value);
        var Infant = parseInt(document.getElementById("ddlInfant").value);
        
        var selectedOption = $(s).find(":selected");
        var travel_class = selectedOption.data('id');

        var TotTravelers = Adult + Child + Infant;
        document.getElementById("txtTotalTravelers").value = (TotTravelers + " Traveler(s)," + travel_class);
            
    }
    
        
        
		
		
		//travellers 2
		

    function processR(v) {
        var Adult = parseInt(document.getElementById("ddlAdult1").value);
        var Child = parseInt(document.getElementById("ddlChild1").value);
        var Infant = parseInt(document.getElementById("ddlInfant1").value);
        var classDropdown = document.getElementById("class1");
        var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Adult += v;
        var total = Adult + Child;
        // if (total <= 9 && Adult >= 1) {
            document.getElementById("ddlAdult1").value = Adult;
            if (Infant > Adult) {
                document.getElementById("ddlInfant1").value = Adult;
            }
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers1").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }


    function processR2(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult1").value);
        var Child = parseInt(document.getElementById("ddlChild1").value);
        var Infant = parseInt(document.getElementById("ddlInfant1").value);
        var classDropdown = document.getElementById("class1");
        var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Child += s;
        var total = Adult + Child;
        // if (total <= 9 && Child >= 0) {
            document.getElementById("ddlChild1").value = Child;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers1").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }


    function processR3(sh) {
        var Adult = parseInt(document.getElementById("ddlAdult1").value);
        var Child = parseInt(document.getElementById("ddlChild1").value);
        var Infant = parseInt(document.getElementById("ddlInfant1").value);
        var classDropdown = document.getElementById("class1");
         var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Infant += sh;
        // if (Infant <= Adult && Infant >= 0) {
            document.getElementById("ddlInfant1").value = Infant;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers1").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }
    
    
    function GetClassR(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult1").value);
        var Child = parseInt(document.getElementById("ddlChild1").value);
        var Infant = parseInt(document.getElementById("ddlInfant1").value);
        
        var selectedOption = $(s).find(":selected");
        var travel_class = selectedOption.data('id');

        var TotTravelers = Adult + Child + Infant;
        document.getElementById("txtTotalTravelers1").value = (TotTravelers + " Traveler(s)," + travel_class);
            
    }
		
		
		
		//travellers 3

    function processM(v) {
        var Adult = parseInt(document.getElementById("ddlAdult2").value);
        var Child = parseInt(document.getElementById("ddlChild2").value);
        var Infant = parseInt(document.getElementById("ddlInfant2").value);
        var classDropdown = document.getElementById("class2");
        var selectedOption = $(classDropdown).find(":selected");
            var travel_class = selectedOption.data('id');
        Adult += v;
        var total = Adult + Child;
        // if (total <= 9 && Adult >= 1) {
            document.getElementById("ddlAdult2").value = Adult;
            if (Infant > Adult) {
                document.getElementById("ddlInfant2").value = Adult;
            }
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers2").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }


    function processM2(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult2").value);
        var Child = parseInt(document.getElementById("ddlChild2").value);
        var Infant = parseInt(document.getElementById("ddlInfant2").value);
        var classDropdown = document.getElementById("class2");
        var selectedOption = $(classDropdown).find(":selected");
        var travel_class = selectedOption.data('id');
        Child += s;
        var total = Adult + Child;
        // if (total <= 9 && Child >= 0) {
            document.getElementById("ddlChild2").value = Child;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers2").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }


    function processM3(sh) {
        var Adult = parseInt(document.getElementById("ddlAdult2").value);
        var Child = parseInt(document.getElementById("ddlChild2").value);
        var Infant = parseInt(document.getElementById("ddlInfant2").value);
        var classDropdown = document.getElementById("class2");
        var selectedOption = $(classDropdown).find(":selected");
        var travel_class = selectedOption.data('id');
        
        Infant += sh;
        // if (Infant <= Adult && Infant >= 0) {
            document.getElementById("ddlInfant2").value = Infant;
            var TotTravelers = Adult + Child + Infant;
            document.getElementById("txtTotalTravelers2").value = (TotTravelers + " Traveler(s)," + travel_class);
        // }
    }
    
    
    function GetClassM(s) {
        // alert(s);
        var Adult = parseInt(document.getElementById("ddlAdult2").value);
        var Child = parseInt(document.getElementById("ddlChild2").value);
        var Infant = parseInt(document.getElementById("ddlInfant2").value);
        
        var selectedOption = $(s).find(":selected");
        var travel_class = selectedOption.data('id');
        var TotTravelers = Adult + Child + Infant;
        document.getElementById("txtTotalTravelers2").value = (TotTravelers + " Traveler(s)," + travel_class);
            
    }
