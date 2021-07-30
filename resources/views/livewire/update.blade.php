
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            @csrf
            <input type="hidden" name="id" wire:modal='ids'>
        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" id="firstname" wire:model='firstname'>
            @error('firstname')<span class="text text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" wire:model='lastname'>
            @error('lastname')<span class="text text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model='email'>
            @error('email')<span class="text text-danger">{{$message}}</span>@enderror
        </div>
         <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" wire:model='phone'>
            @error('phone')<span class="text text-danger">{{$message}}</span>@enderror
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Sutdent</button>
      </div>
    </div>
  </div>
</div>
