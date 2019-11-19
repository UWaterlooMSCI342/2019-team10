<div class="modal fade" id="spellbookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select or Create Spellbook</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	
        <label for = "dropdown">Select Existing Spellbook</label>
        <small class="form-text text-muted" color=”red”>If None is selected, please create a new spellbook.</small>
        <select id = "dropdown" name = "spellbook" class = "browser-default custom-select custom-select-lg mb-3">
            <option selected="selected" disabled='disabled' value = "None">---None---</option>
            @foreach($spellbooks as $spellbook)
            <option value = "{{$spellbook->spell_book_id}}">{{$spellbook->name}}</option>
            @endforeach
        </select>
        <form>
        <div class="form-group">
          <label for="dropdown">Name of New Spellbook (required)</label>
          <input name = "newSpellbookName" type="text" class="form-control" id="create_new" aria-describedby="emailHelp" placeholder="Type name">
          <small class="form-text text-muted">This spellbook will  be added to your collection.</small>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit" class="btn btn-success">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
      </div>
</div>
