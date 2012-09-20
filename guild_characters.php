<?php
include ("includes/config.php");
mysql_select_db($chardb_name, $chardb_connect) or die(mysql_error());
$var_guildid = (isset($_GET['guild_id'])) ? $_GET['guild_id'] : '';
//Sorting
$order = (isset($_GET['order'])) ? $_GET['order'] : 'char_name';
$sorting = (isset($_GET['sorting'])) ? $_GET['sorting'] : 'desc';
switch($sorting) {
    case "asc":
    $sort = 'desc';
break;
    case "desc":
    $sort = 'asc';
break;}

//Query
$query = "SELECT characters.name AS char_name, characters.race AS char_race, characters.gender AS char_gender, characters.class AS char_class, characters.level AS char_level, characters.online AS char_online, characters.arenaPoints AS char_arenapts, characters.totalHonorPoints AS char_totalhonor, characters.todayHonorPoints AS char_todayhonor, characters.yesterdayHonorPoints AS char_yesthonor, characters.totalKills AS char_totalkills, characters.todayKills AS char_todaykills, characters.yesterdayKills AS char_yestkills, guild.name AS guild_name, guild.guildid AS guild_id FROM characters AS characters LEFT JOIN guild_member AS guild_member ON guild_member.guid = characters.guid LEFT JOIN guild AS guild ON guild.guildid = guild_member.guildid WHERE guild_member.guid = characters.guid AND guild_member.guildid = $var_guildid ORDER BY $order"." $sort";

//Query Result
$result = mysql_query($query) or die(mysql_error());

//Table Header
echo "<head>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "<title>Realm Character Stats</title>";
echo "<link href='css/style.css' rel='stylesheet' type='text/css' />";
echo "</head>";
echo "<table align=center cellpadding='1' cellspacing='1'  border='1' bordercolor='#000000'>";
echo "<tr>";
echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_name&sorting=",$sort,"'><img src='images/base/character.png' border='0'/></a></td>";
if($gc_column_guild == 1){
    echo "<td background='images/base/cell.png''><a href='guild_characters.php?guild_id=",$var_guildid,"&order=guild_name&sorting=",$sort,"'><center><img src='images/base/guild.png' border='0'/></center></a></td>";}
