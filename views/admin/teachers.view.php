

<div class="container mt-5">
        <h2><?= $data['title']; ?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['teachers'] as $teacher): ?>
                    <tr>
                        <td><?php echo $teacher['id']; ?></td>
                        <td><?php echo $teacher['name']; ?></td>
                        <td><?php echo $teacher['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= BASEURL; ?>/user/addTeacher" class="btn btn-primary">Create</a>

    </div>

    
