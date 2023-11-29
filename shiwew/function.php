<?php

function GetMail($genmail) {
    //$options = array('vintomaper.com', 'labworld.org');
    //$RandAgents = $options[array_rand($options)];
    $coder = "$genmail";
    $coders = "https://cryptogmail.com/api/emails?inbox=$coder";
    $status = get_headers($coders)[0];
    $statuscode = substr($status, 9, 3);
    return $statuscode;
}

function emailData($emlz){
    $as = curl_init();
    curl_setopt($as, CURLOPT_URL, "https://cryptogmail.com/api/emails?inbox=$emlz");
    curl_setopt($as, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($as, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($as);
    curl_close($as);
    return $resp;
}


function LetterFilter($emlz1){
    $as1 = curl_init();
    curl_setopt($as1, CURLOPT_URL, "https://cryptogmail.com/api/emails/$emlz1");
    curl_setopt($as1, CURLOPT_CUSTOMREQUEST, 'GET');
    $header = [
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
    ];
    curl_setopt($as1, CURLOPT_HTTPHEADER, $header);
    curl_setopt($as1, CURLOPT_RETURNTRANSFER, true);
    $resp1 = curl_exec($as1);
    curl_close($as1);
    $filterized =  str_replace('<strong><a href="https://omegle2.net/" target="_blank">Omegle - Talk to strangers from around the world</strong></a>', "", "$resp1");
    return $filterized;
}
