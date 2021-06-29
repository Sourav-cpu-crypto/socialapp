<!DOCTYPE html>
<html>
<head>
 <title>fb.in</title>
 <!-- font cdn -->
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!-- css reference link -->
 <link rel="stylesheet" type="text/css" href="fb.css">

</head>

<body>


<div id="fb-cover">
 <div id="but-con">
  <img id="frm" src="cap.png" width="160px" height="160px">
          <span id="ic" style="font-size:38px;position:relative;left:180px;top:-50px;color:green;visibility: hidden" class="material-icons"> check</span>

         <p id="me">Sparkle</p>
  <button id="cancel" onclick="ad()">Add Friend</button>
  <button id="confirm" onclick="re()">Remove</button>
 </div> 
<button id="open" onclick="op()">
 <span id="aa" style="font-size:36px" class="material-icons">  keyboard_arrow_right</span>
</button>
</div>

<div id="request">   

 <i class='fab fa-facebook-square' style='font-size:100px;color:#fff'></i>
 <div id="loader"></div>
    <div id="loading"></div>
    <img id="i1" src="rl.png" width="200px" height="200px">
    <img id="i2"src="rr.png" width="200px" height="200px">
    <p id="h">Hi!</p>
    <p id="rec">you have an new friend request</p>    



</div>

   
<!-- script -->
<script type="text/javascript">
 var g=document.getElementById('fb-cover');
 var r=document.getElementById('request');
  var o=document.getElementById('open');
    var ic=document.getElementById('ic');
    var h=document.getElementById("h");
    var rec=document.getElementById("rec");
    var aa=document.getElementById("aa");
function op(){
 g.style.left="600px";
  r.style.right="400px";

  aa.style.transform="rotate(-180deg)";
}
function re(){
 g.style.left="310px";
  r.style.right="200px";
   
  aa.style.transform="rotate(0deg)";
}

function ad(){
    
    ic.style.visibility="visible";
 g.style.left="310px";
  r.style.right="200px";
  h.innerHTML="Success" +"!";
  h.style.position="relative";
  h.style.right="-180px";
  rec.innerHTML="your now friend to sparkle";
  rec.style.position="relative";
  rec.style.left="70px";
     
  aa.style.transform="rotate(0deg)";
}


</script>
<!-- script end -->
</body>
</html>