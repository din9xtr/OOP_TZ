$("#reg_user").click(function () {
  var login = $("#login").val();
  var password = $("#password").val();
  var email = $("#email").val();
  $.ajax({
    url: "/user/reg",
    type: "POST",
    cache: false,
    data: { login: login, password: password, email: email },
    dataType: "json",
    success: function (data) {
      if (data.error) {
        $("#errorBlock").show();
        $("#errorBlock").text(data.message);
      } else {
        $("#successBlock").text(data.message);
        $("#successBlock").show();
        $("#successRedir").show();
      }
    },
  });
});
