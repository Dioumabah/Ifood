
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addPlatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New plat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form class="form-horizontal group-border stripped"  enctype="multipart/form-data">
                                         @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Designation</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('designation') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" value="{{ old('designation') }}">
                                                 @error('designation')<span class="text text-danger">{{$message}}</span>@enderror

                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Description</label>
                                                <div class="col-lg-10 col-md-9 {{ $errors->has('description') ? 'has-error' : '' }}">
                                                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">
                                                 @error('description')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Quantité</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" id="quantite" value="{{ old('quantite') }}">
                                                    @error('quantite')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Prix</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" id="prix" value="{{ old('prix') }}">
                                                    @error('prix')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Photo</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" onchange="previewFile(this)">
                                                    <img id="previewImg" alt="plat image" style="max-width: 130px; margin-top: 20px;">
                                                    @error('photo')<span class="text text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-3 form-control-label" >Catégorie</label>
                                                <div class="col-lg-10 col-md-9">
                                                    <select class="fancy-select form-control" name="categorie_id">
                                                        @foreach($categorie as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->libelle}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Valider</button>
      </div>
    </div>
  </div>
</div>
