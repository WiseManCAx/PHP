<?php

// 1241177019
// Gatakka � ������ ���� ���� �� 2009 : 05 : 01 � 01:23:39
$format_time_gatakka=1241177019;
$TIME='Y : m : d � h:i:s';
echo 'Gatakka � ������ ���� ���� �� ';
echo date($TIME, $format_time_gatakka);
echo '<br><br><hr><br>';

echo date('Y : m : d');

echo '<br><br><hr><br>';

echo '��������� �� ����� ������ �����, �� ���� ��������� - �� ���� ����� � � �������� ���=������=������� <br>';
$TIME='Y : m : d === h:i:s';
echo date($TIME);

echo '<br><br><hr><br>';

echo '������������� ����� ������ ������� ������ ����� � �������� <br>';
$TIME='Y : m : d === h:i:s';
/*
time() - ���� ����� ���� ���� ������� - �� �� ������� ��� ���� � ���������� �� �� ��������� �
���� '�����' � �� �� ������� ���� �� �����...
 echo date('U'); - ���� ����� �������� ���� ��-������� �������, �� � ���������� ��-����� � ����� ����������������.
 */
$_set_time=time()+3600;
echo date($TIME, $_set_time);

echo '<br><br><hr><br>';

echo '����������� ������ �����, �� � ���� ��� ������... <br>';
$format='Y : m : d === h:i:s';
$_set_format_time=mktime(0, 0, 0, date('m'), date('d'), date('Y'));
$_set_format_time+=86400;
echo date($format, $_set_format_time);

echo '<br><br><hr><br>';

echo '����������� ������ ����� �� ������ - 2011-04-14 0:0:0 <br>';
$format='Y : m : d === h:i:s';
$_set_string=strtotime("2011-04-14 0:0:0");
echo date($format, $_set_string);