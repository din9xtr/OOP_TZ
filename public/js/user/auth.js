$("#auth_user").click(function () {
  var login = $("#login").val();
  var password = $("#password").val();
  $.ajax({
    url: "/user/auth_user",
    type: "POST",
    cache: false,
    data: { login: login, password: password },
    dataType: "json",
    success: function (data) {
      if (data.error) {
        $("#errorBlock").show();
        $("#errorBlock").text(data.message);
      } else {
        $("#auth_content").show();
        document.location.reload();
        // сделать редирект
        //$("#auth_content").text(data.message);
        //window.location.href = '/';
        $("#auth_form").hide();
      }
    },
  });
});
