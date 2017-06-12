# makerblog
* Makerblog is a secure php blog site which allows users to quickly and easily create a blog

Homepage will have login or signup options if not already signed in, else it will be an admin version of your site with write access. <br/> 

Admin version of site will be allowed to create, read, update, or delete aspects of your site or redirect to your viewer site which only 
<br/>
has read access.

* Some built in functions we will need are  <br/>

Connection
==========
* $db = pg_connect("host=localhost dbname=whatever user=yourusername password=''");
* $data = pg_query($db, $query); 
* pg_query_params($db, "INSERT INTO SOME_TABLE WHERE foo = $1", array($thing));

Encryption and Decryption
=========================
* password_hash($password, PASSWORD_BCRYPT);

* $verify = password_verify($password , $hash);

Sessions
=========
* session_start();
* logout - > session_destroy();
* $_SESSION["thing"]

