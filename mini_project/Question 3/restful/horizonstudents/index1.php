<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Change this to your desired background color */
        }
        .container {
            background-color: #ffffff; /* Change this to your desired container background color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        label {
        color:white; 
    }
    </style>
</head>
<body class="bg-success">
    <div class="container text-center" style="background-color:brown;">
        <h2 class="text-white">Student Registration</h2>
        <form method="post" action="add_student.php">
            <div class="row mb-3">
                <label for="indexNo" class="col-sm-2 col-form-label text-sm-end">Index No.:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="indexNo" id="indexNo">
                </div>
            </div>
            <div class="row mb-3">
                <label for="firstName" class="col-sm-2 col-form-label text-sm-end">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstName" id="firstName">
                </div>
            </div>
            <div class="row mb-3">
                <label for="lastName" class="col-sm-2 col-form-label text-sm-end">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lastName" id="lastName">
                </div>
            </div>
            <div class="row mb-3">
                <label for="city" class="col-sm-2 col-form-label text-sm-end">City:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city">
                </div>
            </div>
            <div class="row mb-3">
                <label for="district" class="col-sm-2 col-form-label text-sm-end">District:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="district" id="district">
                </div>
            </div>
            <div class="row mb-3">
                <label for="province" class="col-sm-2 col-form-label text-sm-end">Province:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="province" id="province">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label text-sm-end">Email Address:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="mobile" class="col-sm-2 col-form-label text-sm-end">Mobile Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" id="mobile">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





