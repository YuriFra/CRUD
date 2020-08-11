<?php require 'includes/header.php'?>
    <section class="container">
        <h1 class="text-center">Teacher</h1>
        <form method="post">
            <input type="hidden" name="action" value="add">
            <button type="submit" class="btn btn-primary">Create new teacher</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($teachers as $teacher) {
                /** @var Teacher $teacher */
                echo "<tr>
                <th scope='row'></th>
                <td><a href='?page=teacher&id={$teacher->getId()}'>{$teacher->getFullName()}</a></td>
                <td>{$teacher->getAddress()}</td>
                <td>
                   <form method='post'>
                      <input type='hidden' name='action' value='update'>
                      <input type='hidden' name='id' value='{$teacher->getId()}'>
                      <button type='submit' class='btn btn-primary'>Update</button>
                   </form>
                </td>
                <td>
                   <form method='post'>
                      <input type='hidden' name='action' value='delete'>
                      <input type='hidden' name='id' value='{$teacher->getId()}'>
                      <button type='submit' class='btn btn-danger'>Delete</button>
                   </form>
                </td>
            </tr>";
            } ?>
            </tbody>
        </table>
    </section>
<?php require 'includes/footer.php'?>