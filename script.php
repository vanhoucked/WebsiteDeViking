<?php

    $to      = 'reservaties@devikingodk.be';
    $subject = 'Tafelreservering ' . $_POST["date"] . ' door ' . $_POST["naam"];
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    $headers .= 'From: ' . $_POST["email"];

    $htmlContent = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            background-color: white;
        }
    
        span {
            width: 100;
            height: 150;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        div {
            border: 3px solid white;
            width: 30vw;
            height: 70vh;
            margin-top: 10vh;
            text-align: center;
            color: black;
        }
    
        div > img {
            width: 300px;
        }
    </style>
    
    </head>
    <body>
        <span>
        <div>
            <p><b>Datum: </b>' . $_POST["date"] . '</p>
            <p><b>Naam: </b>' . $_POST["naam"] . '</p>
            <p><b>E-mail: </b>' . $_POST["email"] . '</p>
            <p><b>Telefoon: </b>' . $_POST["telefoon"] . '</p>
            <p><b>Aantal: </b>' . $_POST["aantal"] . '</p>
            <p><b>Aankomst: </b>' . $_POST["tijd"] . '</p>
            <p><b>Opmerking: </b>' . $_POST["opmerking"] . '</p>
            
            <br><p>Reageer door op deze mail te antwoorden.</p>
        </div>
        </span>
    </body>
    </html>
';

    mail($to, $subject, $htmlContent, $headers);

    header("Location: http://www.devikingodk.be/succes.html");
    exit();

?>