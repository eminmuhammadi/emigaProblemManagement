<?php

    // setup the URL, the JavaScript and the form data
    $url = 'https://javascript-minifier.com/raw';
    $js = file_get_contents('http://10.0.0.254/static/pack/vendors/js/vendor.bundle.addons.js');
    $data = array(
        'input' => $js,
    );

    // init the request, set some info, send it and finally close it
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $minified = curl_exec($ch);

    curl_close($ch);

    // output the $minified
    echo $minified;
?>