(function($)
{
    // Simple ajax call for testing...
    $('#ajax-button').on('click', function(e)
    {
        e.preventDefault();

        $.ajax({
            url: themosis.ajaxurl, // Global access to the WordPress ajax handler file
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'my-custom-action', // Your custom hook/action name
                security: themosis.security, // A nonce value
                number: 2 // The value you want to send
            }
        }).success(function(data){
            // This should print "4" in the console.
            console.log(data);
        });
    });
})(jQuery);