<?php

function validFirstName($FirstName)
{
    if(!empty($FirstName) && ctype_alpha($FirstName))
        return true;
}

function validLastName($LastName)
{
    if(!empty($LastName) && ctype_alpha($LastName))
        return true;
}

function validAge($Age)
{
    if(!empty($Age) && $Age >= 18 && is_numeric($Age))
        return true;
}

function validPhone($Phone)
{
    if(!empty($Phone) && strlen($Phone) == 10 && is_numeric($Phone))
        return true;
}

function validGender($Gender)
{
    if(isset($Gender))
        return true;
}

function validEmail($email)
{
    if(!empty($email))
        return true;
}

function validStates($mystate)
{
    global $f3;
        return in_array($mystate, $f3->get('states'));
}

function validSeeking($seeking)
{
    if(isset($seeking))
        return true;
}

function validOutdoor($outdoor)
{
    global $f3;
    if(empty($outdoor)) return false;
    $valid = true;
    foreach ($outdoor as $outdoors)
    {
        if(!in_array($outdoors, $f3->get('outdoor')))
        {
            $valid = false;
        }
    }

    return $valid;

}

function validIndoor($indoor)
{
    global $f3;
    if(empty($indoor)) return false;
    $valid = true;
    foreach ($indoor as $indoors)
    {
        if(!in_array($indoors, $f3->get('indoor')))
        {
            $valid = false;
        }
    }

    return $valid;
}

$errors = array();

if(strcmp($page,'personal')==0)
{
    if(!validFirstName($FirstName))
    {
        $errors['FirstName'] = "Please enter a valid name!";
    }

    if(!validLastName($LastName))
    {
        $errors['LastName'] = "Please enter a valid Last Name!";
    }

    if(!validAge($Age))
    {
        if(!empty($Age) && $Age < 18)
        {
            $errors['Age'] = "Your not old enough to be on this site!";
        }
        elseif (empty($Age))
        {
            $errors['Age'] = "Please enter an age!";
        }
    }

    if(!validPhone($Phone))
    {
        $errors['Phone'] = "Please enter a valid phone number";
    }

    if(!validGender($Gender))
    {
        $errors['gender'] = "Please select a gender";
    }
}

if (strcmp($page,'profile') == 0)
{
    if(!validEmail($email))
    {
        $errors['email'] = "Please enter a email";
    }

    if(!validStates($mystate))
    {
        $errors['states'] = "Please select a state";
    }

    if(!validSeeking($seeking))
    {
        $errors['seeking'] = "Please make a selection";
    }

}

if(strcmp($page, 'display') == 0)
{
    if(!validOutdoor($outdoorAct))
    {
        $errors['outdoor'] = "Not a valid choice";
    }

    if(!validIndoor($indoorAct))
    {
        $errors['indoor'] = "Not a valid choice";
    }
}

$success = (sizeof($errors) == 0);