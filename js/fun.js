function get_states()
{
    country = $('#country').val();
//    alert(country);
    if(country!=''){
        $.ajax({
            type: 'POST',
            data: {'country':country},
            url: base_url+"controller/get_states",
            dataType: 'text',
            success: function(data)
            {
                $('#div_states').html(data);
            }
        });
    }
}
