

<?php
/*
if (isset($_POST['register-submit'])){
    require 'Compdb.php';

    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['eml'];
    $credit_card_num = $_POST['crd'];
    $password = $_POST['pwd'];
    $rep_password = $_POST['r_pwd'];
    $status = $_POST['online_status'];

    if(empty($first_name)|| empty($last_name)|| empty($email )|| empty($credit_card_num)|| empty($password )){
        header("Location:../register.html?error=emptyFields&fnam=".$first_name."lnam=".$last_name);
        exit();
    }
    else if(!filter_var($email,'FILTER_VALIDATE_EMAIL') && !preg_match("/^[a-zA-z]*$/", $first_name) && !preg_match("/^[a-zA-z]*$/", $last_name)){
        header("Location:../register.html?error=invalidmailfnamlname");
        exit();
    }

    else if(!filter_var($email,'FILTER_VALIDATE_EMAIL')){
        header("Location:../register.html?error=invalidmail&fnam=".$first_name."lnam=".$last_name);
        exit();

    }
    else if(!preg_match("/^[a-zA-z]*$/", $first_name)){
        header("Location:../register.html?error=invalidfname&lnam=".$last_name."mail".$email);
        exit();

    }
    else if(!preg_match("/^[a-zA-z]*$/", $last_name)){
        header("Location:../register.html?error=invalidlname&fnam=".$first_name."mail".$email); 
        exit();
    }
    else if($password !== $rep_password){
        header("Location:../register.html?error=passwordErrofnam=".$first_name."lnam=".$last_name."mail".$email); 
        exit();
    }
    else{
        $sql = "INSERT INTO customer (fname,lname,customerType) VALUES(?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../register.html?error=sqlerror");
            exit();
        }
        else{
            mysqli_stat_bind_param($stmt,"sss",$first_name,$last_name,$status);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            exit();
        }

        $sql = "INSERT INTO online_customer_details(card_num, email, p_word) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../register.html?error=sqlerror");
            exit();
        }
        else{
            mysqli_stat_bind_param($stmt,"sss",$credit_card_num,$email,$password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location:../register.html?register=success");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location:../register.html");
    exit();

}
/* -exit() at the first insert query
  -p_word could cause problems
  -the else statement with the sql queries
  -may not be finished
  -insertion in online_customer_deyails may cause a problem due how online is is populated in the database
  -hidden value may cause a problem*/

/*