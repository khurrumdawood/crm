function search_frm_submit()
{
    $('#search_frm').submit();
}


function check_billing_shipping()
{
    if ($('#chk_shipping').is(":checked"))
    {
        $('#shippingfm').hide();
        $('#billingalert').show();
        
        $('#s_first_name').removeAttr("data-validation-engine","validate[required]");
        $('#s_last_name').removeAttr("data-validation-engine","validate[required]");
        $('#s_address').removeAttr("data-validation-engine","validate[required]");
        $('#s_city').removeAttr("data-validation-engine","validate[required]");
        $('#s_zip').removeAttr("data-validation-engine","validate[required]");
        $('#country_s').removeAttr("data-validation-engine","validate[required]");
        $('#state_s').removeAttr("data-validation-engine","validate[required]");
        $('#s_phone').removeAttr("data-validation-engine","validate[required]");

        
    }else{
        $('#shippingfm').show();
        $('#billingalert').hide();
        
        $('#s_first_name').attr("data-validation-engine","validate[required]");
        $('#s_last_name').attr("data-validation-engine","validate[required]");
        $('#s_address').attr("data-validation-engine","validate[required]");
        $('#s_city').attr("data-validation-engine","validate[required]");
        $('#s_zip').attr("data-validation-engine","validate[required]");
        $('#country_s').attr("data-validation-engine","validate[required]");
        $('#state_s').attr("data-validation-engine","validate[required]");
        $('#s_phone').attr("data-validation-engine","validate[required]");
    }
}

$(document).ready(function() {
    get_states();
    get_states_s();
    

    $('.mobile_filter').change(function () {
            loader_open();
            chk = this;
//            classs = $(chk).attr("class");
//            if (classs.indexOf("active") >= 0)
//            {
//                $(chk).removeClass("active");
//                $(chk).removeClass("active_select");
//            }else{
//                $(chk).addClass("active");
//                $(chk).addClass("active_select");
//            }
            style_inc = 0;
            size_inc = 0;
            category_inc = 0;
            price_range_inc = 0;
            color_inc = 0;
            artist_inc = 0;
            ele_data = '';
            $(".mobile_filter").each(function(){
                ele_name = $(this).attr('id');
                ele_value = $(this).val();
                if(ele_name=='style'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"style['+style_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"style['+style_inc+']":"'+ele_value+'"';
                    }
                    style_inc++;
                }
                if(ele_name=='size'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"size['+size_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"size['+size_inc+']":"'+ele_value+'"';
                    }
                    size_inc++;
                }
                if(ele_name=='category'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"category['+category_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"category['+category_inc+']":"'+ele_value+'"';
                    }
                    category_inc++;
                }
                if(ele_name=='price_range'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"price_range['+price_range_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"price_range['+price_range_inc+']":"'+ele_value+'"';
                    }
                    price_range_inc++;
                }
                if(ele_name=='color'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"color['+color_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"color['+color_inc+']":"'+ele_value+'"';
                    }
                    color_inc++;
                }
                if(ele_name=='artist'&&ele_value!=0)
                {
                    if(ele_data != ''){
                        ele_data += ',"artist['+artist_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"artist['+artist_inc+']":"'+ele_value+'"';
                    }
                    artist_inc++;
                }
            });
            //                alert(ele_data);
            search_keyword = $('#search_keyword').val();
            if(search_keyword)
            {
                if(ele_data != ''){
                    ele_data += ',"search_from_gallery":'+'"'+search_keyword+'"';
                }else{
                    ele_data += '"search_from_gallery":'+'"'+search_keyword+'"';
                }
            }
            ele_data = '{'+ele_data+'}';
            //            alert(ele_data);
            $.ajax({
                type: 'GET',
                data: jQuery.parseJSON(ele_data),
                url: base_url+"products/prepare_search",
                dataType: 'text',
                success: function(data)
                {
                    data = data.split('#=#');
                    //                    alert(data[1]);
                    $('#pagination').html('<ul><li><img src="'+base_url+'images/front/signin-sprater3.png" alt=" "></li>'+data[1]+'</ul>');
                    $('#prolist').html(data[0]);
                    loader_close();
                    return true;
                },
                error: function(xhr, textStatus, errorThrown){
                    loader_close();
                }
            });

        //                alert($('.filterbox').html());
        
        
    });
    
    check_billing_shipping();
    
    $('body').click(function(event)
    {
        check_billing_shipping();
        
        if($(event.target).is('.filter_product')) {
            loader_open();
            chk = event.target;
            classs = $(chk).attr("class");
            if (classs.indexOf("active") >= 0)
            {
                $(chk).removeClass("active");
                $(chk).removeClass("active_select");
            }else{
                $(chk).addClass("active");
                $(chk).addClass("active_select");
            }
            style_inc = 0;
            size_inc = 0;
            category_inc = 0;
            price_range_inc = 0;
            color_inc = 0;
            artist_inc = 0;
            ele_data = '';
            $(".active_select").each(function(){
                ele_name = $(this).attr('ele_name');
                ele_value = $(this).attr('ele_value');
                if(ele_name=='style')
                {
                    if(ele_data != ''){
                        ele_data += ',"style['+style_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"style['+style_inc+']":"'+ele_value+'"';
                    }
                    style_inc++;
                }
                if(ele_name=='size')
                {
                    if(ele_data != ''){
                        ele_data += ',"size['+size_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"size['+size_inc+']":"'+ele_value+'"';
                    }
                    size_inc++;
                }
                if(ele_name=='category')
                {
                    if(ele_data != ''){
                        ele_data += ',"category['+category_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"category['+category_inc+']":"'+ele_value+'"';
                    }
                    category_inc++;
                }
                if(ele_name=='price_range')
                {
                    if(ele_data != ''){
                        ele_data += ',"price_range['+price_range_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"price_range['+price_range_inc+']":"'+ele_value+'"';
                    }
                    price_range_inc++;
                }
                if(ele_name=='color')
                {
                    if(ele_data != ''){
                        ele_data += ',"color['+color_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"color['+color_inc+']":"'+ele_value+'"';
                    }
                    color_inc++;
                }
                if(ele_name=='artist')
                {
                    if(ele_data != ''){
                        ele_data += ',"artist['+artist_inc+']":"'+ele_value+'"';
                    }else{
                        ele_data += '"artist['+artist_inc+']":"'+ele_value+'"';
                    }
                    artist_inc++;
                }
            });
            //                alert(ele_data);
            search_keyword = $('#search_keyword').val();
            if(search_keyword)
            {
                if(ele_data != ''){
                    ele_data += ',"search_from_gallery":'+'"'+search_keyword+'"';
                }else{
                    ele_data += '"search_from_gallery":'+'"'+search_keyword+'"';
                }
            }
            ele_data = '{'+ele_data+'}';
            //            alert(ele_data);
            $.ajax({
                type: 'GET',
                data: jQuery.parseJSON(ele_data),
                url: base_url+"products/prepare_search",
                dataType: 'text',
                success: function(data)
                {
                    data = data.split('#=#');
                    //                    alert(data[1]);
                    $('#pagination').html('<ul><li><img src="'+base_url+'images/front/signin-sprater3.png" alt=" "></li>'+data[1]+'</ul>');
                    $('#prolist').html(data[0]);
                    loader_close();
                    return true;
                },
                error: function(xhr, textStatus, errorThrown){
                    loader_close();
                }
            });

        //                alert($('.filterbox').html());
        }
            
            
    });
});



