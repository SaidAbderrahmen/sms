

<div class="container mt-5">
  <a href="<?= BASEURL; ?>/user/courses" class="btn btn-primary">Back</a>
  <form class="mt-4" method="post" action="<?= BASEURL ?>user/storeCourse">

    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" placeholder="cOURSE name here" required>
    </div>
    
    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

