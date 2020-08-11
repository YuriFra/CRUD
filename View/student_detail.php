<?php require 'includes/header.php'?>
    <section class="container">
        <h1 class="text-center">Student details</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Class</th>
                <th scope="col">Teacher</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($student)) {
                /** @var Student $student */
                echo "<tr>
                <th scope='row'>{$student->getId()}</th>
                <td>{$student->getFullName()}</td>
                <td>{$student->getEmail()}</td>
                <td>{$className}</td>
                <td>{$teacherName}</td>
                <td>
                   <form method='post'>
                      <input type='hidden' name='action' value='delete'>
                      <input type='hidden' name='id' value='{$student->getId()}'>
                      <button type='submit' class='btn btn-danger'>Delete</button>
                   </form>
                </td>
            </tr>";
            } ?>
            </tbody>
        </table>

    </section>
<?php require 'includes/footer.php'?>