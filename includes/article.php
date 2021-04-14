<?php 

/**
 * Get the article record based n the ID
 * 
 * @param object $conn  Connection to the database
 * @param integer $id the article ID
 * 
 * @return mixed An associative array containing the article with that ID, or null if not found
 */
function getArticle($conn, $id){

    $sql = "SELECT *
            FROM article
            WHERE id= ?";

    //prepare sql statement (to avoi SQL injection)
    $stmt = mysqli_prepare($conn, $sql);

    //verificar se conexão dá erro
    if ($stmt === false) {
        echo mysqli_error($conn);
    } else{
        //bind as integer to insert
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)){
            //results of the sql statement
            $result = mysqli_stmt_get_result($stmt);
            // return Associative array containing the article with that ID - returns null if it does not find anything
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

}


/**
 * Validate the article properties
 * 
 * @param string $title required
 * @param string $content required
 * @param string $published at yyyy-mm-dd hh:mm:ss if not blank
 */
function validateArticle($title, $content, $published_at){
    $errors = [];

    if ($title == ''){
        $errors[] = 'Title is required';
      }
      if($content == ''){
        $errors[] = 'Content is required';
      }
      if($published_at != ''){
        // expected format -> see documentation (YYYY-MM-DD HH:MM:SS) retorna falso se nao conseguiu fazer o parsing
        $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);
        if ($date_time === false) {
          $errors[] = 'Please enter a valid form "yyyy-mm-dd hh:mm:ss"';
        }else{
          //varifica se a data existe (exemplo: 30 de Fevereiro)
          $date_errors = date_get_last_errors();
          if ($date_errors['warning_count'] > 0){
            $errors[] = 'Invalid date and time';
          }
        }
      }
      return $errors;
}

?>