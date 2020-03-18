var url = "https://mcdapp1.azureedge.net/P_";

var hot_array = ["G10201","Q149","G52001","G051"];
for (var pf = 0; pf < hot_array.length; pf++) {
  var coupon = hot_array[pf];
  $("#test").append(
    '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 hot" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+coupon+'"  value="'+coupon+'"/><label for="'+coupon+'"><img src="' + url + coupon + '.jpg" title="' + coupon + '" onerror="$(this).hide()"/></input></label></div>'
  );
}

var special_array = ["G41501","G41001","G30801","G10801","G41601","G30601","G41101"];
for (var pf = 0; pf < special_array.length; pf++) {
  var coupon = special_array[pf];
  $("#test").append(
    '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 special" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+coupon+'"  value="'+coupon+'"/><label for="'+coupon+'"><img src="' + url + coupon + '.jpg" title="' + coupon + '" onerror="$(this).hide()"/></input></label></div>'
  );
}

//normal //s, G, Q
var photocategoryarray = ["G"];
for (var pf = 0; pf < photocategoryarray.length; pf++) {
  var photocategory = photocategoryarray[pf];
  for (var i = 11; i <= 226; i++) {
    var k = "" + i; //toString();
    if (i <= 100) {
      k = "0" + k;
      $("#test").append(
        '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 test1" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+photocategory + k +'"  value="'+photocategory + k+'"/><label for="'+photocategory + k+'"><img src="' + url + photocategory + k + '.jpg" title="' + photocategory + k + '" onerror="$(this).hide()"/></input></label></div>'
      );

    } else if (i > 100 && i <=120 ) {
      $("#test").append(
        '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 test2" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+photocategory + k+'"  value="'+photocategory + k+'"/><label for="'+photocategory + k+'"><img src="' + url + photocategory + k + '.jpg" title="' + photocategory + k + '" onerror="$(this).hide()"/></input></label></div>'
      );
    } else if (i > 120 && i <=150 ) {
      $("#test").append(
        '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 test3" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+photocategory + k+'"  value="'+photocategory + k+'"/><label for="'+photocategory + k+'"><img src="' + url + photocategory + k + '.jpg" title="' + photocategory + k + '" onerror="$(this).hide()"/></input></label></div>'
      );
    } else if (i > 150 && i <=226 ) {
      $("#test").append(
        '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 test4" onerror="$(this).hide()"><input type="checkbox" name="checkbox[]" id="'+photocategory + k+'"  value="'+photocategory + k+'"/><label for="'+photocategory + k+'"><img src="' + url + photocategory + k + '.jpg" title="' + photocategory + k + '" onerror="$(this).hide()"/></input></label></div>'
      );
    }

  }
}
//获取 dom 对象集合
function GetCheckData() {
  return $("input");
}
// 全选操作
function CheckAll() {
  GetCheckData().prop("checked",true);
}
// 反选操作
function Inverse() {
    GetCheckData().each(function () {
        $(this).prop("checked", !$(this).prop("checked"));
    });
}
//清除操作
function CleanUp() {
    GetCheckData().prop("checked",false);
}

