<!DOCTYPE html>
<html lang="en">
<head>
  <title>Country Information</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {background-color:brown;}
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1 class="text-center mb-4 text-white">Country Information</h1>
        <div class="form-group">
          <h4><label for="countrySelect" class="text-white">Select Country:</label></h4>
          <select id="countrySelect" class="form-control" onchange="showCountries(this.value)">
            <option value="">Select Country</option>
            <?php
            $url = "https://restcountries.com/v3.1/all";
            $data = file_get_contents($url);
            $countries = json_decode($data, true);
            foreach ($countries as $country) {
              $countryCode = $country['cca2'];
              $countryName = $country['name']['common'];
              echo "<option value='$countryCode'>$countryName</option>";
            }
            ?>
          </select>
        </div>
        <div id="countryInfo" class="mt-4">
          <!-- Display information here -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap, JS, jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function showCountries(countryCode) {
      if (countryCode == "") {
        document.getElementById("countryInfo").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("countryInfo").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "getcountry.php?q=" + countryCode, true);
        xmlhttp.send();
      }
    }
  </script>


            <div class="bg-success text-white text-center h2">
                Index No : ITBNM-2110-0038 <br />
                Name : M.F. Feros Mohamed   <br />
                Faculty : IT


            </div>
</body>
</html>
