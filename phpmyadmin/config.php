<?php
  
/* Servers configuration */
$i = 0;
  
/* Server: localhost [1] */
$i++;
$cfg['Servers'][$i]['verbose'] = '';
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['port'] = '';
$cfg['Servers'][$i]['socket'] = '';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['user'] = 'root2';
$cfg['Servers'][$i]['password'] = '123';
$cfg['Servers'][$i]['nopassword'] = true;
$cfg['Servers'][$i]['AllowNoPassword'] = false;
  
/* End of servers configuration */
  
$cfg['blowfish_secret'] = 'kjLGJ8g;Hj3mlHy+Gd~FE3mN{gIATs^1lX+T=KVYv{ubK*U0V';
$cfg['DefaultLang'] = 'ru';
$cfg['ServerDefault'] = 1;
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
  
?>