<?php
$_kivi='����';
$fruits_west=array(1=>'�����',2=>'�����',3=>'���������',4=>'��������',5=>$_kivi);
$fruits_bg=array(1=>'������',2=>'�����',3=>'�����');
$fruits[1]=$fruits_west;
$fruits[2]=$fruits_bg;

echo $fruits_west[3].'<br>';
echo $fruits_bg[1].'<br>';

echo '<hr>';
var_dump($fruits_bg); //�� �������� ���� ���������� � ���������� ��� - ������ �.

echo '<hr>';
echo '<table border="3" cellspacing="0" cellpadding="0" width="230px" height="30px" align=center valign=middle>';
echo '<th>WiseMan CAx</th>';

for($i=1;$i<=count($fruits_west);$i++)
{
  echo '<tr><td><center>The fruits is '. $fruits_west[$i] .'</center><td/></tr>';
}
echo '</table>';

echo '<br><br><hr><br>';
$friends[1]='�����';
$friends[2]='�����';
$friends[3]='������';

echo '<hr>';
echo '<table border="3" cellspacing="0" cellpadding="0" width="230px" height="30px" align=center valign=middle>';
echo '<th>WiseMan CAx</th>';

for($i=1;$i<=count($friends);$i++)
{
  echo '<tr><td><center>My friends is '. $friends[$i] .'</center><td/></tr>';
}
echo '</table>';

echo '<hr><br>';
echo '���� ������� �� ���������/��������� �� ���������� �� �����:';
echo '<pre>'.  print_r($friends,true).'</pre>';
echo '���� ������� �� ���������/��������� �� ���������� �� ���������� �����:';
echo '<pre>'.  print_r($fruits,true).'</pre>';
?>