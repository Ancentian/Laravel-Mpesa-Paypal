<script>
    $(document).ready(function () {    
        // Save Salary Types
        $('#initiatestk').on('submit', function (e) {
            e.preventDefault();

            var form = this;
            var formData = $(this).serialize();

            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('mpesa.stkpush') }}',
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    $('#response').text(JSON.stringify(response, null, 2));  
                    form.reset();             
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });

        // Initially hide the account number field
        $('#account').hide();

        // Set up change event handler for the transaction type select
        $('#transaction_type').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption === 'CustomerPayBillOnline') {
                $('#account').show();
            } else if (selectedOption === 'tillnumber') {
                $('#account').hide();
            }
        });

        // Set up change event handler for the account number input
        $('#account').change(function() {
            var selectedOption = $('#transaction_type').val();
            if (selectedOption === 'CustomerPayBillOnline') {
                $(this).prop('required', true);
            } else {
                $(this).prop('required', false);
            }
        });

        //Register URL
        $('#registerurl').on('submit', function (e) {
            e.preventDefault();

            var form = this;
            var formData = $(this).serialize();

            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ url('register-urls') }}',
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    $('#response').text(JSON.stringify(response, null, 2));  
                    //form.reset();             
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });

        //Initiate C2B
        $('#initiatec2b').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var formData = $(this).serialize();

            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('b2c.simulate') }}',
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    $('#response').text(JSON.stringify(response, null, 2));  
                    //form.reset();             
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });

        //Initiate C2B
        $('#paypalPay').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            var formData = $(this).serialize();

            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('make.payment') }}',
                method: 'POST',
                data: formData,
                success: function (response) {
                    console.log(response);
                    // Handle success response
                    form.reset();    
                    toastr.success(response.message, 'Success');         
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                    toastr.error('Something Went Wrong!, Try again!','Error');
                }
                
            });
        });
    });

     // Toastr Initialization
     toastr.options = {
     "closeButton": true,
     "progressBar": true,
     "positionClass": "toast-top-right",
     "preventDuplicates": true,
     "showDuration": "300",
     "hideDuration": "1000",
     "timeOut": "5000",
     "extendedTimeOut": "1000",
     "showEasing": "swing",
     "hideEasing": "linear",
     "showMethod": "fadeIn",
     "hideMethod": "fadeOut"
   };
</script>
