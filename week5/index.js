$("button").click(function () {
  $(".container").toggle();
});
function showVideo(ele) {
  $("#videoTag").attr("src", ele.getAttribute("src"));
}
var flag = false;
function animer() {
  if (flag) {
    $("img")
      .animate(
        { width: "400px", height: "100px" },
        {
          duration: 1000,
          easing: "linear",
        }
      )
      .animate({ opacity: "50%" });
    flag = !flag;
    $("#vidSpan").animate(
      { fontSize: "70px" },
      { duration: 2000, complete: animer }
    );
  } else {
    $("img")
      .animate(
        { width: "20px", height: "20px" },
        {
          duration: 1000,
          easing: "linear",
        }
      )
      .animate({ opacity: "100%" });
    flag = !flag;
    $("#vidSpan").animate(
      { fontSize: "10px" },
      { duration: 2000, complete: animer }
    );
  }
}
function areaAnimer() {
  $(".area")
    .animate(
      { left: 0, width: "250px", height: "250px", top: 0 },
      { duration: 1000, easing: "linear" }
    )
    .animate(
      {
        left: "1200px",
        width: "50px",
        height: "50px",
        top: "60px",
      },
      { duration: 1000, easing: "linear", complete: areaAnimer }
    );
}
animer();
areaAnimer();
