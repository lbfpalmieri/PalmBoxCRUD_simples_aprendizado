<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Dados atualizados com sucesso !");
    }
    else{
        echo "Failed: " . mysql_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>PalmBox CRUD</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        PalmBox CRUD
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Editar usuário</h3>
            <p class="text-muted">Faça as devidas alterações.</p>
        </div>

        <?php
            $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 500px; min: width 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Primeiro nome</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>"></input>
                    </div>

                    <div class="col">
                        <label class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>"></input>
                    </div>

                    <div>
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>"></input>
                    </div>

                    <div class="form-group mb-3">
                        <label>Gender:</label> &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="mulher" value="mulher" <?php echo ($row['gender'] == 'mulher')? "checked":""; ?>>
                        <label for="mulher" class="form-input-label">Mulher</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="homem" value="homem" <?php echo ($row['gender'] == 'homem')? "checked":""; ?>>
                        <label for="homem" class="form-input-label">Homem</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>