// formHandler.js
(function(exports) {
    function initializeForm(formId, successRedirectUrl, ckeditorId) {
    //   if (ckeditorId) {
    //     CKEDITOR.replace(ckeditorId);
    //   }
  
      $('#' + formId).submit(function() {
        if (ckeditorId) {
          for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
        }
  
        var $this = $('#submitButton');
        buttonLoading('loading', $this);
        $('.is-invalid').removeClass('is-invalid state-invalid');
        $('.invalid-feedback').remove();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            '_method': 'patch'
          },
          url: $('#' + formId).attr('action'),
          type: "POST",
          processData: false, // Important!
          contentType: false,
          cache: false,
          data: new FormData($('#' + formId)[0]),
          success: function(data) {
            if (data.status) {
              successMsg('Create', data.msg);
              setTimeout(function() {
                window.location.href = successRedirectUrl;
              }, 1000);
  
            } else {
              $.each(data.errors, function(fieldName, field) {
                $.each(field, function(index, msg) {
                  $('#' + fieldName).addClass(
                    'is-invalid state-invalid');
                  errorDiv = $('#' + fieldName).parent('div');
                  errorDiv.append(
                    '<div class="invalid-feedback">' +
                    msg + '</div>');
                });
              });
              errorMsg('Create', data.msg);
            }
            buttonLoading('reset', $this);
  
          },
          error: function() {
            errorMsg('Create',
              'There has been an error, please alert us immediately');
            buttonLoading('reset', $this);
          }
  
        });
  
        return false;
      });
    }

    exports.initializeForm = initializeForm;


    
    function initializeSimpleForm(formId, successRedirectUrl) {
      
  
      $('#' + formId).submit(function() {

        var $this = $('#submitButton');
        buttonLoading('loading', $this);
        $('.is-invalid').removeClass('is-invalid state-invalid');
        $('.invalid-feedback').remove();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            '_method': 'patch'
          },
          url: $('#' + formId).attr('action'),
          type: "POST",
          processData: false, // Important!
          contentType: false,
          cache: false,
          data: new FormData($('#' + formId)[0]),
          success: function(data) {
            if (data.status) {
              successMsg('Create', data.msg);
              setTimeout(function() {
                window.location.href = successRedirectUrl;
              }, 1000);
  
            } else {
              $.each(data.errors, function(fieldName, field) {
                $.each(field, function(index, msg) {
                  $('#' + fieldName).addClass(
                    'is-invalid state-invalid');
                  errorDiv = $('#' + fieldName).parent('div');
                  errorDiv.append(
                    '<div class="invalid-feedback">' +
                    msg + '</div>');
                });
              });
              errorMsg('Create', data.msg);
            }
            buttonLoading('reset', $this);
  
          },
          error: function() {
            errorMsg('Create',
              'There has been an error, please alert us immediately');
            buttonLoading('reset', $this);
          }
  
        });
  
        return false;
      });
    }
    exports.initializeSimpleForm = initializeSimpleForm;

  
  })(typeof exports === 'undefined' ? this.formHandler = {} : exports);
  