function listingAjaxPaging(url)
{
    loader_open();
    style_inc = 0;
    size_inc = 0;
    category_inc = 0;
    price_range_inc = 0;
    color_inc = 0;
    artist_inc = 0;
    ele_data = '';
    $(".active_select").each(function(){
        ele_name = $(this).attr('ele_name');
        ele_value = $(this).attr('ele_value');
        if(ele_name=='style')
        {
            if(ele_data != ''){
                ele_data += ',"style['+style_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"style['+style_inc+']":"'+ele_value+'"';
            }
            style_inc++;
        }
        if(ele_name=='size')
        {
            if(ele_data != ''){
                ele_data += ',"size['+size_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"size['+size_inc+']":"'+ele_value+'"';
            }
            size_inc++;
        }
        if(ele_name=='category')
        {
            if(ele_data != ''){
                ele_data += ',"category['+category_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"category['+category_inc+']":"'+ele_value+'"';
            }
            category_inc++;
        }
        if(ele_name=='price_range')
        {
            if(ele_data != ''){
                ele_data += ',"price_range['+price_range_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"price_range['+price_range_inc+']":"'+ele_value+'"';
            }
            price_range_inc++;
        }
        if(ele_name=='color')
        {
            if(ele_data != ''){
                ele_data += ',"color['+color_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"color['+color_inc+']":"'+ele_value+'"';
            }
            color_inc++;
        }
        if(ele_name=='artist')
        {
            if(ele_data != ''){
                ele_data += ',"artist['+artist_inc+']":"'+ele_value+'"';
            }else{
                ele_data += '"artist['+artist_inc+']":"'+ele_value+'"';
            }
            artist_inc++;
        }
    });
    search_keyword = $('#search_keyword').val();
    if(search_keyword)
    {
        if(ele_data != ''){
            ele_data += ',"search_from_gallery":'+'"'+search_keyword+'"';
        }else{
            ele_data += '"search_from_gallery":'+'"'+search_keyword+'"';
        }
    }
    ele_data = '{'+ele_data+'}';
    //            alert(ele_data);
    $.ajax({
        type: "GET",
        data: jQuery.parseJSON(ele_data),
        dataType: 'text',
        url: url,
        success: function(data){
            //            var data = $.parseJSON(data);
            //            alert(json.error);
            
            //            alert('data');
            data = data.split('#=#');
            $('#pagination').html('<ul><li><img src="'+base_url+'images/front/signin-sprater3.png" alt=" "></li>'+data[1]+'</ul>');
            $('#prolist').html(data[0]);
            //            loader_close();
            loader_close();
            return true;
        },
        error: function(xhr, textStatus, errorThrown){
            loader_close();
        }
        
    });

}



function change_currency()
{
    currency = $('#currency').val();
    $.ajax({
        type: "GET",
        data: {
            'currency':currency
        },
        dataType: 'json',
        url: base_url+'home/set_currency',
        success: function(){
            
        }
        
    });
    
}

function loader_open()
{
    $('#popup').show();
}

function loader_close()
{
    $('#popup').hide();
}






function get_states()
{
    country = $('#country').val();
//    alert(country);
    if($.trim(country)!=''){
     loader_open();
       $.ajax({
            type: 'POST',
            data: {'country':country},
            url: base_url+"products/get_states",
            dataType: 'text',
            success: function(data)
            {
                $('#div_states').html(data);
                loader_close();
            },
            error: function(xhr, textStatus, errorThrown){
                loader_close();
            }
        });
    }
}





function get_states_s()
{
    country = $('#country_s').val();
//    alert(country);
    if($.trim(country)!=''){
     loader_open();
       $.ajax({
            type: 'POST',
            data: {'country':country},
            url: base_url+"products/get_states_s",
            dataType: 'text',
            success: function(data)
            {
                $('#div_states_s').html(data);
                loader_close();
            },
            error: function(xhr, textStatus, errorThrown){
                loader_close();
            }
        });
    }
}
