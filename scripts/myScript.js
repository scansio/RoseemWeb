var result;
$(document).ready(function () {

  var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };
  
  function success(pos) {
    var crd = pos.coords;
  
    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    console.log(`More or less ${crd.accuracy} meters.`);
  }
  
  function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }
  
  navigator.geolocation.getCurrentPosition(success, error, options);
  
  $(".submitbtn").on("click", function (e) {
    let iN = document.getElementsByTagName("input");
    if(pass(iN)){
      getText("summit1.php", getD());
      
      setTimeout(function (){
        document.getElementsByClassName("err").item(0).innerHTML = result;
        document.getElementsByClassName("err").item(0).style.visibility = "visible";
        for(i = 0; i < iN.length; i++){
          iN.item(i).value = '';
        }
      }, 200);
      
    }
    
  });

  $("input").focusin(function (){
    
    $(this).removeClass("invalid");
    document.getElementsByClassName("err").item(0).style.visibility = "hidden";
  });

  $(".img").hover(
    function () {
      $(this).addClass("popover");
    },
    function () {
      $(this).removeClass("popover");
    }
  );

  $(".navbar-toggler").focusin(function () {
    $("#nav-text-collapse").addClass("sText");
  });
  $(".navbar-toggler").focusout(function () {
    setTimeout(() => {
      $("#nav-text-collapse").removeClass("sText");
    }, 500);
  });
  /* $('[name="user"]').onmousedown(
        function(){
            getText("submit.php");
    });

    $('[name="submit"]').on("mousedown click",
        function(){
            getText("submit.php");
    }); */

  $(".display").click(function () {
    // this.preventDefault();
    getText("dispResult.php", this);
    setTimeout(function (){
      document.getElementsByClassName("bodyParser").item(0).innerHTML = result;
    }, 200);    
    
  });
});

function pass(check){
  this.element = [check.item(0), check.item(1), check.item(2), check.item(3), check.item(4), check.item(5)];
    if (element[0].value == ""){
      a(element[0].name, "Total amount required");
    }else if (element[1].value == ""){
      a(element[1].name, "Expense Required; if no expense enter 0");
    }else if (element[2].value == ""){
      a(element[2].name, "Description for the Expense Required");
    }else if (element[3].value == ""){
      a(element[3].name, "Saved Amount Required; if non enter enter 0");
    }else if (element[4].value == ""){
      a(element[4].name, "Change for the Next Day Required; if non enter enter 0");
    }else if (element[5].value == ""){
      a(element[5].name, "Your Name is Required");
    } else return true;
  
}

function a(b, c){
  document.getElementsByClassName("err").item(0).innerHTML = c;
  document.getElementsByClassName("err").item(0).style.visibility = "visible";
  $("[name=\"" + b + "\"]").addClass("invalid");
}

function getD(){
  let f = new  pass(document.getElementsByTagName("input")).element;
  let obj = {
    "totalAmount": f[0].value,
    "expense": f[1].value,
    "description": f[2].value,
    "saved": f[3].value,
    "change": f[4].value,
    "user": f[5].value
  };
  return JSON.stringify(obj);
}

function getText(url, data) {
  let result;
  var xhl = new XMLHttpRequest();
  xhl.onreadystatechange = function () {
    if (xhl.readyState == 4 && xhl.status == 200) {
      result = xhl.responseText;
    }
  };

  xhl.open("POST", url, true);
  // let bd = "________________________________________" + Date.now().toString(16);
  xhl.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  if(data != null){ 
    xhl.send("element="+data);

  }else xhl.send();
 
  return result;
}
var file = new File();
console.log(file);