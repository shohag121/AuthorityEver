jQuery(document).ready(function($){
   // making url accessable
    var path = document.location.pathname;
    var dir = path.substring( 0, path.lastIndexOf( "/" ) + 1);
    var res = dir.replace("/wp-admin", "/wp-content");




    $("#aec_core_button").click(function(){
        //getting assin from user input
        var asin = $( '#aec_core_asin' ).val();
        $.ajax({

            // getting data by ajax using GET method
            type: 'GET',
            url: res+'plugins/authever_core/amazon.php?asin='+asin,
            dataType: 'json',
            success: function(data){

                var content = data;
                // filling form value
                $("#aec_core_listprice").attr("value", content.Items.Item.Offers.Offer.OfferListing.Price.FormattedPrice );
                $("#aec_core_currencycode").attr("value", content.Items.Item.Offers.Offer.OfferListing.Price.CurrencyCode );

            }
        });
        return false;

    });





});