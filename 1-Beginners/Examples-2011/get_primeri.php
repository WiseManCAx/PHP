<form metod="get" action="get_polu4eni.php">
    <br> Име на заявителя: (трите Ви имена):&nbsp;
<input name="UserName" size="40" value="(Mr/Miz:)" tabindex="1">

<br>
<fieldset id="additional-information" align="left">
<legend> <b> Допълнителна информация за фирмите: </b> </legend>
<p>Заемана позиция/длъжност: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Мениджър &nbsp; <input type="radio" value="M" checked name="Gen" tabindex="10">&nbsp;&nbsp;&nbsp;
Управител &nbsp; <input type="radio" value="F" name="Gen" tabindex="11"> </p>
<p>Брой на служителите Ви: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select size="1" name="Age" tabindex="12">
<option value="1">1-5</option>
<option value="2">6-25</option>
<option value="3">26-99</option>
<option value="4">100 ></option>
</select></p>
<br>
</fieldset>
<br>
<br>
<center> <h4> <input type="submit" value="Submit Your Answers!" name="Submit" tabindex="13"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" value="Reset form" name="Reset" tabindex="14"> </h4> </center>
</form>

<?php


?>