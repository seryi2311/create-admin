<?php
function createLink($href, $text){

    if($href != '/') {
        $var = '/?page=' . $href;
    }else{
        $var = '/';
    }


    if($_SERVER['REQUEST_URI']==$var) {
        $class = 'class = "active"';
    }else{
        $class = '';
    }
    if($href == '/'){
        echo "<a href=\"/\"$class>$text</a>";
    } else{
        echo "<a href=\"/?page=$href\"$class>$text</a>";
    }
}


$query = "SELECT * FROM pages WHERE url != '404'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $elem){
    createLink($elem['url'],$elem['text']);
}
?>
