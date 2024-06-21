<?php
include_once "connect.php";
session_start();


function redirect($page)
{
    echo"<script>window.open('$page','_self');</script>";
}
function message($msg)
{
    echo"<script>alert('$msg');</script>";
}

function insertData($table,$data)
{
global $con;

$column=implode(",",array_keys($data));
$value=implode("','",array_values($data));
$sql="insert into $table($column)values('$value')";

$run=mysqli_query($con,$sql);

return $run;

}
function callingData($table,$cond=null)
{
    global $con;
    if($cond!=NULL)
    {
        $sql ="select * from $table where $cond";
    }
    else
    {
        $sql ="select * from $table";
    }
   
    $run=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($run))
    {
        $data[]=$row;
    }
    return $data;
}
//counting data
function countData($table,$cond=null)
{
    global $con;
    if($cond==null)
    {
        $sql="select * from $table";
    }
    else{
        $sql="select * from $table where $cond ";
    }
    
    $run=mysqli_query($con,$sql);
    $count=mysqli_num_rows($run);
    return $count;
}





function slugify($string) {
    // Convert string to lowercase
    $string = mb_strtolower($string, 'UTF-8');

    // Remove special characters, except alphanumeric and space
    $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);

    // Replace spaces with hyphens
    $string = str_replace(' ', '-', $string);

    // Replace consecutive hyphens with a single hyphen
    $string = preg_replace('/-+/', '-', $string);

    // Trim hyphens from the beginning and end of the string
    $string = trim($string, '-');

    return $string;
}



function protected_session($name,$redirect_page)
{
    if(!isset($_SESSION[$name]))
    {
        redirect("$redirect_page");
    }
}

function getUserInfo($table,$condition)
{
    global $con;
    $sql= "select * from $table where $condition";
    $run=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($run);
    return $row;
}

?>