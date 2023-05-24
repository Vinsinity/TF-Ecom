<div class="col-lg-3-5 col-xl-4-5">
    <div class="form-group row align-items-center pb-3">
        <label for="productVariant" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Variants</label>
        <div class="col-lg-7 col-xl-6">
            <select id="productVariant" wire:model="selectedAttributeIds" wire:ignore.self class="product-variant-selection form-control populate" multiple="multiple">
                @foreach($options as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @foreach($this->selectedAttributes as $selectedAttribute)
        <div class="form-group row align-items-center pb-3" wire:ignore.self>
            <label for="{{ $selectedAttribute->name }}-{{ $selectedAttribute->id }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $selectedAttribute->name }}</label>
            <div class="col-lg-7 col-xl-6">
                <select name="{{ $selectedAttribute->name }}-{{ $selectedAttribute->id }}" wire:model="selectedValues.{{ $selectedAttribute->id }}" wire:change="setVariationsTable" id="{{ $selectedAttribute->id }}" class="variant-option-selection-{{$selectedAttribute->id}} form-control populate" multiple="multiple">
                    @foreach($selectedAttribute->values as $value)
                        <option value="{{ $value }}">{{ $value->value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endforeach
    @if(count($selectedAttributes) > 0 && count($selectedAttributes) <= count($selectedValues))
        <div class="form-group row-align-items-center pb-3">
            <div class="col-lg-7 col-xl-6 offset-lg-5 offset-xl-3">
                <table wire:init="setVariationsTable" class="table table-responsive-md mb-0">
                    <thead>
                    <tr>
                        <th width="30px">#</th>
                        <th>Name</th>
                        <th width="100px">Stock</th>
                        <th width="100px">Price</th>
                        <th width="50px">Status</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @dd($variations)--}}
                    @foreach($variations as $key => $variant)
                        <tr class="align-middle">
                            <td>#</td>
                            <td>
                                @foreach($variant['options'] as $option)
                                    {{ $option->value  }}
                                @endforeach
                            </td>
                            <td>
{{--                                wire:model="variants.{{ $key }}.stock"--}}
                                <input type="text" class="form-control"  value="0" id="inputDefault">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="0" id="inputDefault">
                            </td>
                            <td>Status</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
