<?php

namespace app\core;
require_once "../vendor/autoload.php";

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class Utils
{
    public static function generateQRcode($text,$path){

        $writer = new PngWriter();

// Create QR code
        $qrCode = new QrCode(
            data: $text,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

// Create generic logo
        $logo = new Logo(
            path: $path.'/Logomain.png',
            resizeToWidth: 50,
            punchoutBackground: true
        );

// Create generic label
        $label = new Label(
            text: 'ELBARAKAH Member',
            textColor: new Color(255, 0, 0)
        );

        $result = $writer->write($qrCode, $logo, $label);

// Validate the result
//$writer->validateResult($result, 'Life is too short to be generating QR codes');


// Directly output the QR code
       // header('Content-Type: '.$result->getMimeType());
       // echo $result->getString();

// Save it to a file
        $result->saveToFile($path.'/qrcode.png');


// Generate a data URI to include image data inline (i.e. inside an <img> tag)
      //  $dataUri = $result->getDataUri();

    }

}