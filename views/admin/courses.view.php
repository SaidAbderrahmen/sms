

<div class="container mt-5">
        <h2><?= $data['title']; ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['courses'] as $course): ?>
                    <tr>
                        <td><?php echo $course['id']; ?></td>
                        <td><?php echo $course['name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= BASEURL; ?>/user/addCourse" class="btn btn-primary">Create</a>
    </div>


