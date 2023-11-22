<script>
    $(document).ready(function () {    
        // Save Salary Types
        $('#initiatestk').on('submit', function (e) {
            e.preventDefault();

            var form = this;
            var formData = $(this).serialize();
            console.log(formData);

            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('mpesa.stkpush') }}',
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Handle success response
                    console.log(response); 
                    $('#stkresponse').text(JSON.stringify(response));  
                    form.reset();             
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
