<?php
// Enable errors, for debugging
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

/* ************************************
    START OF EDIT SECTION
************************************ */
/* $server = "localhost";
$username = "rs_user";
$password = "99kt001cd";
$dbname = "rs_db";
$count = 4;
$maxNicknameLength = 15;
$ignoreGroupIDs = ["3057", "3299"]; */

$query_name = "ts3banner";
$query_password = "rsfR4CZb"; 
$query_ip = "ts.hayn.me";
$query_port = "10011";
$query_server_port = "9987";

$imageDir = "./image/";
$fontDir = './font/';
$imageFile = "banner.png";

$ts3Placeholders = [
    "%fullDate%" => "fullDate", 
    "%nickname%" => "nickname", 
    "%topDataNames%" => "topDataNames", 
    "%topDataTimes%" => "topDataTimes",
    "%clientVersion%" => "clientVersion",
    "%online%" => "online",
    "%max%" => "max",
    "%admins%" => "admins",
    "%supporters%" => "supporters",
    "%system%" => "system",
    "%ping%" => "ping", 
    "%packetloss%" => "packetloss",
    "%serverVersion%" => "serverVersion"
    //"%rank1%, %rankX%
];

$adminGroups = ["9"];
$supportGroups = ["9"];

$config = array(
    0 => array(
        "text" => "%nickname% !",
        "x" => 120,
        "y" => 27,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 192,
        "colorG" => 26,
        "colorB" => 32
    ),    
    1 => array(
        "text" => "%fullDate%",
        "x" => 900,
        "y" => 27,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ), 
    2 => array(
        "text" => "%rank1%",
        "x" => 787,
        "y" => 92,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 151,
        "colorG" => 117,
        "colorB" => 69
    ),    
    3 => array(
        "text" => "%rank2%",
        "x" => 787,
        "y" => 150,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 163,
        "colorG" => 161,
        "colorB" => 159
    ),    
    4 => array(
        "text" => "%rank3%",
        "x" => 787,
        "y" => 207,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 205,
        "colorG" => 127,
        "colorB" => 50
    ),    
    5 => array(
        "text" => "%rank4%",
        "x" => 787,
        "y" => 265,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 183,
        "colorG" => 151,
        "colorB" => 52
    ),  
    6 => array(
        "text" => "%online%/%max%",
        "x" => 100,
        "y" => 112,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),
    7 => array(
        "text" => "%admins%",
        "x" => 350,
        "y" => 112,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),   
    8 => array(
        "text" => "%supporters%",
        "x" => 550,
        "y" => 112,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),
    9 => array(
        "text" => "%serverVersion%",
        "x" => 100,
        "y" => 237,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),
    10 => array(
        "text" => "%system%",
        "x" => 330,
        "y" => 237,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),   
    11 => array(
        "text" => "%clientVersion%",
        "x" => 545,
        "y" => 237,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),
    12 => array(
        "text" => "%ping% ms",
        "x" => 230,
        "y" => 170,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    ),   
    13 => array(
        "text" => "%packetloss%",
        "x" => 460,
        "y" => 170,
        "angle" => 0,
        "font" => "BebasNeue-Regular.ttf",
        "size" => 15,
        "colorR" => 255,
        "colorG" => 255,
        "colorB" => 255
    )
);
/* ************************************ 
    END OF EDIT SECTION
************************************ */


/* ************************************ 
    START OF LOADING STUFF
************************************ */
// load framework files
require_once("./ts3phpframework/lib/TeamSpeak3/TeamSpeak3.php");
TeamSpeak3::init();

// Load caching library
use Phpfastcache\CacheManager;
require __DIR__ . '/phpfastcache/vendor/autoload.php';

$ip = getIp();
/* ************************************ 
    END OF LOADING STUFF
************************************ */


/* ************************************ 
    START OF TS3 STUFF
************************************ */
$InstanceCache = CacheManager::getInstance('files');

$key = "ts3data";

