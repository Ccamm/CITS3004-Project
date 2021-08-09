(function($) {
  $('#content').delay(1000).fadeIn(500);

  $("#submit").click(function() {
    var formData = $("#login-form").serializeArray();
    var loginForm = {};
    formData.forEach((x, i) => loginForm[x["name"]] = x["value"]);
    $.ajax({
      cache: false,
      type: "POST",
      url: "/api/login",
      data: JSON.stringify(loginForm),
      success: function(data) {
        window.location.replace(data.url);
      },
      dataType: "json",
      contentType : "application/json"
    });
  });
})(jQuery);

particlesJS.load('particles-js', '/assets/js/particles.json', function() {});
