<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Register School</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" href="">
<style>
</style>
<script src=""></script>
<body>
    <div class="container">

        <div>
            <div class="">
            <h1>Register Schools and their Administrators Here</h1>
            <br>
            <br>
            </div>
            <div id="schoolInfo">
                <h3>School Information</h3>
                <form method="post" action="reg_school_admin">
                <?php include('errors.php'); ?>
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="scoolName">Name:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="schoolName" name="scoolName" ><br>
                        </div>    
                    </div>    
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="schoolAddress">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"id="schoolAddress" name="schoolAddress" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="schoolCity">City:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="schoolCity" name="schoolCity" ><br>
                        </div>    
                    </div>
                
            </div>
            <hr>
            <div id="adminInfo">
                <h3>Admin Information</h3>
                
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="adminName">Full Name:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="adminName" name="adminName" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="adminPassword">Password:</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control"id="adminPassword" name="adminPassword" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="staffId">Staff ID:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="staffId" name="staffId" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="position">Position:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"id="position" name="position" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="adminPhone">Phone:</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control"id="adminPhone" name="adminPhone" ><br>
                        </div>    
                    </div> 
                    <div class="row">
                        <label class="col-sm-1 col-form-label" for="adminEmail">Email:</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control"id="adminEmail" name="adminEmail" ><br>
                        </div>    
                    </div> 
                </form>
            </div>
            <br>
            <hr>
            <br>
            <button type="submit" class="btn btn-primary btn-lg" id="regSchSubmit">SUBMIT</button>
        </div>
    </div>
    
</body>
</html>