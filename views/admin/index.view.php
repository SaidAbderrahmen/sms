
<div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Teachers</h5>
                        <p class="card-text">Total: <?php echo count($data['teachers']); ?></p>
                        <a href="<?= BASEURL; ?>/user/teachers" class="btn btn-light">View Teachers</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">Total: <?php echo count($data['students']); ?></p>
                        <a href="<?= BASEURL; ?>/user/students" class="btn btn-light">View Students</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">Total: <?php echo count($data['courses']); ?></p>
                        <a href="<?= BASEURL; ?>/user/courses" class="btn btn-light">View Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