$ts3DataCached = $InstanceCache->getItem($key);
$ts3Data;

if(is_null($ts3DataCached->get()))
{     
    try
    {
        // IPv4 connection URI
        $uri = "serverquery://".$query_name.":". $query_password. "@".$query_ip.":".$query_port."/?server_port=".$query_server_port;

        // connect to above specified server, authenticate and spawn an object for the virtual server on port 9987
        $ts3_VirtualServer = TeamSpeak3::factory($uri);

        // Clients stuff
        $ts3_Clients = $ts3_VirtualServer->clientList();
        $ts3_Clients = array_filter($ts3_Clients, "filterQuery");
        $ts3_Client = getClient($ts3_Clients);
        $ts3_Admins = getAdminsCount($ts3_Clients);
        $ts3_Supports = getSupportsCount($ts3_Clients);
        $ts3_ClientsCount = count($ts3_Clients);
        //$ts3_Nickname = $ts3_Client["client_nickname"];
        //$ts3_ClientVersion = explode(" ", $ts3_Client["client_version"])[0];

        // Server stuff
        $ts3_ServerInfo = $ts3_VirtualServer->getInfo();
        $ts3_Ping = floor($ts3_ServerInfo["virtualserver_total_ping"]->__toString());
        $ts3_Version = explode(" ", $ts3_ServerInfo["virtualserver_version"])[0];
        $ts3_Loss = $ts3_ServerInfo["virtualserver_total_packetloss_total"]->__toString() * 100 . "%";
        $ts3_System = $ts3_ServerInfo["virtualserver_platform"];
        $ts3_MaxClients = $ts3_ServerInfo["virtualserver_maxclients"];
    } catch(TeamSpeak3_Exception $e)
    {
        // Print the error message returned by the server
        echo "Error " . $e->getCode() . ": " . $e->getMessage();
    }

    $topData = getTopData($count);

    $data = array(
	"clients" => $ts3_Clients,
        "online" => $ts3_ClientsCount,
        "max" => $ts3_MaxClients,
        "admins" => $ts3_Admins,
        "supporters" => $ts3_Supports,
        "system" => $ts3_System,
        "ping" => $ts3_Ping,
        "packetloss" => $ts3_Loss,
        "serverVersion" => $ts3_Version,
        "topData" => $topData,
        "topDataNames" => formatTopData($topData, "names"),
        "topDataTimes" => formatTopData($topData, "times")
    );

    $ts3DataCached->set($data)->expiresAfter(60);
    $InstanceCache->save($ts3DataCached);

    $ts3Data = $data;
} else {
    $ts3Data = $ts3DataCached->get();
}

/* ************************************ 
    END OF TS3 STUFF
************************************ */


/* ************************************ 
    START OF IMAGE STUFF
************************************ */
// set the header type to an image 
header('Content-type: image/png');
$image = imagecreatefrompng($imageDir . $imageFile);

function loadConfig()
{
    global $image, $fontDir, $config;

    $config = array_values($config);

    foreach($config as $entry)
    {
        $color = imagecolorallocate($image, $entry["colorR"], $entry["colorG"], $entry["colorB"]); // Create color

        imagettftext($image, $entry["size"], $entry["angle"], $entry["x"], $entry["y"], $color, $fontDir . $entry["font"], tsPlaceholder($entry["text"]));
    }
}

loadConfig();

function tsPlaceholder($text)
{
    global $ts3Placeholders, $ts3Data;
    
    foreach($ts3Placeholders as $pholder=>$name)
    {
        if(isset($ts3Data[$name])) // Every placeholder except specific ranks
            $text = str_replace($pholder, $ts3Data[$name], $text);
    }

    // Date replace
    $text = str_replace("%fullDate%", getFullDate(), $text);

    $client = getClient($ts3Data["clients"]);
    // Nick replace
    $text = str_replace("%nickname%", htmlspecialchars($client["client_nickname"]), $text);
    // Client V replace
    $text = str_replace("%clientVersion%", explode(" ", $client["client_version"])[0], $text);

    //Specifc ranks replace
    $text = preg_replace_callback('/%rank\d+%/i',
        function ($matches) {
            return getSpecificRank($matches);
        },
        $text
    );

    return $text;
}

