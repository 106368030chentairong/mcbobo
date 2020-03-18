//normal //s, G, Q
$(document).ready(function() {

  const testFolder = './image/';
  const fs = require('fs');
  
  fs.readdir(testFolder, (err, files) => {
    files.forEach(file => {
      console.log(file);
    });
  });

  /*
  var photocategoryarray = ["G", "S", "Q"];
  for (var pf = 0; pf < photocategoryarray.length; pf++) {
    var photocategory = photocategoryarray[pf];
    $(".show").append($("<h2>"+photocategory+"<h2/>"));
    for (var i = 1; i <= 1000; i++) {
      var k = "" + i; //toString();
      var url = "https://mcdapp1.azureedge.net/P_";
      if (i < 10) {
        k = "00" + k;
      } else if (i < 100) {
        k = "0" + k;
      }
      // for(var )
      $(".show").append(
        '<li><input type="checkbox" name="checkbox[]" id="'+photocategory +k+'"  value="'+photocategory +k+'" />'+
        '<label for="'+photocategory+k+'"><img src="'+url+photocategory +k+'.jpg" /></label></li>'
      );
    }
  }
  */
});

// AJAX Cross Site Error
//   url += "G" + k + ".jpg";
//   $.ajax({
//     url: url,
//     success: function() {
//       $(".show").append(
//         '<a target="_blank" href="' +
//           url +
//           "G" +
//           k +
//           '.jpg"><img src="' +
//           url +
//           "G" +
//           k +
//           '.jpg" alt="' +
//           "G" +
//           k +
//           '" /></a>'
//       );
//     }
//   });
// }

//survey presents
// for (var i = 1; i <= 210; i++) {
//   var k = ""+i; //toString();
//   if (i < 10) {
//     k = "00" + k;
//   } else if (i < 100 && i > 10) {
//     k = "0" + k;
//   }
//   $(".show").append(
//     '<a target="_blank" href="https://mcdapp1.azureedge.net/P_Q' + k + '.jpg"><img src="https://mcdapp1.azureedge.net/P_Q' +
//       k +
//       '.jpg" alt="' +
//       "P_G" +
//       k +
//       '" /></a>'
//   );
// }

//How to hide 404 images?

