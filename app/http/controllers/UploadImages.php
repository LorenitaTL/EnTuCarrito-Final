<?php
$target_dir = '../../../assets/images/FOTOS/';
$target_file = $target_dir . $_POST['nombre'] . '/' . basename($_FILES["foto1"]["name"]);
/*echo 'Files';
var_dump($_FILES);
echo 'POST';
var_dump($_POST);
var_dump($_FILES['foto1']['tmp_name']);
echo '<br>';
var_dump($target_file);*/

/*move_uploaded_file($_FILES["foto1"]["tmp_name"], '../../../assets/images/FOTOS/' . $_POST['nombre'] . '.jpg');*/
/*move_uploaded_file($_FILES["foto2"]["tmp_name"], '../../../assets/images/FOTOS/' . $_POST['nombre'] . '2.jpg');*/

echo '<br>';
//echo 'Fotos';
$count =0;
for ($i=1; $i <= 10; $i++) { 
    $size = strlen($_FILES['foto' . $i]['tmp_name']);
    //echo 'size tmp_name foto'.$i.':'.$size.'<br>';
    if($size>0){
        $count++;
        $tmp_name = $_FILES["foto".$i]["tmp_name"];
        //$file_name = $_POST['nombre'] .$count.'.jpg';
        //move_uploaded_file($tmp_name, '../../../assets/images/FOTOS/' .$file_name);
        if (!file_exists('../../../assets/images/FOTOS/'.$_POST['nombre'])) {
            mkdir('../../../assets/images/FOTOS/'.$_POST['nombre'], 0777, true);
        }
        $file_name = $_POST['nombre'] .'/'.$count.'.jpg';
        move_uploaded_file($tmp_name, '../../../assets/images/FOTOS/' .$file_name);
    }
    /*if(strlen($_FILES['foto' . $i]['tmp_name'])!=0){
        $count++;
        echo '<br>'.$count;
        move_uploaded_file($_FILES["foto".$i]["tmp_name"], '../../../assets/images/FOTOS/' . $_POST['nombre'] .$count. '.jpg');
    }*/
    
}
//echo'<br>Count: '.$count;
/*for ($i = 1; $i <= $count; $i++) {
    move_uploaded_file($_FILES["foto".$i]["tmp_name"], '../../../assets/images/FOTOS/' . $_POST['nombre'] .$i. '.jpg');
}*/
