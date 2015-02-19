<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<?PHP include('conf.php'); ?>
<div style="padding-left:10px;">

    <form method='POST' action='' name='agreeform' onSubmit='return defaultagree(this)'>
        <font face='verdana' size='2' color='#484848 '>От:</font>
        <input class='input' name='user' type='text' value='' MAXLENGTH='30'><br/><br/>
        <font face='verdana' size='2' color='#484848 '>За:</font>
        <input class='input' name='izp' type='text' MAXLENGTH='30'><br/><br/><br/>
        <font face='verdana' size='2' color='#484848 '>Поздрав/Песен:</font><br/>
        <textarea class='textarea' name='pesen' border='3' id='maxcharfield' 
                  onKeyDown="textCounter(this, 'progressbar1', 255)" 
                  onKeyUp="textCounter(this, 'progressbar1', 255)" 
                  onFocus="textCounter(this, 'progressbar1', 255)" ></textarea><br/>

        <div id="progressbar1" class="progress"></div>
        <script>textCounter(document.getElementById("maxcharfield"), "progressbar1", 255)</script>
        <p><input id='114' name="agreecheck" type="checkbox" onClick="agreesubmit(this)"><label for='114'><a href="javascript:void(0)"
                                                                                                             onclick="window.open('pravila.php',
                                                                                                                             'welcome', 'width=810,height=430')"><font size='2' color='#484848 '>Запознат/а съм с правилата!</font></a></label></p>
        <input id='regbtn' type='submit' name='send' value='Поръчай!' >
    </form><br></div>
<?php
if ($_POST['send']) {
    $ot = $_POST['user'];
    $izp = $_POST['izp'];
    $pesen = $_POST['pesen'];
    $query = mysql_query("INSERT INTO `compliments` (ot, id, izp, pesen) VALUES('$ot','NULL','$izp','$pesen')");
    echo "Успешно добавен поздрав<br><a href=\"index.php\">Върни се в началната страница</a>";
}