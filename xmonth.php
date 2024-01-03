<?php
function subscribe($inscriptionType){
    if (isset($_POST['submit'])){
        if (empty($_POST['name']) || empty($_POST['card_number']) || empty($_POST['expiration_date']) || empty($_POST['cvv'])){

        }else{
            $control = new Controller();
            require_once "CardController.php";
            require_once "Card.php";
            $cardControl = new CardController();

            $card = new Card(
                (string)$_POST['name'],
                (string)$_POST['card_number'],
                (string)$_POST['expiration_date'],
                (string)$_POST['cvv'],
                (int)$_SESSION['id']
            );
            $cardControl->createCard($card);
            $control->updatePersonInscriptionByEmail($_SESSION['email'], $inscriptionType);
        }
    }
}
function template($price){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Payment Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Bank Payment Page</h1>

    <form action="" method="post">
        <!-- Customer information -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="card_number">Card Number:</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="expiration_date">Expiration Date:</label>
                <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" required>
            </div>

            <div class="form-group col-md-6">
                <label for="cvv">CVV:</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>
        </div>

        <!-- Amount to pay -->
        <div class="form-group">
            <label for="amount">Amount:</label>
            <h2>'.$price.'$</h2>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary" name="submit">Make Payment</button>
    </form>
</div>

<!-- Add Bootstrap JS and Popper.js scripts (required for some Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>';
}
?>
