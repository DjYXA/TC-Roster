<?PHP
//Auth Database Connection Information
$authdb_host = "127.0.0.1";
$authdb_user = "root";
$authdb_pass = ""; 
$authdb_name = "auth";

//Character Database Connection Information
$chardb_host = "127.0.0.1";
$chardb_user = "root";
$chardb_pass = ""; 
$chardb_name = "characters";

//Realm Characters Column Display
$rc_column_guild        = "1";    //Guild
$rc_column_race         = "1";    //Race
$rc_column_class        = "1";    //Class
$rc_column_level        = "1";    //Level
$rc_column_online       = "1";    //Online
$rc_column_arenapts     = "1";    //Arena Points
$rc_column_totalhonor   = "1";    //Total Honor
$rc_column_todayhonor   = "1";    //Today Honor
$rc_column_yesthonor    = "1";    //Yesterday Honor
$rc_column_totalkills   = "1";    //Total Kills
$rc_column_todaykills   = "1";    //Today Kills
$rc_column_yestkills    = "1";    //Yesterday Kills
$rc_column_pvprank      = "1";    //PvP Rank

//Guild Characters Column Display
$gc_column_guild        = "0";    //Guild
$gc_column_race         = "1";    //Race
$gc_column_class        = "1";    //Class
$gc_column_level        = "1";    //Level
$gc_column_online       = "1";    //Online
$gc_column_arenapts     = "1";    //Arena Points
$gc_column_totalhonor   = "1";    //Total Honor
$gc_column_todayhonor   = "1";    //Today Honor
$gc_column_yesthonor    = "1";    //Yesterday Honor
$gc_column_totalkills   = "1";    //Total Kills
$gc_column_todaykills   = "1";    //Today Kills
$gc_column_yestkills    = "1";    //Yesterday Kills

//PvP Rank Configuration
$pvp_rank01 = "1";
$pvp_rank02 = "50";
$pvp_rank03 = "150";
$pvp_rank04 = "350";
$pvp_rank05 = "750";
$pvp_rank06 = "1200";
$pvp_rank07 = "2500";
$pvp_rank08 = "3500";
$pvp_rank09 = "4500";
$pvp_rank10 = "5500";
$pvp_rank11 = "6500";
$pvp_rank12 = "7500";
$pvp_rank13 = "8500";
$pvp_rank14 = "10000";

//Database Connects DO NOT EDIT!
$chardb_connect = mysql_connect($chardb_host,$chardb_user,$chardb_pass) OR DIE("Cant connect with $chardb_host");
$authdb_connect = mysql_connect($authdb_host,$authdb_user,$authdb_pass) OR DIE("Cant connect with $authdb_host");
?>