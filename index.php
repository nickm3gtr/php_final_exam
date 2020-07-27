<?php include 'layouts/header.php'; ?>
<div class="row">
  <div class="col"></div>
  <div class="col">
    <div class="card">
      <div class="card-header text-center">
        Word Puzzle
      </div>
      <div class="card-body">
        <form action="result.php" method="POST">
          <div class="form-group">
            <textarea class="form-control" id="words" name="words" rows="5" placeholder="Enter words"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>

<?php include 'layouts/footer.php'; ?>