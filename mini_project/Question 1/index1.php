<!DOCTYPE html>
<html>
<head>
    <title>Province Data in China</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        th {
            color:white;;
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Province Data in China</h1>
        <table class="table table-striped table-hover">
            <thead  class="bg-success">
                <tr>
                    <th  scope="col">Province</th>
                    <th  scope="col">Latitude</th>
                    <th  scope="col">Longitude</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //  GET request to  API URL
                // i am using Ccrul type
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://covid-19-statistics.p.rapidapi.com/provinces?iso=CHN",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: covid-19-statistics.p.rapidapi.com",
                        "X-RapidAPI-Key: 29c4c89508msh96664ce84f41c3cp10adc7jsn6e57f68d244b"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);

                if ($err) {
                    echo "<tr><td colspan='3'>cURL Error #:" . $err . "</td></tr>";
                } else {
                    // JSON decode 
                    $data = json_decode($response, true);

                    
                    if (isset($data['data'])) {
                        $provinces = $data['data'];
                        // Display 
                        foreach ($provinces as $province) {
                            echo '<tr>';
                            echo "<td>" . $province['province'] . "</td>";
                            echo "<td>" . $province['lat'] . "</td>";
                            echo "<td>" . $province['long'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data available</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
            <div class="bg-success text-white text-center h2">
                Index No : ITBNM-2110-0038 <br />
                Name : M.F. Feros Mohamed   <br />
                Faculty : IT


            </div>

</body>
</html>
