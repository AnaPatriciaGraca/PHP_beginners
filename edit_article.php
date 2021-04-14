<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$conn = getDB();

if (isset($_GET['id'])){

    $article = getArticle($conn, $_GET['id']);

    if($article){
      $id = $article['id'];
      $title = $article['title'];
      $content = $article['content'];
      $published_at = $article['published_at'];
    }else{

      die("article not found");
    }
    
    
} else {
  die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  $errors = validateArticle($title, $content, $published_at);

  if(empty($errors)){
    //user prepared statements do validate de data from the user (SQL injections)
    //die('Form is valid');

    $sql = "UPDATE article
            set title = ?,
            content = ?,
            published_at = ?
            WHERE id = ?";

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
      mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at, $id);

      if (mysqli_stmt_execute($stmt)){

        redirect("/article.php?id=$id");

      }else{
        echo_stmt_error($stmt);
      }
    }
  
  }
}

?>

<?php require 'includes/header.php';?>

<h2>Edit Article</h2>

<?php require 'includes/article_form.php'; ?>
<?php require 'includes/footer.php';?>

