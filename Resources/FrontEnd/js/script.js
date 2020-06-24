window.onload = function() {
  $(document).scroll(function() {
    // alert("he");
    if ($(document).scrollTop() > 400 && $(document).scrollTop() < 700) {
      $(".navbar").css("opacity", "0");
    } else if ($(document).scrollTop() > 700) {
      $(".navbar").css("position", "fixed");
      $(".navbar").css("background-color", "#000");
      $(".navbar").css("opacity", "0.92");
      $(".navbar").css("width", "100%");
      $(".navbar").css("margin-top", "-40px");
      $(".navbar").css("padding", "15px");
      $(".navbar").css("transition", "opacity 0.3s");
      $(".navbar").css("color", "#f34f7d");
    } else {
      $(".navbar").css("position", "relative");
      $(".navbar").css("margin-top", "-15px");
      $(".navbar").css("background-color", "transparent");
      $(".navbar").css("opacity", "1");
    }
  });
  // $(".navbar").css("position", "fixed");
  $(window).scrollTop(0);
};
// $(window).on("beforeunload", function() {});
