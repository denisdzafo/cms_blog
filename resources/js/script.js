$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
})

$(document).ready(function(){
  $("#title").click(function(){
    $(".comment").toggle();
    $(".line-break").toggle();
  });
})


$(document).ready(function() {
$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
        var id = button.data('id');
        var url = $(this).attr('data-url');
        console.log(id);
        console.log(url);
        $("#deleteForm", 'input').val(id);
        $('#deleteMessageForm').attr("action", "/user/blogs/" + id);


});
});
