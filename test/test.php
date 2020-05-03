
<html>
    <body>
        Hi everybody <br/>
        <?php
            $a=100;
            echo gettype($a);
            settype($a,'double');
            echo'<br/>';
            echo gettype($a);
            echo'<br/>';
        ?>
    </body>

</html>
<?php
    $a = "hi";
    echo $a . " everybody"; 
    define ('TITLE','PHP tutorial');
    echo'<br/>';
    echo TITLE;
    echo'<br/>';
    //가변변수
    $title = 'subject';
    $$title = 'PHP tutorial';
    echo $subject;
    echo '<br/>';

    if(is_string($a)){
        echo "please type number";
    }

?>

<html>
    <body>
        <form method = "post" action = "helloworld.php">
            id : <input type = "text" name = "id" />
            password :<input type = "text" name = "password"/>
            <input type="submit"/><br/>
            <?php
if(true){
echo 1;
echo 2;
}
echo 3;
?>

        </form>
    </body>
</html>