// echo the image
imagepng($image);

// clear cache
imagedestroy($image);
/* ************************************ 
    END OF IMAGE STUFF
************************************ */


/* ************************************ 
    START OF OTHER STUFF
************************************ */
function getIp() {
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        return $_SERVER['REMOTE_ADDR'];
    else
        return NULL;
}

function filterQuery($client)
{
    if (empty($client["client_type"]))
        return true;
    else
        return false;
}

function getClient($clients)
{
    global $ip;
    $foundClient = false;

    foreach($clients as $client)
    {
        if($foundClient == false && $client["connection_client_ip"] == $ip)
        {
            $foundClient = $client;
        }
    }
    return $foundClient;
}

function getAdminsCount($clients)
{
    $admins = 0;

    foreach($clients as $client)
    {
        $serverGroups = explode(",", $client["client_servergroups"]);
        $has = false;

        foreach($GLOBALS["adminGroups"] as $groupID)
        {
            if($has == false && in_array($groupID, $serverGroups))
                $has = true;
        }

        if($has)
            $admins++;
    }

    return $admins;
}

function getSupportsCount($clients)
{
    $supports = 0;

    foreach($clients as $client)
    {
        $serverGroups = explode(",", $client["client_servergroups"]);
        $has = false;

        foreach($GLOBALS["supportGroups"] as $groupID)
        {
            if($has == false && in_array($groupID, $serverGroups))
                $has = true;
        }

        if($has)
            $supports++;
    }

    return $supports;
}

function getTopData($count)
{    
    global $server, $username, $password, $dbname;

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        return false; // die("Connection failed: " . $conn->connect_error);
    }

    //echo "Connected successfully";

    $topData = Array();

    $sql = "SELECT name, cldgroup, count, idle, (count-idle) AS activeTime FROM user ORDER BY activeTime DESC;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
	   $groups = explode(",", $row["cldgroup"]);
	   $in = false;
	   global $ignoreGroupIDs;

	   foreach($ignoreGroupIDs as $gID)
	   {
    		if($in == false && in_array($gID, $groups))
		  $in = true;
	   }

           if($in == false)
             $topData[$row["name"]] = $row["count"] - $row["idle"];
        }
    } else {
        $topData = false;
    }

    $conn->close();

    if($topData) $topData = array_slice($topData, 0, $count);

    return $topData;
}

function formatTopData($topData, $type)
{
    if($topData == false)
        return "";

    $topDataStr = "";

    foreach($topData as $user=>$onTime)
    {
        if($type == "names")
            $topDataStr .= $user . "\n\n";
        else
        {
            $days = floor((int)$onTime / 86400);
            $hours = floor((int)$onTime % 86400 / 3600);
            $topDataStr .= $days . "d " . $hours . "h" . "\n\n";
        }
    }
    
    return $topDataStr;
}

function getSpecificRank($rank)
{
    global $ts3Data, $maxNicknameLength;

    if(empty($ts3Data["topData"]))
        return "";

    $rank = preg_replace("/[^0-9]/", "", $rank[0]);

    $topData = $ts3Data["topData"];

    $i = 1;
    $equals = false;

    foreach($topData as $user=>$onTime)
    {
        if($equals == false && $rank == $i)
        {
            $equals == true;
            $days = floor((int)$onTime / 86400);
            $hours = floor((int)$onTime % 86400 / 3600);
            $onTime = $days . " Nap " . $hours . " Óra";
            return substr($user, 0, $maxNicknameLength) . "  " . $onTime;
        }

        $i++;
    }
    
    return "";
}

function getFullDate()
{
    return date("H:i Y/m/d");
}
/* ************************************ 
    END OF OTHER STUFF
************************************ */
?>