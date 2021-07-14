<html>
    <head>
        <style>input[type=text],input[type=email], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}</style>
</head>
<body><div class="container">
  <form action="insert.php" method="post" enctype="multipart/form-data">
    <div class="row">


      <div class="col-25">
        <label for="fname">  age</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="age" placeholder="age..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">gender</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="gender" placeholder="gender">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">email</label>
      </div>
      <div class="col-75">
      <input type="email" id="lname" name="email" placeholder="email">
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="subject">About</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="about" placeholder="about" style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Image</label>
      </div>
      <div class="col-75">
       <input type="file" name="image">
      </div>
      <div class="row">
      <div class="col-25">
        <label for="subject">MOBILE</label>
      </div>
      <div class="col-75">
       <input type="text" name="mob">
      </div>
    </div>
    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>

</div>
</body>
</html>