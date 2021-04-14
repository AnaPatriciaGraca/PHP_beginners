<?php
require 'includes/database.php';
require 'includes/article.php';
//de claração de variaveis
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  $errors = validateArticle($title, $content, $published_at);

  if(empty($errors)){
    $conn = getDB();
    var_dump($errors);

    //avoid SQL injection with mysqli_escape_string()
    /*  $sql = "INSERT INTO article(title, content, publiched_at)
    VALUES('" . mysqli_escape_string($conn, $_POST['title']) . "', '"
    . mysqli_escape_string($conn, $_POST['content']) . "', '"
    . mysqli_escape_string($conn, $_POST['publiched_at']) . "')"; */
    $sql = "INSERT INTO article(title, content, published_at)
    VALUES(?, ?, ?)";

    //  $results = mysqli_query($conn, $sql);
    //alternative to mysqli_escape_string()
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) { 
      echo mysqli_error($conn);
    } else {
      //para nao inserir a data 0000-00-00 00:00 na base de dados (tem de ser antes do bind)
      if ( $published_at == ''){
        $published_at = null;
      }

      // use stmt to insert the 3 strings (se a ultima for null o servidor reconhece)
      mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);
      if (mysqli_stmt_execute($stmt)){
        //return the automatic id created
        $id = mysqli_insert_id($conn);
        //don't use relative paths
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
          $protocol = 'https';
      } else {
          $protocol = 'http';
      }
      //absolUte URL
      header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
      exit; //sair porque mudamos de pagina

      }else{
        echo_stmt_error($stmt);
      }
    }
  }
}

 ?>

<?php require 'includes/header.php';?>

<h2>New Article</h2>

<?php require 'includes/article_form.php'; ?>
<?php require 'includes/footer.php';?>
