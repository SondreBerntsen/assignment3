




<div class="container">
  <div class="row">
    <div class="col-7">
      <h1>Upload new item</h1>
      <!-- upload form for item-->
      <form  class="uploadItem" action="" method="post">
        <div class="form-group row">
          <div class="col-sm-12">
            <label>Choose category</label>
            <select id = "selectCategory"></select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="itemName" class="form-label">Name of item</label>
            <input type="text" class="form-control" id="itemName" name="ItemName" autofocus required placeholder="Name of item">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="PreviewItem" class="form-label">Short description of the item</label>
            <textarea rows="2" cols="50"  class="form-control" id="PreviewItem" name="PreviewItem" required placeholder="A short description of your item.."></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="itemDescr" class="form-label">Describe your item</label>
            <textarea rows="5" cols="50" class="form-control" id="itemDescr" name="itemDescr" required placeholder="Description of your item.."></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="uploadimg">Upload image of your item</label>
            <input type="file" class="form-control-file" id="uploadimg" name="uploadimg">
          </div>
        </div>
        <button name="uploadItem" type="submit" class="btn btn-primary">Upload item</button>
      </form>
    </div>
  </div>
</div>

<div id="tmplContainer">
  <option id="catTempl" class="categoryName"></option>
</div>
