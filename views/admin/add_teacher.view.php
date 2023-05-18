

<div class="container mt-5">
  <a href="<?= BASEURL; ?>/user/teachers" class="btn btn-primary">Back</a>
  <form class="mt-4" method="post" action="<?= BASEURL ?>user/storeTeacher">
    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Teacher email here" required>
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="Teacher name here" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password" placeholder="Teacher password here" required>
    </div>
    <div class="form-select">
    <label >Course</label>
    <select class="form-control" name="course_id" required>
      <option value="">Select a course</option>
      <?php foreach ($data['courses'] as $course) : ?>
        <option value="<?php echo $course['id']; ?>"><?php echo $course['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

