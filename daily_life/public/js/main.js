$(function () {
  
  // フラッシュメッセージのfadeout
  $(function () {
    $('.flash_message').fadeOut(3000);
  });

  // checkbox
  $('input[name="check"]').change(function () {
      var prop = $(this).prop("checked");

    if (prop) {
          $(this).prev("p").text("完了").css("background-color", "#0099e4");
      } else {
          $(this).prev("p").text("未了").css("background-color", "#DD0000");
      }
  });

  // checkbox all
  $('input[name="all_check"]').change(function () {
      var prop = $(this).prop("checked");

      if (prop) {
        $(".status").text("完了").css("background-color", "#0099e4");
        $(".all_check_label").text("全て未完了にする");
        $('input[name="check"]').prop('checked', true);
      } else {
        $(".status").text("未了").css("background-color", "#DD0000");
        $(".all_check_label").text("全て完了にする");
        $('input[name="check"]').prop('checked', false);
    }
  });

});