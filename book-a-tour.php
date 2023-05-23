<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Popover Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-4">
  <h3>Click to Open Popover Form</h3>
  <button type="button" class="btn btn-primary" data-toggle="popover" title="Enter Details" data-content='
    <form>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  '>
    Open Popover
  </button>
</div>

<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover({
    html: true,
    sanitize: false,
    content: function () {
      return $(this).data('content');
    }
  });
});
</script>

</body>
</html>