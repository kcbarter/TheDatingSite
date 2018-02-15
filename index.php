<?php
//require the autoload file
require_once ('vendor/autoload.php');

session_start();

//create an instance of the base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view ->render("pages/home.html");
});

$f3->route('GET /home', function () {
    $view = new Template();
    echo $view ->render("pages/home.html");
});

$f3->route('GET /info', function() {
    $view = new Template();
    echo $view ->render("pages/personalInfo.html");
});



$f3->route('GET|POST /profile', function ($f3){
    if(isset($_POST['submit']))
    {
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Age = $_POST['Age'];
        $Phone = $_POST['Phone'];
        $Gender = $_POST['gender'];
        $memStatus = $_POST['member'];
        $page = 'personal';

        include ('model/validate.php');

        $f3->set('errors', $errors);
        $f3->set('success', $success);

        if($errors)
        {
            $f3->set('FirstName', $FirstName);
            $f3->set('LastName', $LastName);
            $f3->set('Age', $Age);
            $f3->set('Phone', $Phone);
            $f3->set('gender', $Gender);
            $view = new Template();
            echo $view ->render('pages/personalInfo.html');
        }
        else
        {
            if($memStatus == 'preMember')
            {
                $premiumMember = new PremiumMember($FirstName, $LastName,
                    $Age, $Gender, $Phone);
                $_SESSION['member'] = $premiumMember;
            }
            else
            {
                $member = new Member($FirstName, $LastName,
                    $Age, $Gender, $Phone);
                $_SESSION['member'] = $member;
            }
            print_r($_SESSION);

            $view = new Template();
            echo $view ->render("pages/profile.html");
        }
    }

});

$f3->set('states', array('Washington', 'Oregon', 'California', 'Idaho', 'Hawaii'));


$f3->route('GET|POST /interests', function ($f3){
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $mystate = $_POST['mystate'];
        $seeking = $_POST['seeking'];
        $biography = $_POST['biography'];
        $page = 'profile';

        include ('model/validate.php');

        $f3->set('errors', $errors);
        $f3->set('success', $success);

        if($errors)
        {
            $f3->set('email', $email);
            $f3->set('mystate', $mystate);
            $f3->set('seeking', $seeking);
            $f3->set('biography', $biography);
            $view = new Template();
            echo $view ->render('pages/profile.html');
        }
        else
        {
            $mem = $_SESSION['member'];

            if(strcmp(get_class($mem), 'PremiumMember') == 0)
            {
                $mem->setEmail($email);
                $mem->setState($mystate);
                $mem->setSeeking($seeking);
                $mem->setBio($biography);

                $_SESSION['member'] = $mem;

                $view = new Template();
                echo $view ->render("pages/interests.html");
            }
            else
            {
                $mem->setEmail($email);
                $mem->setState($mystate);
                $mem->setSeeking($seeking);
                $mem->setBio($biography);

                $_SESSION['member'] = $mem;

                print_r($_SESSION);

                $view = new Template();
                echo $view ->render('pages/review.html');
            }
        }
    }

});

$f3->set('indoor', array('tv', 'movies', 'cooking', 'board games', 'reading',
    'playing cards', 'puzzles', 'video games'));

$f3->set('outdoor', array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'sky diving'));

$f3->route('GET|POST /display', function($f3) {
    if(isset($_POST['submit']))
    {
        $indoorAct = $_POST['indoorAct'];
        $outdoorAct = $_POST['outdoorAct'];
        $page = 'display';

        include ('model/validate.php');

        $f3->set('errors', $errors);
        $f3->set('success', $success);

        if($errors)
        {
            print_r($errors);
            $f3->set('indoorAct', $indoorAct);
            $f3->set('outdoorAct', $outdoorAct);
            $view = new Template();
            echo $view ->render('pages/interests.html');
        }
        else
        {
            $interests = $_SESSION['member'];

            $interests->setInDoorInterests($indoorAct);
            $interests->setOutDoorInterest($outdoorAct);

            $_SESSION['member'] = $interests;

            print_r($_SESSION);

            $view = new Template();
            echo $view ->render('pages/review.html');
        }
    }
});

//Run Fat-Free
$f3->run();

