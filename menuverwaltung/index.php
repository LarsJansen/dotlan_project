<?php
error_reporting(E_ALL);
// hier immer der in den Bereichen verwendete name angeben, damit das System wei�� um welches Modul es geht :-D
$MODUL_NAME = "MenuVerwaltung";

// globale Dotlan eigene Funktionen laden,,,,,, sonst wird nichts dargestellt und die DB kann nicht angsprochen werden.
// normal macht Dotlan selber einen DB aufruf %DB->qery $DB->result ......,,....,....
// ist aber ab und an zu umst�ndlich  da nict ale abfragem�glichjkeiten gegeben sind.  einfach per mysql_query, mysql_fetch_array, .... arbeiten und alles geht.
include_once("../../../global.php");

// Projekt�bergreifende Funktionen Beinhaltet z.B. das auslesen der Rechte, globel doe $event_id
include("../functions.php");

// Allgemeine Funktionen die nur das projekt betreffen
//include("functions.php");


// seitentietel wird im Tab des Browsers angezeigt
$PAGE->sitetitle = $PAGE->htmltitle = _(ucfirst($MODUL_NAME));
include("header.php");

//$filehandler = fopen("./index.html", "r");
$filename = "./index.html";
if(file_exists($filename))
{
	$handle = fopen($filename,"r");
	if($handle)
	{
		
		while(($buffer = fgets($handle,4096)) !== false)
		{
			$output.= $buffer;
		}
		if(!feof($handle)) {
			$output.= "<h1>Fehler unerwartete fgets()</h1>";
		}
		fclose($handle);
	}
}
$PAGE->render($output);

