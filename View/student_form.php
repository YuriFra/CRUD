<?php require 'includes/header.php'?>

    <section class="container">
        <h1 class="text-center">Student add/update</h1>
        <?php if (isset($msg)) {
            echo "<div class='alert alert-primary' role='alert'>{$msg}</div>";
        }?>
        <form method="post">
            <input type="hidden" name="action" value="<?php echo $action ?>">
            <input type="hidden" name="id" value="<?php echo $student->getId() ?>">
            <div class="form-group">
                <label for="firstName">Firstname</label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo  $student->getFirstName() ?? ''?>" required>
            </div>
            <div class="form-group">
                <label for="lastName">Lastname</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo  $student->getLastName() ?? ''?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo  $student->getAddress() ?? ''?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo  $student->getEmail() ?? ''?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>

<?php require 'includes/footer.php'?>