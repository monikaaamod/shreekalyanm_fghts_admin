
<!-- CDN link for Toastr.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        $(document).ready(function(){
            // airports data
            var airports = {!! json_encode($airports, true) !!};
            
            // Fuse options
            var options = {
                shouldSort: true,
                threshold: 0.4,
                maxPatternLength: 32,
                keys: [{
                    name: 'iata',
                    weight: 0.5
                }, {
                    name: 'name',
                    weight: 0.3
                }, {
                    name: 'city',
                    weight: 0.2
                }, {
                    name: 'city_name',
                    weight: 0.2
                }, {
                    name: 'name',
                    weight: 0.2
                }, {
                    name: 'code',
                    weight: 0.2
                }]
            };

            // Initialize autocomplete for each input with class 'autocomplete'
            $('.autocomplete').each(function(){
                var ac = $(this);
                var fuse = new Fuse(airports, options);

                var wrap = $("<div>").addClass("autocomplete-wrapper").insertBefore(ac).append(ac);

                var list = $("<div>")
                .addClass("autocomplete-results d-none")
                .appendTo(wrap);

                ac.on('click', function(e) {
                    e.stopPropagation();
                }).on('focus keyup', function(){
                    search($(this), fuse, list);
                }).on('keydown', function(e){
                    onKeyDown(e, list);
                });

                $(document).on("click", clearResults);

                list.on("click", ".autocomplete-result", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    var index = $(this).data("index");
                    selectIndex(index, list);
                });
            });

            function clearResults() {
                $('.autocomplete-results').addClass("d-none").empty();
            }

            function search(ac, fuse, list) {
                if (ac.val().length > 0) {
                    list.removeClass('d-none');
                    var results = fuse.search(ac.val());
                    var numResults = results.length;

                    var divs = results.map(function (r, i) {
                        return '<div class="autocomplete-result" data-index="' + i + '">' + "<div><b>" + r.code + "</b> - " + r.name + "</div>" + '<div class="autocomplete-location">' + r.city_name + ", " + r.country_name + "</div>" + "</div>";
                    });

                    list.html(divs.join(""));
                } else {
                    list.addClass('d-none').empty();
                }
            }

            function onKeyDown(e, list) {
                var selectedIndex = parseInt(list.attr("data-highlight"), 10);
                var numResults = list.find('.autocomplete-result').length;

                switch (e.which) {
                    case 38: // up
                        selectedIndex--;
                        if (selectedIndex <= -1) {
                            selectedIndex = -1;
                        }
                        list.attr("data-highlight", selectedIndex);
                        break;
                    case 13: // enter
                        selectIndex(selectedIndex, list);
                        break;
                    case 9: // tab
                        selectIndex(selectedIndex, list);
                        e.stopPropagation();
                        return;
                    case 40: // down
                        selectedIndex++;
                        if (selectedIndex >= numResults) {
                            selectedIndex = numResults - 1;
                        }
                        list.attr("data-highlight", selectedIndex);
                        break;
                    default:
                        return; // exit this handler for other keys
                }
                e.stopPropagation();
                e.preventDefault(); // prevent the default action (scroll / move caret)
            }

            function selectIndex(index, list) {
                var results = list.find('.autocomplete-result');
                if (results.length >= index + 1) {
                    var ac = list.closest('.autocomplete-wrapper').find('.form-control');
                    ac.val(results.eq(index).find('b').text());
                    clearResults();
                }
            }
        });
    </script>



<script>
    $(document).ready(function() {
        $('#multicityButton,#oneWayButton,#roundButton').click(function(event) {
            // Prevent the form from submitting by default
            event.preventDefault();

            // Perform validation
            var type = $('#type').val();
            var from_city = $('#from_city').val();
            var to_city = $('#to_city').val();
            var departure = $('#departure').val();
            var returnDate = $('#return').val();
            
            if (type === 'one_way') {
                if (!from_city) {
                    showErrorToast('Please enter a departure city for the one-way trip.');
                    return;
                }
                if (!to_city) {
                    showErrorToast('Please enter a destination city for the one-way trip.');
                    return;
                }
                if (!departure) {
                    showErrorToast('Please select a departure date for the one-way trip.');
                    return;
                }
                if (from_city === to_city) {
                    showErrorToast('The destination city must be different from the departure city for the one-way trip.');
                    return;
                }
            } else if (type === 'round_trip') {
                var from_city1 = $('#from_city1').val();
                var to_city1 = $('#to_city1').val();
                if (!from_city1) {
                    showErrorToast('Please enter a departure city for the round-trip.');
                    return;
                }
                if (!to_city1) {
                    showErrorToast('Please enter a destination city for the round-trip.');
                    return;
                }
                if (!departure) {
                    showErrorToast('Please select a departure date for the round-trip.');
                    return;
                }
                if (!returnDate) {
                    showErrorToast('Please select a return date for the round-trip.');
                    return;
                }
                if (from_city1 === to_city1) {
                    showErrorToast('The destination city must be different from the departure city for the round-trip.');
                    return;
                }
            } else if (type === 'multi_city') {
                var from_city2 = $('#from_city2').val();
                var to_city2 = $('#to_city2').val();
                if (!from_city2) {
                    showErrorToast('Please enter a departure city for the multi-city trip.');
                    return;
                }
                if (!to_city2) {
                    showErrorToast('Please enter a destination city for the multi-city trip.');
                    return;
                }
                if (from_city2 === to_city2) {
                    showErrorToast('The destination city must be different from the departure city for the multi-city trip.');
                    return;
                }
            }

             // Get the form ID
            var formId = $(this).closest('form').attr('id');


            // If all validations pass, submit the form
            $('#' + formId).submit();
        });

          // Function to show error modal
          function showErrorToast(message) {
                toastr.error(message, 'Error', {
                    closeButton: true,
                    timeOut: 2000 // Hide after 2 seconds
                });
            }
    });


    $(function() {
        $(".date").datepicker({
            minDate: 0 // Setting minDate to 0 restricts selection to today and future dates
        });
    });


    $('input').attr('autocomplete', 'off');

</script>