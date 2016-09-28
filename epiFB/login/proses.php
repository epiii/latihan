<?php
session_start();
require '../src/facebook.php';
 
$facebook = new Facebook(array(
  'appId'  => '150245972083118',
  'secret' => 'ea03ff3bcd8c669d37bf6a61c8bdfd54',
));
// var_dump($facebook);exit(); 
// Get User ID
$user = $facebook->getUser();
if (!empty($user)) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
 
  if(!empty($user_profile)) {
 
        mysql_connect('localhost', 'root', '');
        mysql_select_db('nyoba_anu');
 
        //Mengecek apakah user sudah mendaftar atau belum
        $query = mysql_query("SELECT * FROM users WHERE oauth_provider = 'facebook' AND oauth_uid = ".$user_profile['id']);
        $result = mysql_fetch_array($query);
 
        if($result == null) {
 
            //Memasukan data user
            $query = mysql_query("INSERT INTO users(oauth_provider, oauth_uid, username) VALUES('facebook', {$user_profile['id']}, '{$user_profile['username']}')");
            $query = mysql_query("SELECT * FROM users WHERE id = ".mysql_insert_id());
            $result = mysql_fetch_array($query);
        }
        // Mengeset SESSION
        $_SESSION['id'] = $result['id'];
        $_SESSION['oauth_uid'] = $result['oauth_uid'];
        $_SESSION['oauth_provider'] = $result['oauth_provider'];
        $_SESSION['username'] = $result['username'];
 
    }
      else {
        die("Terjadi Kesalahan");
        }
}
else {
 
    $login_url = $facebook->getLoginUrl();
    header("Location: ".$login_url);
}
?>