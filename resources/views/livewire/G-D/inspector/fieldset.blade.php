<div class="form-group row">
	<label for="name" class="col-sm-2 col-form-label">{{__('Inspector.name')}}</label>
	<div class="col-sm-10">
		<input type="text" wire:model="name" class="{{ $fc_class }} @error('name') is-invalid @enderror" id="name" placeholder="{{__('Inspector.name')}}">
		@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
	</div>
</div>
<div class="form-group row">
	<label for="nat_id" class="col-sm-2 col-form-label">{{__('Inspector.nat_id')}}</label>
	<div class="col-sm-10">
		<input type="text" wire:model="nat_id" class="{{ $fc_class }} @error('nat_id') is-invalid @enderror" id="nat_id" placeholder="{{__('Inspector.nat_id')}}">
		@error('nat_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
	</div>
</div>
