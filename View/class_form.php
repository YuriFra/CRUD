<?php require 'includes/header.php'?>
    <section class="container">
        <h1 class="text-center">Class add/update</h1>
        <?php if (isset($msg)) {
            echo "<div class='alert alert-primary' role='alert'>{$msg}</div>";
        }?>
        <form method="post">
            <input type="hidden" name="action" value="<?php echo $action ?>">
            <input type="hidden" name="id" value="<?php echo $class->getId() ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo  $class->getName() ?? ''?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo  $class->getAddress() ?? ''?>" required>
            </div>
            <select class="custom-select" id="teacher" name="teacher_id">
                <option selected>Select teacher</option>
                <?php foreach($teachers as $teacher){
                    echo "<option value='{$teacher->getId()}'>{$teacher->getFullName()}</option>";
                }?>
            </select>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
<?php require 'includes/footer.php'?>