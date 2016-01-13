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
                $errors['zip'] = 'Please enter your zip';
        }

        if (!isset($_POST['country'])) {
                $errors['country'] = 'Please enter your country';
        }

        if (!isset($_POST['phone'])) {
                $errors['phone'] = 'Please enter your phone';
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
                //alert $errorOutput;
                die();
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $from = $email;
        $to = 'dteske25@gmail.com';
        $subject = 'Testing Contact Forms';


        $message = 'I am interested in:\n';

        if ($_POST['walkIns']){
                $message .= '\t Walk Ins \n';
        }
        if ($_POST['coolerFreezerCombo']){
                $message .= '\t Cooler Freezer Combos \n';
        }
        if ($_POST['refrigerationEquipment']){
                $message .= '\t Refrigeration Equipment \n';
        }
        if ($_POST['iceMachines']){
                $message .= '\t Ice Machines \n';
        }
        if ($_POST['drinkDispensers']){
                $message .= '\t Drink Dispensers \n';
        }
        if ($_POST['commercialCabinets']){
                $message .= '\t Commercial Cabinets \n';
        }
        if ($_POST['fountainMachines']){
                $message .= '\t Fountain Machines \n';
        }
        if ($_POST['reachIns']){
                $message .= '\t Reach Ins \n';
        }
        if ($_POST['commercialFreezers']){
                $message .= '\t Commercial Freezers \n';
        }
        if ($_POST['floralCoolers']){
                $message .= '\t Floral Coolers \n';
        }
        if ($_POST['displayDoors']){
                $message .= '\t Display Doors \n';
        }
        if ($_POST['beerCaves']){
                $message .= '\t Beer Caves \n';
        }
        if ($_POST['gondolaShelving']){
                $message .= '\t Gondola Shelving \n';
        }
        if ($_POST['clamshellsAndAddOnHoods']){
                $message .= '\t Clamshells and Add On Hoods \n';
        }
        if ($_POST['convectionOvens']){
                $message .= '\t Convection Ovens \n';
        }
        if ($_POST['deckOvens']){
                $message .= '\t Deck Ovens \n';
        }
        if ($_POST['broilersStandardFeatures']){
                $message .= '\t Broilers Standard Features \n';
        }
        if ($_POST['griddles']){
                $message .= '\t Griddles \n';
        }
        if ($_POST['proofersAndHoldingCabinets']){
                $message .= '\t Proofers and Holding Cabinets \n';
        }
        if ($_POST['paneBella']){
                $message .= '\t Pane Bella \n';
        }
        if ($_POST['ranges']){
                $message .= '\t Ranges \n';
        }
        if ($_POST['salamandersStandardFeatures']){
                $message .= '\t Salamanders Standard Features \n';
        }
        if ($_POST['fryers']){
                $message .= '\t Fryers \n';
        }
        if ($_POST['meltersAndFinishingOvens']){
                $message .= '\t Melters and Finishing Ovens \n';
        }
        if ($_POST['boothSeating']){
                $message .= '\t Booth Seating \n';
        }

        $body = "From: $name\n E-Mail: $email\n Message:\n $message";


        //send the email
        $result = '';
        if (mail ($to, $subject, $body)) {
                $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
                $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                $result .= 'Thank You! I will be in touch';
                $result .= '</div>';

                echo $result;
                die();
        }

        $result = '';
        $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $result .= 'Something bad happened during sending this message. Please try again later';
        $result .= '</div>';

        echo $result;

