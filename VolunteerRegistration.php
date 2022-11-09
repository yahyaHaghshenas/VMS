<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Register as Volunteer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="header">
        <h2>Register As Volunteer</h2>
    </div>

        <form action="index.php" method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="Username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="Password">
        </div>
        <div class="input-group">
            <label>Fullname</label>
            <input type="text" name="Fullname">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="text" name="Phone">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="Email">
        </div>
        <div class="input-group">
            <label>Occupation</label>
            <input type="text" name="Occupation">
        </div>
        <div class="input-group">
            <label>BirthDate</label>
              <input type="date" id="BirthDate" name="BirthDate">

        </div>
        <br>
        <div class="input-group">
            <button type="Register" name="Register" class="btn">Register</button>
            
        </div>
    </form>

</body>
</html>