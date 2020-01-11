<?php
//GitHub Webhook Secret.
//GitHub项目 Setting/Webhooks中的Secret
$secret = "liangqigeng";

//Path to your respostory on your server.
//e.g. "/var/www/respostory"
//项目地址
$path = "/www/wwwroot/webhook.liangqigeng.top";

//Headers deliveried from Github
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

if($signature){
   $hash = "shal=".hash_hmac('sha1',file_get_contents("php://input"),$secret);
   if(strcmp($signature,$hash)==0){
    echo shell_exec("cd {$path} && /usr/bin/git reset --hard orign/master && /usr/bin/git reset --hard orign/master && /user/bin/git clean -f && /user/bin/git pull 2>&1");
  exit();
}
}

http_response_code(404);
?>