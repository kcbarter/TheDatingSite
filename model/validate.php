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
    if(!empty($Gender))
        return true;
}

$errors = array();

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
    $errors['Age'] = "Your not old enough to be on this site/Please enter an age!";
}

if(!validPhone($Phone))
{
    $errors['Phone'] = "Please enter a valid phone number";
}

if(!validGender($Gender))
{
    $errors['gender'] = "Please select a gender";
}

$success = (sizeof($errors) == 0);
