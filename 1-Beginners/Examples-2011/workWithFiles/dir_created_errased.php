<?php
if(is_dir('ubuntu'))
{
echo 'Dir exists.<br>';
rmdir('ubuntu');
echo 'Съдържанието може да се изтрие само, ако директорията е празна!<br>';
echo '...wait ...Dir deleted';
}
else
{
echo 'Dir do not exists<br>';
mkdir('ubuntu');
echo '...wait ...Dir created!';
}