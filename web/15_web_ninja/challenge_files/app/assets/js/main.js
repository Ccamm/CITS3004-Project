(function($) {
  $('#content').delay(1000).fadeIn(500);

  // $("#submit").click(function() {
  //   var formData = $("#login-form").serializeArray();
  //   var jsonString = "{";
  //   formData.forEach((x, i) => jsonString = jsonString + '"' + x["name"] + '":"' + x["value"] + '",');
  //   jsonString = jsonString.slice(0,-1);
  //   jsonString = jsonString + "}"
  //   $.ajax({
  //     type: "POST",
  //     url: "/api/login",
  //     data: jsonString,
  //     success: function(data) {
  //       window.location.replace(data.url);
  //     },
  //     dataType: "json",
  //     contentType : "application/json"
  //   });
  // });
})(jQuery);

particlesJS.load('particles-js', '/assets/js/particles.json', function() {});
