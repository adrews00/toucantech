<section class="container">
  <div class="row">
    <div class="col-lg-6">
      <form action="" method="get">
        <div class="form-group">
          <label for="inputSchool">Select School</label>
          <select class="form-control" id="inputSchool" name="school" onchange="this.form.submit()">
            <option value="" disabled <?= (isset($selSchool['school_id'])) ? '' : 'selected'?>>Select School</option>
            <?php foreach ($schools as $school) {?>
              <option value="<?= $school->id ?>" <?= (isset($selSchool['school_id']) && $selSchool['school_id'] == $school->id) ? 'selected' : '' ?>><?= $school->name ?></option>
            <?php } ?>
          </select>
        </div>
      </form>
      <hr />
      <?php if(!empty($selSchool)) {?>
      <h2><?= $selSchool['school_name'] ?></h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody >
          <?php if(isset($members)){
            if(empty($members)){
              echo "<tr><th colspan='3'>No members on this school yet.</th></tr>";
            }else{
              foreach ($members as $member) {?>
                <tr>
                  <th scope="row"><?= $member->id ?></th>
                  <td><?= $member->name ?></td>
                  <td><?= $member->email ?></td>
                </tr>
            <?php }
            }
        }
          ?>
        </tbody>
      </table>
      <?php }?>
    </div>
  </div>
</section>
