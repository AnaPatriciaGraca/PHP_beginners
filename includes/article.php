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

?>