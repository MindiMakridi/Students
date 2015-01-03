<?php
function  getUserId(){
if(isset($_COOKIE['studentscookie']['name'])){
return $id = $_COOKIE['studentscookie']['name'];
}
return false;
}


?>