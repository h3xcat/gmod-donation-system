<?php

//Database
define("DB_HOST", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
define("DB_DATABASE", "");

//Paypal
define("PAYPAL_CURRENCY", "USD");
define("PAYPAL_SANDBOX", true);
define("PAYPAL_ID", ""); // Your paypal email address aka id.
define("PAYPAL_ID_SANDBOX", "" ); // https://developer.paypal.com/webapps/developer/applications/accounts

//Steam API
define("STEAM_API", ""); // http://steamcommunity.com/dev/apikey

//Donation System URL
define("DONATE_URL", "http://example.com/donate/"); // Please don't forget that the url must start with http:// or https:// and end with slash(/), DO NOT INCLUDE index.php !!!


//Games
$GAMES = array(
	"gmod" => array(
		'name' => "Garry's mod",
		'icon' => "icons/gmod.png",
		'display' => true,
		'servers' => array("darkrp", "ttt")
	)
);

//Servers
$SERVERS = array(
	"darkrp" => array(
		'name' => "Example DarkRP",
		'icon' => "icons/gmod.png",
		'orderfile' => "order.php",
		'packages' => array(1,2,3)
	),
	"ttt" => array(
		'name' => "Example TTT",
		'icon' => "icons/gmod.png",
		'orderfile' => "order.php",
		'packages' => array(4,5,6,7)
	)
);

//Packages
$PACKAGES = array(
	1 => array(
		'title' => "VIP",
		'buytitle' => "DarkRP - VIP",
		'description' => "
			<b>Price: <b style=\"color:green;\">$10</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> VIP rank<br/>
			<b>2.</b> 40,000 ingame Cash<br/>
			<br/>
			<b style=\"color:green;\">This rank is valid for 30 days.</b>",
		'price' => 10,
		'execute' => array( 
			"darkrp" => array(
				'online' => array(
					0 => array(
						array("darkrp_money",40000),
						array("broadcast", array(255,0,0) ,"%name% has donated for VIP!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "darkrp"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "vip-donator")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	2 => array(
		'title' => "Admin",
		'buytitle' => "DarkRP - Admin",
		'description' => "
			<b>Price: <b style=\"color:green;\">$25</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> Admin rank<br/>
			<b>2.</b> 100,000 ingame cash<br/>
			<br/>
			<b style=\"color:red;\">This rank is valid for 30 days and if abused it will be taken away.</b>",
		'price' => 25,
		'execute' => array( 
			"darkrp" => array(
				'online' => array(
					0 => array(
						array("darkrp_money",100000),
						array("broadcast", array(255,0,0) ,"%name% has donated for Admin!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "darkrp"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "admin-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	3 => array(
		'title' => "Mod",
		'buytitle' => "DarkRP - Mod",
		'description' => "
			<b>Price: <b style=\"color:green;\">$15</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> Mod rank<br/>
			<b>2.</b> 65,000 ingame cash<br/>
			<br/>
			<b style=\"color:red;\">This rank is valid for 30 days and if abused it will be taken away.</b>",
		'price' => 15,
		'execute' => array( 
			"darkrp" => array(
				'online' => array(
					0 => array(
						array("darkrp_money",65000),
						array("broadcast", array(255,0,0) ,"%name% has donated for Mod!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "darkrp"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "mod-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	4 => array(
		'title' => "VIP",
		'buytitle' => "TTT - VIP",
		'description' => "
			<b>Price: <b style=\"color:green;\">$10</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> VIP rank<br/>
			<b>2.</b> 10000 PointShop Points<br/>
			<br/>
			<b style=\"color:green;\">This rank is valid for 30 days.</b>",
		'price' => 10,
		'execute' => array( 
			"ttt" => array(
				'online' => array(
					0 => array(
						array("pointshop_points",10000),
						array("broadcast", array(255,0,0) ,"%name% has donated for VIP!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "ttt"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "vip-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	5 => array(
		'title' => "Admin",
		'buytitle' => "TTT - Admin",
		'description' => "
			<b>Price: <b style=\"color:green;\">$25</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> Admin rank<br/>
			<b>2.</b> 35000 PointShop Points<br/>
			<br/>
			<b style=\"color:red;\">This rank is valid for 30 days and if abused it will be taken away.</b>",
		'price' => 25,
		'execute' => array( 
			"ttt" => array(
				'online' => array(
					0 => array(
						array("pointshop_points",35000),
						array("broadcast", array(255,0,0) ,"%name% has donated for Admin!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "ttt"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "admin-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	6 => array(
		'title' => "Mod",
		'buytitle' => "TTT - Mod",
		'description' => "
			<b>Price: <b style=\"color:green;\">$15</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> Mod rank<br/>
			<b>2.</b> 25000 PointShop Points<br/>
			<br/>
			<b style=\"color:red;\">This rank is valid for 30 days and if abused it will be taken away.</b>",
		'price' => 15,
		'execute' => array( 
			"ttt" => array(
				'online' => array(
					0 => array(
						array("pointshop_points",25000),
						array("broadcast", array(255,0,0) ,"%name% has donated for Mod!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "ttt"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "mod-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	),
	7 => array(
		'title' => "Mod",
		'buytitle' => "TTT - Mod",
		'description' => "
			<b>Price: <b style=\"color:green;\">$15</b></b>
			</br>
			<b>Features:</b><br/>
			<b>1.</b> Mod rank<br/>
			<b>2.</b> 25000 PointShop Points<br/>
			<br/>
			<b style=\"color:red;\">This rank is valid for 30 days and if abused it will be taken away.</b>",
		'price' => 15,
		'execute' => array( 
			"ttt" => array(
				'online' => array(
					0 => array(
						array("pointshop_points",25000),
						array("broadcast", array(255,0,0) ,"%name% has donated for Mod!" )
					)
				),
				'offline' => array(
					0 => array(
						array("cancel", true, "ttt"),
						array("sv_cmd","ulx", "adduserid", "%steamid%", "mod-donator")
					),
					86400*30 => array(
						array("sv_cmd","ulx", "removeuserid", "%steamid%")
					)
				)
			)
		),
		'checkout' => "source.php"
	)
);

// Advanced
function price($pid, $playerid){
	global $PACKAGES;
	return $PACKAGES[$pid]['price']; // What price should user pay
}
function ipnPriceValidation($pid, $playerid, $price){
	global $PACKAGES;
	return $PACKAGES[$pid]["price"] == $price; // Check if price valid after payment was done.
}

// !!!!! IGNORE !!!!!
if(PAYPAL_SANDBOX){
	define("PAYPAL_URL", "https://www.sandbox.paypal.com/cgi-bin/webscr" );
}else{
	define("PAYPAL_URL", "https://www.paypal.com/cgi-bin/webscr" );
}

