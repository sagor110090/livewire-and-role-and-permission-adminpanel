<div>
    <div class="form-group" >
        <label for="brand_id">{{__('Brand Name')}}</label>
        <input type="text" class="form-control" wire:model="name">
        <select wire:model="brand_id" id="brand_id" class="form-control select"
            placeholder="{{__('Select')}}...">
            <option value="">{{__('Select')}}...</option>
            @foreach ($brands as $item)
            <option value="{{$item->id}}">{{$item->brand_name}}</option>
            @endforeach
        </select>
        @error('brand_id') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</div>
