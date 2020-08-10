<?php require 'includes/header.php'?>
    <section class="container">
        <h1 class="text-center">Teacher add/update</h1>
        <form method="post">
            <input type="hidden" name="action" value="<?php echo $action ?> ">
            <input type="hidden" name="id" value="">
            <div class="form-group">
                <label for="firstName">Firstname</label>
                <input type="text" class="form-control" id="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Lastname</label>
                <input type="text" class="form-control" id="lastName" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
<?php require 'includes/footer.php'?>