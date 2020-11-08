<?php
function selectPage($page){
    global $link;
    $query = "SELECT * FROM pages WHERE url = '$page'";
    $result = mysqli_query($link, $query);
    return mysqli_fetch_assoc($result);
}

function getForm(){
    if(isset($_POST['addNote'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
    }else{
        $title = '';
        $url = '';
        $text = '';
    }

    return
        '<form action="" method="post">
            <input name="title" placeholder="enter title" value="'.$title.'"> <br><br>
            <input name="url" placeholder="enter url" value="'.$url.'"><br><br>
            <textarea name="text" placeholder="enter text">'.$text.'</textarea><br><br>
            <input type="submit" value="Enter" name="addNote">
        </form>';
}

function addPage($link){
    $info = [
        'text'=>'You can add a new page',
        'status'=>'new'
    ];
    if(isset($_POST['addNote'])){
        $title =$_POST['title'];
        $url =$_POST['url'];
        $text =$_POST['text'];

        $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
        $result = mysqli_query($link, $query);
        $isPage = mysqli_fetch_assoc($result)['count'];

        if($isPage==0) {
            $query = "INSERT INTO pages (title, url, text) VALUES ('$title', '$url', '$text')";
            $result = mysqli_query($link, $query);
            $info = [
                'text'=>'Page add successfully',
                'status'=>'success'
            ];
        }else{
            $info = [
                'text'=>'The page with the current URL exists',
                'status'=>'error'
            ];
        }

    }
    return $info;
}