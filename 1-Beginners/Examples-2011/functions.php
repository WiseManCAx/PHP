<?php
$_input_radius=4; // ������ ������ �� ���������� �� ������;

$_take_area=area($_input_radius); // ��������� ����������� ����;
echo $_take_area;

function area($radius,$pi=3.14)
    {
echo '������ � ';
return $pi*($radius*$radius); // ������� �� ���������� � ������������;
    }

?>
