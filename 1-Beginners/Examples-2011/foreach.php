<?php
$_kivi='����';
$fruits_west=array(1=>'�����',2=>'�����',3=>'���������',4=>'��������',5=>$_kivi);
$fruits_bg=array(1=>'������',2=>'�����',3=>'�����');
$fruits[1]=$fruits_west;
$fruits[2]=$fruits_bg;

foreach ($fruits as $key => $value)
    {
    if (is_array($value))
    {
        foreach ($value as $k_key => $v_value)
            {
                echo $k_key.'==='.$v_value.'<br>';
            }
            echo '<hr><br>';
    }
 else {
        echo '<hr><br>';
        echo $key.'==='.$value.'<br>';
    }
    }

?>