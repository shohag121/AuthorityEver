<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once "inc/amazon/vendor/autoload.php";

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Lookup;

if(isset($_GET['asin'])){

    $asin = $_GET['asin'];
    if(empty($asin)){} else {


$conf = new GenericConfiguration();

        /** Loads the WordPress Environment and Template */
        define('WP_USE_THEMES', true);
        require ('../../../wp-load.php');

// getting user settings value
        $options = get_option( 'aevc_settings' );
        $country =  $options['aevc_select_country'];
        $access =  $options['aevc_access_key'];
        $secret =  $options['aevc_secret_key'];
        $associate =  $options['aevc_associate_tag'];

try {
    $conf
        ->setCountry($country)
        ->setAccessKey($access)
        ->setSecretKey($secret)
        ->setAssociateTag($associate);


} catch (\Exception $e) {
    echo $e->getMessage();
}
$apaiIO = new ApaiIO($conf);

$lookup = new Lookup();
$lookup->setItemId($asin);
$lookup->setResponseGroup(array('Large', 'Small'));

$formattedResponse = $apaiIO->runOperation($lookup);



$response = simplexml_load_string($formattedResponse);
$json = json_encode($response);

echo $json;
        }
}