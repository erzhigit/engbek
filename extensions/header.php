<img src = "../img/login_logo.png" style = "width: 200px; float:left;">
<p style = "font-size: 24px; text-align: center; color: #0094de; font-weight: bold;"><?= $oL::get('АХМЕТ ЯСАУИ УНИВЕРСИТЕТІ')?></p>
<p style = "font-size: 24px; text-align: center; color: red;font-weight: bold;"><?= $oL::get('ІШКІ КӘСІБИ РЕЙТИНГІ')?></p>
<div style = "font-size: 18px; text-align: center; color: #0094de;font-weight: bold;">
    <?php
    $result= mysqli_query($connection,"SELECT text_jildar FROM jildar WHERE id_jildar= '1'");
    while($row = mysqli_fetch_array($result))
    {
        echo $row['text_jildar'];
    }
    ?>
</div>
</br>