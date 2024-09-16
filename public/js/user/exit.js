$("#exit_btn").click(function () {
  $.ajax({
    url: "/user/exit",
    type: "POST",
    cache: false,
    data: {},
    dataType: "json",
    success: function (data) {
      if (data.error) {
        console.log;
      } else {
        document.location.reload();
      }
    },
  });
});
