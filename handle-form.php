<?php 

session_start();

$name = "";
$email = "";
$region = "";
$season = "";
$interests = "";
$participants = 0;
$message = "";
$token = "";
$data = [];




$errors = [];

if(!empty($_POST['name'])){

    $name = $_POST['name'];
    if(ctype_alpha(str_replace(" ", "", $name))=== false){
        $errors[] = "Name should contain only alphabets and spaces";
    }
}
else{
    $errors[] = "Name field cannot be empty";
}

//2. Email 

if(!empty($_POST['email'])){

    $email  = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== $email){
        $errors[] = "Email is not valid";
    }

}
else {
    $errors[] = "Email can't be empty";
}


//3. Region - required, value should be from the list 
if(!empty($_POST['region'])){
    $region = $_POST['region'];
    $allowed_regions = ["Asia", "Oceania", "Africa", "Europe", "North America", "Latin America"];
    if(!in_array($region, $allowed_regions)){
        $errors[] = "Region not in list";

    } 

}else{
    $errors[] = "Select a region from the list";
}

//4. Season - 

if(!empty($_POST['season'])){
    $season = $_POST['season'];
    $allowed_seasons = ["Summer", "Winter", "Spring", "Autumn", "Monsoon"];
    if(!in_array($season, $allowed_seasons)){
        $errors[] = "Invalid Season";
    }
}


//5. Interests-

if(!empty($_POST['interests'])){

    $interests = $_POST['interests'];
    $interests_allowed = ["Photography", "Trekking", "Star Gazing", "Bird Watching", "Camping"];

    foreach($interests as $interest){
        if(!in_array($interest, $interests_allowed)){
            $errors[] = "THe activity you selected is not in our list";
            break;
        }
    }

}

//6. Participants - required, must be between 1 and 10

if(!empty($_POST['participants'])){
    $participants = (int)$_POST['participants'];
    if($participants < 1 || $participants > 10){
        $errors[] = "No. of participants must be 1-10";
    }


}
else{
    $errors[] = "Specify the no. of participants";
}

//7 Message

if(!empty($_POST['message'])){
    $message = $_POST['message'];

}
else{
    $errors[] = "Tell about your requirements";
}


if($errors){
 

    $_SESSION['status'] = 'error';
    $_SESSION['errors'] = $errors;
    header('Location:newform.php?result=validation_error');
    die();
    
}
else {
     

    $data = [
        "name" => $name,
        "email" => $email,
        "region" => $region,
        "season" => $season,
        "interests" => implode(", ", $interests),
        "participants" => $participants,
        "message" => $message

    ];

  $_SESSION['status']='success';
  $_SESSION['data'] = $data;
  header('Location:newform.php?result=success');
  die();

}



 