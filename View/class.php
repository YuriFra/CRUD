<?php require 'includes/header.php'?>
<section class="container">
    <h1 class="text-center">Classes</h1>
    <form method="post">
        <input type="hidden" name="action" value="add">
        <button type="submit" class="btn btn-primary">Create new class</button>
    </form>git
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $class) {
            /** @var ClassGroup $class */
            echo "<tr>
                <th scope='row'></th>
                <td>{$class->getName()}</td>
                <td>{$class->getAddress()}</td>
                <td>
                   <form method='post'>
                      <input type='hidden' name='action' value='update'>
                      <input type='hidden' name='id' value='{$class->getId()}'>
                      <button type='submit' class='btn btn-primary'>Update</button>
                   </form>
                </td>
                <td>
                   <form method='post'>
                      <input type='hidden' name='action' value='delete'>
                      <input type='hidden' name='id' value='{$class->getId()}'>
                      <button type='submit' class='btn btn-danger'>Delete</button>
                   </form>
                </td>
            </tr>";
        } ?>
        </tbody>
    </table>
</section>
<?php require 'includes/footer.php'?>
