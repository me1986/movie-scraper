<!doctype html>
<html>
<head>
<title>Movies Scrape</title>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="http://ec2-50-19-187-57.compute-1.amazonaws.com/ci/assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1><font color="blue">Movies Scrape</font></h1>
    </div>
<div class="row"></div>
<div id="loader"></div>
<div class="row">
    <div class="col-xs-6 col-md-4">
         <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span>&nbsp;&nbsp;Application</h3>
            </div>
            <div class="panel-body">
                Enter your zip code to return movie showtimes in your area.<br/>
                Author: <a href="mailto:wschweitzer00@gmail.com">Walter Schweitzer</a><br/>
            </div>
      </div>
 </div>
 
<div class="col-xs-6 col-md-4">
  <form  class="form-signin" role="form">
         <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-tower"></span>&nbsp;&nbsp;Enter Zip Code</h3>
            </div>
            <div class="panel-body">
        <input id="zip-code-value" type="zip" class="form-control" placeholder="10019" required autofocus></input>
        <br/>
 <button id="zip-code" class="btn btn-lg btn-primary btn-block ladda-button" type="submit" data-style="expand-right" data-color="green" data-size="medium" data-spinner-size="40" data-spinner-color="#ff0000">
         <span class="ladda-label">Get Showtimes!</span>
</button> 


     </form>
      </div>
   </div>
</div>
<div class="col-xs-6 col-md-4">
</div>
<div class="row">
  <div id="results"class="col-md-8"></div>
  <div class="col-md-4"></div>
</div>
<div class="modal"></div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://ec2-50-19-187-57.compute-1.amazonaws.com/ci/assets/javascript/main.js"></script>


</body>
</html>