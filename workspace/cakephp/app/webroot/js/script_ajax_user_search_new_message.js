$(document).ready(function() {
    $('.ajax-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        
        var formData = $(this).serialize(); // Serialize form data
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // Use form's action URL
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function(response) {

                console.log(response);
                // Handle successful response (update HTML with results)
                $('#searchResults').html(response.html);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});


