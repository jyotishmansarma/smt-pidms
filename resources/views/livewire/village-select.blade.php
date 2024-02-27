<div class="row">
    <div class="col-md-4 col-12">
        <div class="mb-1" wire:ignore>
            <label class="form-label" for="title">Select Panchayat </label>
            <select class="form-control" name="panchayat_id" data-pharaonic="select2" data-component-id="{{ $this->id }}"  wire:model='selectedPanchayat'>
                @foreach ($panchayats as $panchayat)
                    <option value="{{ $panchayat->id }}">{{ $panchayat->panchayat_name }}- <span style="font-size: 20px!important;">Block:{{$panchayat->block->block_name}}, Dist:{{$panchayat->block->district->district_name}}</span> </option>
                @endforeach
            </select>
            @error('panchayat_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="mb-1" >
            <label class="form-label" for="title">Select Village </label>
            <select name="village_id" id="" class="form-control"  >
                @if ($villages)

                @foreach ($villages as $village)
                        <option value="{{ $village->id }}">{{ $village->village_name }}</option>
                    @endforeach
                @else
                    <option value="" selected>none</option>
                @endif

            </select>
            @error('village_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

</div>

