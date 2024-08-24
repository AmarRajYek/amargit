<!DOCTYPE html>
<html>
<head>
    <title>Guessing Game</title>
    <style>
        /* Added a font family and font size for better readability */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        
        .container {
            background-color: #1d8eff52; /* Changed to a softer blue */
            border: 3px solid black; /* Changed to a darker green */
            margin: 20px; /* Added some margin for better spacing */
            padding: 20px; /* Added some padding for better spacing */
            border-radius: 10px; /* Added a border radius for a smoother look */
        }
        
        .con {
            align-items: center;
            background-color: #F5F5DC; /* Changed to a lighter beige */
            margin: 50px; /* Reduced the margin for better spacing */
            padding: 20px; /* Reduced the padding for better spacing */
            border: 3px solid #32CD32; /* Changed to a darker green */
            border-radius: 10px; /* Added a border radius for a smoother look */
        }
    </style>
</head>
<body>
    <?php
    
    session_start(); // start the session to store the random number and tries
    
    if (!isset($_SESSION['randomNumber'])) {
        $_SESSION['randomNumber'] = rand(1, 100);
        $_SESSION['tries'] = 0;
    }
    
    if (isset($_POST['guess'])) {
        $guess = intval($_POST['guess']); // convert to integer
    
        if ($guess < 1 || $guess > 100) {
            $message = "Invalid input. Please enter a number between 1 and 100.";
        } else {
            $_SESSION['tries']++; // increment tries
    
            if ($guess == $_SESSION['randomNumber']) {
                $message = "Congratulations! You guessed the number correctly. The Number is " . $_SESSION['randomNumber'];
                unset($_SESSION['randomNumber']); // reset the game
                unset($_SESSION['tries']);
            } elseif ($guess < $_SESSION['randomNumber']) {
                $message = "<font color=red> Your guess is too low. Try again. </font>";
            } else {
                $message = "<font color=red>Your guess is too high. Try again. </font>";
            }
    
            if ($_SESSION['tries'] >= 5) { // check against maxtries
                $message = "<font color=#2cef10>Sorry, you ran out of tries. The number was: " . $_SESSION['randomNumber']."  </font>";
                unset($_SESSION['randomNumber']); // reset the game
                unset($_SESSION['tries']);
            }
        }
    
        echo "<p>$message</p>"; // Display the message
    }
    ?>
    <div class="container">
        <h2>Guessing Game</h2> <!-- Added a heading for better readability -->
        <p>Guess a number between 1 and 100.</p>
        
        <form method="post" action="" class="con">
            <label for="guess">Enter your guess:</label>
            <input type="number" name="guess" id="guess">
            <br><input type="submit" value="Guess">
        </form>
    </div>
</body>
</html>