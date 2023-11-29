<?php
popen('cls', 'w');
header("Content-Type: Application/Json UTF-8");
include "./shiwew/function.php";
include "./shiwew/color.php";
$red = "\033[0;31m";
$green = "\033[0;32m";
$yellow = "\033[0;33m";
$purple = "\033[1;35m";
$endcolor = "\033[0m";
popen('cls', 'w');

echo"$red";
echo" _______ ____   ____  _      ______          \n";
usleep( 30 * 2000 );
echo"|__   __/ __ \ / __ \| |    |___  /         \n";
usleep( 30 * 2000 );
echo"   | | | |  | | |  | | |       / /          \n";
usleep( 30 * 2000 );
echo"   | | | |  | | |  | | |      / /           \n";
usleep( 30 * 2000 );
echo"   | | | |__| | |__| | |____ / /__          \n";
usleep( 30 * 2000 );
echo"   |_|  \____/ \____/|______/_____| _______ \n$endcolor";
usleep( 30 * 2000 );
echo"$yellow    /\   | |    |  _ \|  ____|  __ \__   __|\n";
usleep( 30 * 2000 );
echo"   /  \  | |    | |_) | |__  | |__) | | |   \n";
usleep( 30 * 2000 );
echo"  / /\ \ | |    |  _ <|  __| |  _  /  | |   \n";
usleep( 30 * 2000 );
echo" / ____ \| |____| |_) | |____| | \ \  | |   \n";
usleep( 30 * 2000 );
echo"/_/    \_\______|____/|______|_|  \_\ |_|   \n$endcolor";
usleep( 30 * 8000 );

        echo "\n\nPut you email name: ";

        $eml = trim(fgets(STDIN));
        //$options = array('vintomaper.com', 'labworld.org');
        //$RandEmail = $options[array_rand($options)];
        $idz = "$eml@vintomaper.com";
        echo "Your Email is: $idz
        
        
        ";
        $repeats = 0;
        while (true) {
                $result = GetMail($idz);
                $repeats++;
                echo "\r$randomcolor Waiting for incoming message!$endcolor\r";


                
                if(strpos($result, "200") !== false) {
                    
                    $rex = emailData($idz);
                    $rex = json_decode($rex, true);
                    $id = $rex['data']['0']['id'];
                    $sendername = $rex['data']['0']['sender']['display_name'];
                    $senderemail = $rex['data']['0']['sender']['email'];
                    $timesent = $rex['data']['0']['sender']['updated_at'];
                    $subject = $rex['data']['0']['subject'];
                    $Sindikato = LetterFilter($id);
                    
                    break;
                }

            }

sleep(1);
$numx = rand(10000,99999);
$filex = fopen("./inbox/$sendername-$numx.html", "w");
fwrite($filex, "$Sindikato");
fclose($filex);
echo "\033[1;35m
========================================
Name Sender: \033[0;33m$sendername\033[0m\033[1;35m
Email Sender: \033[0;33m$senderemail\033[0m\033[1;35m
Subject: \033[0;33m$subject\033[0m\033[1;35m
Message: \033[0;33m$Sindikato\033[0m\033[1;35m
Letter HTML: \033[0;33m/inbox/$sendername-$numx.html\033[0m\033[1;35m
Time Recieved: \033[0;33m$timesent\033[0m\033[1;35m
========================================\033[0m
";