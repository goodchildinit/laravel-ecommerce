/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};

/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

 // Change Price with Size
$(document).ready(function(){
    $("#selSize").change(function(){
        var idSize = $(this).val();
        // alert(idSize);
        if(idSize == "") {
            return false;
        }
        $.ajax({
            type: 'get',
            url: '/get-product-price',
            data:{idSize:idSize},
            success:function(resp) {
                // alert(resp); return false; // Output = 1500#20 (Price and Stock)
                var arr = resp.split('#'); // Split the two arrays (Price and Stock)
                $("#getPrice").html("NGN "+arr[0]); // get array zero which is price
                $("#price").val(arr[0]); // get array zero which is price
                if(arr[1]==0){ // if array One which is stock is equal to 0
					$("#cartButton").hide(); // if stock is equal to zero hide "id = cartButton"
					$("#Availability").text("Out Of Stock");
				}else{
					$("#cartButton").show();
					$("#Availability").text("In Stock");
                }

            },error:function() {
                alert("Error");
            }
        })
    });
});


 // Replace Main Image with Alternate Image
$(document).ready(function(){
      $(".changeImage").click(function() {
        var image = $(this).attr('src');
        $(".mainImage").attr("src", image);
    });
});


// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function(e) {
    var $this = $(this);

    e.preventDefault();

    // Use EasyZoom's `swap` method
    api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function() {
    var $this = $(this);

    if ($this.data("active") === true) {
        $this.text("Switch on").data("active", false);
        api2.teardown();
    } else {
        $this.text("Switch off").data("active", true);
        api2._init();
    }
});




