<?php
session_start();

include 'functions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Find Tours</h1>

    <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] === 'error'):
            $errors = $_SESSION['errors'];
    ?>
    <ul class="errors">
            <?php foreach($errors as $e): ?>
                <li><?= $e ?>></li>
                <?php endforeach; ?>
    </ul>
    <?php
        elseif(isset($_SESSION['status'])&& $_SESSION['status']=== 'success'):
            $data = $_SESSION['data'];
    ?>

    <div class="success">
        <p>Message sent successfully!</p>
        <p>Here are the details you entered:</p>

        <ul>

            <li>Name: <em><?= $data['name'] ?></em></li>
            <li>Email: <em><?= $data['email'] ?></em></li>
            <li>Season: <em><?= $data['season'] ?></em></li>
            <li>Region: <em><?= $data['region'] ?></em></li>
            <li>Interests: <em><?= $data['interests'] ?></em></li>
            <li>Participants: <em><?= $data['participants'] ?></em></li>
            <li>Message: <em><?= $data['message'] ?></em></li>

        </ul>

    </div>


<?php 
        endif;
?>
    <form action="handle-form.php" method="post">

        <label for="firstname">First Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name"><br><br>

        <!-- <label for="firstname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" placeholder="Enter your last name"><br><br> -->

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter email for contact"><br><br>

        <label for="region">Where would you like to go?</label>
        <select name="region" id="region">
        <option value="select">--Select--</option>
            <option value="Asia">Asia</option>
            <option value="Oceania">Oceania</option>
            <option value="Africa">Africa</option>
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="Latin America">Latin America</option>
        </select><br><br>

        <p>Preffered seaons: </p>
        <input type="radio" name="season" id="summer"> <label for="summer">Summer</label>
        <input type="radio" name="season" id="winter"> <label for="winter">Winter</label>
        <input type="radio" name="season" id="spring"><label for="spring">Spring</label>
        <input type="radio" name="season" id="autumn"><label for="autumn">Autumn</label>
        <input type="radio" name="season" id="monsoon"><label for="monsoon">Monsoon</label><br><br>

        <p>Your interests:</p> 
        <input type="checkbox" name="interests[]" id="photography" value="Photography"> <label for="photography">Photography</label>
        <input  type="checkbox" name="interests[]" id="trekking" value="Trekking">  <label for="trekking">Trekking</label>
        <input type= "checkbox" name="interests[]" id="star-gazing" value="Star Gazing"> <label for="star-gazing">Star Gazing</label>
        <input type= "checkbox" name="interests[]" id="bird-watch" value="Bird Watch">  <label for="bird-watch">Bird Watch</label>
        <input type= "checkbox" name="interests[]" id="camping" value="Camping">   <label for="camping">Camping</label><br><br>

        <label for="participants">No. of Participants</label>  <input type= "number" name="participants" id="participants">   
        <br><br> <label for="message">Tell about your requirements: </label> <br><br> <textarea name="message" id="message"></textarea>

        <input type= "hidden" name="token" value="">  

        <br><br>
        <button type="submit">Send</button>
    </form>    

    </div>
</body>
</html>

<?php 

unset($_SESSION['status']);
unset($_SESSION['errors']);
unset($_SESSION['data']);
?>




