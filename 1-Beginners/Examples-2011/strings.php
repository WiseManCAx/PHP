<?php
$_proba_strings='  qwertyuiop  ';
echo strlen($_proba_strings);

echo '<br><br><hr><br>';

$_trim_string=trim($_proba_strings);
// ltrim($_proba_strings) - �������� ���� ��������� ������ �������;
// rtrim($_proba_strings) - �������� ���� �������� ������ �������;
echo strlen($_trim_string);
// echo strlen(trim($_proba_strings)); ���� � ���������� ������� - ����� ����������!!!;


//str_replace($search, $replace, $subject);
/*
 if(strpos($_proverqvanata_promenliva, '������� ���')!==false)
 {
  echo 'Found!';
 }
 else
 {
   echo 'Not found!';
 }
 */

// echo strtoupper($_vsi4ko_v_glavni_bukvi);
// echo strtolower($_vsi4ko_s_malki_bukvi);
// echo ucfirst($_pyrvata_e_golqma_drugite_bukvi_ne_promenqt);

// ��������� emplode � explode ;
?>
