<?php
function selectPage($page){
    global $link;
    $query = "SELECT * FROM pages WHERE url = '$page'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    return mysqli_fetch_assoc($result);
}

function isUrl($url){
    global $link;
    $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $isPage = mysqli_fetch_assoc($result)['count'];
    return $isPage;
}
function getForm($page=0,$flag = true){
    if(isset($_POST['addNote'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
    }elseif ($page!=0){
        $title = $page['title'];
        $url = $page['url'];
        $text = $page['text'];
    }
    else{
        $title = '';
        $url = '';
        $text = '';
    }
    if($page==null and $flag==false){
        return '<p class="error">page not found</p>';
    } else {
        return
            '<form action="" method="post">
                title:<br>
                <input name="title" placeholder="enter title" value="' . $title . '"> <br><br>
                url:<br>
                <input name="url" placeholder="enter url" value="' . $url . '"><br><br>
                text:<br>
                <textarea name="text" placeholder="enter text">' . $text . '</textarea><br><br>
                <input type="submit" value="Enter" name="addNote">
            </form>';
    }
}

function addPage($link){
    $info = [
        'text'=>'You can add a new page',
        'status'=>'new'
    ];
    if(isset($_POST['addNote'])){
        $title = mysqli_real_escape_string($link,$_POST['title']);
        $url = mysqli_real_escape_string($link,$_POST['url']);
        $text = mysqli_real_escape_string($link,$_POST['text']);

        $isPage = isUrl($url);

        if($isPage==0) {
            $query = "INSERT INTO pages (title, url, text) VALUES ('$title', '$url', '$text')";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
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

function getEditPage($link){
    $id = $_GET['edit'];
    $query = "SELECT * FROM pages WHERE id ='$id' ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);
    return $page;
}

function editPage($link){
    if(isset($_POST['addNote']) and isset($_GET['edit'])) {
        $title = mysqli_real_escape_string($link,$_POST['title']);
        $url = mysqli_real_escape_string($link,$_POST['url']);
        $text = mysqli_real_escape_string($link,$_POST['text']);
        $id = $_GET['edit'];


        $query = "SELECT * FROM pages WHERE id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result);
        if($page!=$url){
            $isPage = isUrl($url);
            if($isPage==1){
                $_SESSION['info'] = [
                    'text'=>'The page with the current URL exists',
                    'status'=>'error'
                ];
            }else{
                $query = "UPDATE pages SET title = '$title', url = '$url', text = '$text' WHERE id = '$id'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));

                $_SESSION['info'] = [
                    'text'=>'Page edit successfully',
                    'status'=>'success'
                ];
                //header('Location: /admin/');
            }
        }


    }else{
            $_SESSION['info'] = [
                'text' => ' Edit your page',
                'status' => 'new'
            ];

    }
    return $_SESSION['info'];
}