<?php require 'includes/header.php'?>
    <section>
        <h1 class="text-center">Teacher details</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Students</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($teacher)) {
                /** @var Teacher $teacher */
                echo "<tr>
                <th scope='row'>{$teacher->getId()}</th>
                <td>{$teacher->getFullName()}</td>
                <td>{$teacher->getEmail()}</td>
                <td>{$studentList}</td>
                <td>{$buttonDelete}</td>
            </tr>";
            } ?>
            </tbody>
        </table>

    </section>
<?php require 'includes/footer.php'?>