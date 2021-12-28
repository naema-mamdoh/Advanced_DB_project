<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="navbar">
        <h1><a href="project.php">University City Application Form</a></h1>
      </div>
      <div class="content">
        <br /><br />
        <form method="post" action="check1.php">
          <label>National-Id: </label>
          <input
            type="text"
            placeholder="Enter your national number"
            class="form-control"
            name="nationalidcheck"
          />
          <br />
          <div class="but">
            <input type="submit" value="Check" name="Checking" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
