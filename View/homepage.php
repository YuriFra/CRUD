<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>
<div class="container">
    <br>
    <br>
    <h1 class="text-center font-weight-bold">Welcome to the Becode platform.<br> Here you can alter students, teachers & classes.</h1>
    <br>
    <h3 class="text-center ">What category do you want to alter?</h3>
    <br>
    <br>

    <div class="card-deck d-flex justify-content-center">
    <div class="card text-white text-center bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header"><i class="fa fa-graduation-cap fa-2x"></i></div>
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Students</h5>
            <p class="card-text">Add, edit or delete students here.</p>
            <br>
            <a href="?page=student" class="btn btn-light">GO!</a>
        </div>
        </div>

    <div class="card text-white text-center bg-warning mb-3" style="max-width: 18rem;">
        <div class="card-header"><i class="fas fa-chalkboard-teacher fa-2x"></i></div>
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Teachers</h5>
            <p class="card-text">Add, edit or delete teachers here.</p>
            <br>
            <a href="?page=teacher" class="btn btn-light">GO!</a>
        </div>
        </div>

    <div class="card text-white text-center bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header"><i class="fas fa-school fa-2x"></i></div>
        <div class="card-body">
            <h5 class="card-title font-weight-bold">Classes</h5>
            <p class="card-text">Add, edit or delete classes here.</p>
            <br>
            <a href="?page=class" class="btn btn-light">GO!</a>
        </div>
        </div>
    </div>


</section>
<?php require 'includes/footer.php'?>