if($gc_column_race == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_race&sorting=",$sort,"'><center><img src='images/base/race.png' border='0'/></center></a></td>";}
if($gc_column_class == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_class&sorting=",$sort,"'><center><img src='images/base/class.png' border='0'/></center></a></td>";}
if($gc_column_level == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_level&sorting=",$sort,"'><center><img src='images/base/level.png' border='0'/></center></a></td>";}
if($gc_column_online == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_online&sorting=",$sort,"'><center><img src='images/base/online.png' border='0'/></center></a></td>";}
if($gc_column_arenapts == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_arenapts&sorting=",$sort,"'><center><img src='images/base/arenapoints.png' border='0'/></center></a></td>";}
if($gc_column_totalhonor == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_totalhonor&sorting=",$sort,"'><center><img src='images/base/honorpoints.png' border='0'/></center></a></td>";}
if($gc_column_todayhonor == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_todayhonor&sorting=",$sort,"'><center><img src='images/base/todayhonor.png' border='0'/></center></a></td>";}
if($gc_column_yesthonor == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_yesthonor&sorting=",$sort,"'><center><img src='images/base/yesterdayhonor.png' border='0'/></center></a></td>";}
if($gc_column_totalkills == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_totalkills&sorting=",$sort,"'><center><img src='images/base/totalkills.png' border='0'/></center></a></td>";}
if($gc_column_todaykills == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_todaykills&sorting=",$sort,"'><center><img src='images/base/todaykills.png' border='0'/></center></a></td>";}
if($gc_column_yestkills == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_yestkills&sorting=",$sort,"'><center><img src='images/base/yesterdaykills.png' border='0'/></center></a></td>";}
if($gc_column_pvprank == 1){
    echo "<td background='images/base/cell.png'><a href='guild_characters.php?guild_id=",$var_guildid,"&order=char_totalkills&sorting=",$sort,"'><center><img src='images/base/pvprank.png' border='0'/></center></a></td>";}
echo "</tr>";

//Query Data
while($row = mysql_fetch_object($result)){
    $char_name       =    $row->char_name;
    $char_race       =    $row->char_race;
    $char_gender     =    $row->char_gender;
    $char_class      =    $row->char_class;
    $char_level      =    $row->char_level;
    $char_online     =    $row->char_online;
    $char_arenapts   =    $row->char_arenapts;
    $char_honorpts   =    $row->char_totalhonor;
    $char_todayhonor =    $row->char_todayhonor;
    $char_yesthonor  =    $row->char_yesthonor;
    $char_totalkills =    $row->char_totalkills;
    $char_todaykills =    $row->char_todaykills;
	$char_yestkills  =    $row->char_yestkills;
    $guild_name      =    $row->guild_name;
    $guild_id        =    $row->guild_id;
//For Offset Row Colors
$colors = $i++ % 2 ? 'class="even"' : '';
echo "<?php $i = 0; ?>";

//Table Rows
echo "<tr ",$colors,">";

////Character Name
if($char_class == 1){
    echo "<td><font color=#C79C6E>",$char_name,"</font></td>";}
if($char_class == 2){
    echo "<td><font color=#F58CBA>",$char_name,"</font></td>";}
if($char_class == 3){
    echo "<td><font color=#ABD473>",$char_name,"</font></td>";}
if($char_class == 4){
    echo "<td><font color=#FFF569>",$char_name,"</font></td>";}
if($char_class == 5){
    echo "<td><font color=#FFFFFF>",$char_name,"</font></td>";}
if($char_class == 6){
    echo "<td><font color=#C41F3B>",$char_name,"</font></td>";}
if($char_class == 7){
    echo "<td><font color=#0070DE>",$char_name,"</font></td>";}
if($char_class == 8){
    echo "<td><font color=#69CCF0>",$char_name,"</font></td>";}
if($char_class == 9){
    echo "<td><font color=#9482C9>",$char_name,"</font></td>";}
if($char_class == 11){
    echo "<td><font color=#FF7D0A>",$char_name,"</font></td>";}

////Guild Name
if($gc_column_guild == 1){
    echo "<td><center><font color=#FFFFFF>",$guild_name,"</font></center></td>";}

////Character Race
if($gc_column_race == 1){
    echo "<td><center><img src='images/race/small/" . $char_race . "-" . $char_gender . ".gif'></center></td>";}

////Character Class
if($gc_column_class == 1){
    echo "<td><center><img src='images/class/small/" . $char_class . ".gif'></center></td>";}

////Character Level
if($gc_column_level == 1){
    echo "<td><center><font color=#FFFFFF>",$char_level,"</font></center></td>";}

////Character Online
if($char_online == 0 && $gc_column_online == 1){
    echo "<td><center><img src='images/base/ofl_button.png'></center></td>";} 
if($char_online == 1 && $gc_column_online == 1){
    echo "<td><center><img src='images/base/onl_button.png'></center></td>";}

////Character Arena Points
if($gc_column_arenapts == 1){
    echo "<td><center><font color=#FFFFFF>",$char_arenapts,"</font></center></td>";}

////Character Total Honor Points
if($gc_column_totalhonor == 1){
    echo "<td><center><font color=#FFFFFF>",$char_honorpts,"</font></center></td>";}

////Character Today Honor Points
if($gc_column_todayhonor == 1){
    echo "<td><center><font color=#FFFFFF>",$char_todayhonor,"</font></center></td>";}

////Character Yesterday Honor Points
if($gc_column_yesthonor == 1){
    echo "<td><center><font color=#FFFFFF>",$char_yesthonor,"</font></center></td>";}

////Character Total Kills
if($gc_column_totalkills == 1){
    echo "<td><center><font color=#FFFFFF>",$char_totalkills,"</font></center></td>";}

////Character Today Kills
if($gc_column_todaykills == 1){
    echo "<td><center><font color=#FFFFFF>",$char_todaykills,"</font></center></td>";}

////Character Yesterday Kills
if($gc_column_yestkills == 1){
    echo "<td><center><font color=#FFFFFF>",$char_yestkills,"</font></center></td>";}

//PvP Rank Column
if($char_totalkills >= $pvp_rank14 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank14.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank13 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank13.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank12 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank12.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank11 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank11.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank10 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank10.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank09 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank09.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank08 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank08.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank07 && $gc_column_pvprank == 1) {
    echo " <td<center>><img src='images/pvprank/pvprank07.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank06 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank06.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank05 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank05.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank04 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank04.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank03 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank03.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank02 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank02.png'></center></td>";}
        else {
if($char_totalkills >= $pvp_rank01 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/pvprank01.png'></center></td>";}
        else {
if($char_totalkills < $pvp_rank01 && $gc_column_pvprank == 1) {
    echo " <td><center><img src='images/pvprank/norank.png'></center></td>";}
	}}}}}}}}}}}}}}
echo "</tr>";}
?>