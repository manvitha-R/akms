<?php
session_start();
$connection = mysqli_connect("localhost","root","","akms");


if(isset($_POST['del_multiple_data']))
{
   $all_id = $_POST['del_chk'];
   $seperate_all_id = implode(",",$all_id);

    $query = "DELETE FROM membership_type WHERE id In($seperate_all_id)";
    $query_run = mysqli_query($connection, $query);

    if($query_run)

    {
        $_SESSION['status'] = "Deleted id's are $seperate_all_id";
        $_SESSION['message'] = "Member Deleted Successfully";
        header("Location: mtype-index.php");
    }
    else
    {
        $_SESSION['message'] = "Member Not Deleted Successfully";
        header("Location: index1.php");

    }
    




}


if(isset($_POST['delete']))
{
   $all_id = $_POST['del_chk'];
   $seperate_all_id = implode(",",$all_id);

    $query = "DELETE FROM membership_form WHERE id In($seperate_all_id)";
    $query_run = mysqli_query($connection, $query);

    if($query_run)

    {
        $_SESSION['status'] = "Deleted id's are $seperate_all_id";
        $_SESSION['message'] = "Member Deleted Successfully";
        header("Location: index1.php");
    }
    else
    {
        $_SESSION['message'] = "Member Not Deleted Successfully";
        header("Location: index1.php");

    }
    




}

if(isset($_POST['deleting']))
{
   $all_id = $_POST['del_chk'];
   $seperate_all_id = implode(",",$all_id);

    $query = "DELETE FROM document WHERE id In($seperate_all_id)";
    $query_run = mysqli_query($connection, $query);

    if($query_run)

    {
        $_SESSION['status'] = "Deleted id's are $seperate_all_id";
        $_SESSION['message'] = "Document Deleted Successfully";
        header("Location: document-index.php");
    }
    else
    {
        $_SESSION['message'] = "Document Not Deleted Successfully";
        header("Location: document-index.php");

    }
    




}
?>