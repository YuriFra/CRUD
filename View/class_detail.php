<?php require 'includes/header.php'?>
    <section class="container">
        <h1 class="text-center">Class details</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Teacher</th>
                <th scope="col">Students</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($class)) {
                /** @var ClassGroup $class */
                echo "<tr>
                <th scope='row'>{$class->getId()}</th>
                <td>{$class->getName()}</td>
                <td>{$class->getAddress()}</td>
                <td>{$teacherName}</td>
                <td>{$studentList}</td>
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