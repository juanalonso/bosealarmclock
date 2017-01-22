<?php

  $boseIP = "192.168.1.17";

  setVolume(0);
  setPreset(1);
  usleep (1000000);
  setStop();
  setShuffle();
  setNextTrack();
  for ($f=1;$f<20;$f++) {
    usleep (5000000);
    setVolume($f);    
  }


  function setVolume($vol) {

    if(!is_int($vol)) {
      return;
    }

    if($vol<0 || $vol>100) {
      return;
    }

    $xml = "<volume>$vol<volume>";
    curlPOST("volume", $xml);

  }


  function setPreset($pre) {

    if(!is_int($pre)) {
      return;
    }

    if($pre<1 || $pre>6) {
      return;
    }

    keyPress("PRESET_$pre");

  }


  function setShuffle() {
    keyPress("SHUFFLE_ON");
  }


  function setNextTrack() {
    keyPress("NEXT_TRACK");
  }  


  function setStop() {
    keyPress("STOP");
  }


  function keyPress($key, $sleep=100000) {

    $xml = "<key state=\"press\" sender=\"Gabbo\">$key</key>";
    curlPOST("key", $xml);

    usleep ($sleep);

    $xml = "<key state=\"release\" sender=\"Gabbo\">$key</key>";
    curlPOST("key", $xml);

  }


  function curlPOST($method, $xml) {

    global $boseIP;

    echo "$xml\n";
    
    $ch = curl_init("http://$boseIP:8090/$method");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    $response = curl_exec($ch);
    curl_close($ch);

  }