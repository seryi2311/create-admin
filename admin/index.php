<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include '../dbconnect.php';

function showPage($link, $info ='')
{
    $query = "SELECT id, title, url FROM pages WHERE url!='404'";
    $result = mysqli_query($link, $query);
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;
    $content = "<table>
                    <tr>
                        <th>title</th>
                        <th>url</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>";
    foreach ($data as $elem) {
        $content .= "<tr> 
                        <td>{$elem['title']} </td> 
                        <td>{$elem['url']}</td> 
                        <td><a href=\"\">Edit</a></td> 
                        <td><a href=\"?delete={$elem['id']}\">Delete</a></td> 
                    </tr>";
    }
    $content .= '</table>';
    $title = 'admin';
    include 'layout.php';
}

function deletePage($link){

    if(isset($_GET['delete']) and $_GET['delete']!= 1){
        $del = $_GET['delete'];
        $query = "DELETE FROM pages WHERE id = '$del'";
        $result =  mysqli_query($link,$query);
        $_SESSION['info'] = [
                'text'=>'Page delete successfully',
                'status'=>'success'
        ];
        header('Location: /admin/');
    }elseif(isset($_GET['delete']) and $_GET['delete']== 1){
        $_SESSION['info'] = [
                'text'=>'index not real delete',
                'status'=>'error'
            ];
        header('Location: /admin/');
    }
    if(isset($_SESSION['info'])){
        return $_SESSION['info'];
    }else{
        return ['text'=>'You can edit page', 'status'=>'new'];
    }
}
$info = deletePage($link);
showPage($link, $info);
