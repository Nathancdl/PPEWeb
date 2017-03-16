<?php 

	require_once("models/connect.php");

	if(isset($_GET["page"]))
	{
		if (file_exists("controllers/".$_GET["page"].".php"))
		{
			if (isset($_SESSION["salarie"]) && !empty($_SESSION["salarie"]))
			{
				
				if ($_GET["page"] == "pageprincipale" && $_SESSION["salarie"]["statut"] == "chef")
				{
					$_GET['page'] = "pageprincipalechef";
				}
                else if ($_GET["page"] == "pageprincipale" && $_SESSION["salarie"]["statut"] == "presta")
				{
					$_GET['page'] = "pageprincipalepresta";
				}
                 else if ($_GET["page"] == "pageprincipale" && $_SESSION["salarie"]["statut"] == "admin")
				{
					$_GET['page'] = "pageprincipaleadmin";
				}
                
				else if ($_GET["page"] == "pageprincipale" && $_SESSION["salarie"]["statut"] == "nonChef")
				{
					$_GET['page'] = $_GET["page"];
				}
				else if ($_GET["page"] == "pageprincipalechef" )
				{
					$_GET['page'] = "404";
				}
				else if ($_GET["page"] == "monequipe" && $_SESSION["salarie"]["statut"] == "nonChef"  )
				{
					$_GET['page'] = "404";
				}
                
				else if($_GET["page"] == "ajoutermembre" && $_SESSION["salarie"]["statut"] == "nonChef")
				{
					$_GET['page'] = "404";
				}
				else
				{
					$_GET['page'] = $_GET["page"];
				}
			}
			else
			{
				$erreur = "Vous devez être connecté pour voir cette page";
				$_GET['page'] = "identification";
			}
			
		}
		
		else
		{
			$_GET['page'] = "404";
		}
	}
	elseif (isset($_SESSION["salarie"]) && !empty($_SESSION["salarie"]))
			{
				
				if ($_SESSION["salarie"]["statut"] == "chef")
				{
					$_GET['page'] = "pageprincipalechef";
				}
				else if($_SESSION["salarie"]["statut"] == "nonChef")
				{
					$_GET['page'] = "pageprincipale";
                }
				else
				{
					$_GET['page'] = "identification";
				}
    }
    else
	{
		$_GET['page'] = "identification";
	}


ob_start();
	include "controllers/".$_GET['page'].".php";
	$contenu = ob_get_contents();
ob_end_clean();	

if($_GET['page'] != "identification") 
{require "views/layout.php";}
else{require "views/layoutb.php";}



?>