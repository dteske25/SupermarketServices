<?php

        $errors = array();

        // Check if name has been entered
        if (!isset($_POST['name'])) {
                $errors['name'] = 'Please enter your name.';
        }

        if (!isset($_POST['address'])) {
                $errors['address'] = 'Please enter your address.';
        }

        if (!isset($_POST['city'])) {
                $errors['city'] = 'Please enter your city.';
        }

        if (!isset($_POST['state'])) {
                $errors['state'] = 'Please enter your state.';
        }

        if (!isset($_POST['zip'])) {
                $errors['zip'] = 'Please enter your zip.';
        }

        if (!isset($_POST['country'])) {
                $errors['country'] = 'Please enter your country.';
        }

        if (!isset($_POST['phone'])) {
                $errors['phone'] = 'Please enter your phone.';
        }

        // Check if email has been entered and is valid
        if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Please enter a valid email address.';
        }


        $errorOutput = '';

        if(!empty($errors)){

                $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
                $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

                $errorOutput  .= '<ul>';

                foreach ($errors as $key => $value) {
                        $errorOutput .= $value.'\n';
                }

                $errorOutput .= '</ul>';
                $errorOutput .= '</div>';

                echo $errorOutput;
                die();
        }
        $info = '';
        if (isset($_POST['company'])){
            $info .= "\tCompany:\t".$_POST['company']."\n";
        }
	    $info .= "\tAddress:\n\t\t".$_POST['address']."\n";
        if (isset($_POST['address2'])){
            $info .= "\t\t".$_POST['address2']."\n";
        }
        $info .= "\t\t".$_POST['city'].", ".$_POST['state']." - ".$_POST['zip']."\n\t\t".$_POST['country']."\n\tPhone: \t".$_POST['phone']."\n\tEmail: \t".$_POST['email'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $from = $email;
        $to = 'dteske25@gmail.com';
        $subject = 'Testing Contact Forms';


        $message = $info."\n\n\tI am interested in:\n";

        if (isset($_POST['walkIns'])){
                $message .= "\t\tWalk Ins \n";
        }
        if (isset($_POST['coolerFreezerCombo'])){
                $message .= "\t\tCooler Freezer Combos \n";
        }
        if (isset($_POST['refrigerationEquipment'])){
                $message .= "\t\tRefrigeration Equipment \n";
        }
        if (isset($_POST['iceMachines'])){
                $message .= "\t\tIce Machines \n";
        }
        if (isset($_POST['drinkDispensers'])){
                $message .= "\t\tDrink Dispensers \n";
        }
        if (isset($_POST['commercialCabinets'])){
                $message .= "\t\tCommercial Cabinets \n";
        }
        if (isset($_POST['fountainMachines'])){
                $message .= "\t\tFountain Machines \n";
        }
        if (isset($_POST['reachIns'])){
                $message .= "\t\tReach Ins \n";
        }
        if (isset($_POST['commercialFreezers'])){
                $message .= "\t\tCommercial Freezers \n";
        }
        if (isset($_POST['floralCoolers'])){
                $message .= "\t\tFloral Coolers \n";
        }
        if (isset($_POST['displayDoors'])){
                $message .= "\t\tDisplay Doors \n";
        }
        if (isset($_POST['beerCaves'])){
                $message .= "\t\tBeer Caves \n";
        }
        if (isset($_POST['gondolaShelving'])){
                $message .= "\t\tGondola Shelving \n";
        }
        if (isset($_POST['clamshellsAndAddOnHoods'])){
                $message .= "\t\tClamshells and Add On Hoods \n";
        }
        if (isset($_POST['convectionOvens'])){
                $message .= "\t\tConvection Ovens \n";
        }
        if (isset($_POST['deckOvens'])){
                $message .= "\t\tDeck Ovens \n";
        }
        if (isset($_POST['broilersStandardFeatures'])){
                $message .= "\t\tBroilers Standard Features \n";
        }
        if (isset($_POST['griddles'])){
                $message .= "\t\tGriddles \n";
        }
        if (isset($_POST['proofersAndHoldingCabinets'])){
                $message .= "\t\tProofers and Holding Cabinets \n";
        }
        if (isset($_POST['paneBella'])){
                $message .= "\t\tPane Bella \n";
        }
        if (isset($_POST['ranges'])){
                $message .= "\t\tRanges \n";
        }
        if (isset($_POST['salamandersStandardFeatures'])){
                $message .= "\t\tSalamanders Standard Features \n";
        }
        if (isset($_POST['fryers'])){
                $message .= "\t\tFryers \n";
        }
        if (isset($_POST['meltersAndFinishingOvens'])){
                $message .= "\t\tMelters and Finishing Ovens \n";
        }
        if (isset($_POST['boothSeating'])){
                $message .= "\t\tBooth Seating \n";
        }

        $body = "From: $name\nE-Mail: $email\nMessage:\n$message";


        //send the email
        $result = '';
        if (mail ($to, $subject, $body)) {
                $result .= '<div class="alert alert-success" role="alert">';
                $result .= 'Thank You! We will be in touch';
                $result .= '</div>';

                echo $result;
                die();
        }

        $result = '';
        $result .= '<div class="alert alert-danger" role="alert">';
        $result .= 'Something bad happened during sending this message. Please try again later';
        $result .= '</div>';

        echo $result;
