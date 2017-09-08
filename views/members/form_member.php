<section class="container">
  <div class="row">
    <div class="col-lg-6">
      <form action="?controller=members&action=register" method="post">
        <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="inputSchools">Schools</label>
          <select multiple class="form-control" id="inputSchools" name="schools[]" required>
            <?php foreach ($schools as $school) {?>
              <option value="<?= $school->id ?>"><?= $school->name ?></option>
            <?php } ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary float-right">Add new member</button>
      </form>
    </div>
  </div>
</section>
