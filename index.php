<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form sheet</title>
   </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

  <h1 class="text-center"> Contact Me</h1>

  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto my-5">
        <form method="post" id="form_sheet" action="insert.php">

          <div class="row">

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Mobile No.</label>
              <input type="number" name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="Enter your mobile number" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Massage</label>
              <input type="text" name="massage" id="" class="form-control" placeholder="Enter Massage" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
            <input type="text" name="address" id="" class="form-control" placeholder="Address" required>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <div class="g-recaptcha" data-sitekey="6LfbKqkhAAAAAEFLP2deGzGLNLleTashf9EckTFY"></div>
                <br />
              </div>
            </div>

          </div>
          <input type="submit" id="btnSubmit" class="btn btn-primary" name="submit" value="submit">
          <label for="" id="msg"></label>
      </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
     jQuery('#form_sheet').on('submit', function(e) { 
       jQuery.ajax({
         url: 'https://script.google.com/macros/s/AKfycbx6L0DTPx7YWUWeJiKhZu8v0-lZv9SSbDR5h4myfm_wJNqyUseT24xW8rAGtVhW_JFyRg/exec',
         type: 'post',
         data: jQuery('#form_sheet').serialize(),
          success: function(res) {
          //  jQuery('#form_sheet')[0].reset();
          //  jQuery('#msg').html('We will back soon ...');
           
          }
       });
     
     });
   </script>

</body>

</html>