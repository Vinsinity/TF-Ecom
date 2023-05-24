
<div>
    <!-- start: page -->
    <form class="betuls-product-form action-buttons-fixed" wire:submit.prevent="addProduct">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-box"></i>
                                <h2 class="card-big-info-title">General Info</h2>
                                <p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tabs">
                                    <ul class="nav nav-tabs tabs-primary justify-content-end">
                                        <li class="nav-item active">
                                            <a class="nav-link" data-bs-target="#popular7" href="#popular7" data-bs-toggle="tab"><i class="fas fa-star"></i> EN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-target="#recent7" href="#recent7" data-bs-toggle="tab">TR</a>
                                        </li>
                                    </ul>
                                    <section class="card card-modern card-big-info">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div id="popular7" class="tab-pane active">
                                                    <div class="form-group row align-items-center pb-3">
                                                        <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Product Name</label>
                                                        <div class="col-lg-7 col-xl-6">
                                                            <input type="text" class="form-control form-control-modern" wire:model="name" id="name" value="{{ old('name') }}" placeholder="Enter product name"/>
                                                            @error('name') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center pb-3">
                                                        <label for="detail" class="col-lg-5 col-xl-3 control-label text-lg-end">Product Description</label>
                                                        <div class="col-lg-7 col-xl-6">
                                                            <textarea class="form-control form-control-modern" wire:model="description" id="detail" rows="6" placeholder="Enter product description">{{ old('detail') }}</textarea>
                                                            @error('description') <label class="error">{{ $message }}</label> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="recent7" class="tab-pane">
                                                    <div class="form-group row align-items-center pb-3">
                                                        <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Product Name</label>
                                                        <div class="col-lg-7 col-xl-6">
                                                            <input type="text" class="form-control form-control-modern" wire:model="name" id="name" value="{{ old('name') }}" placeholder="Ürün adı giriniz"/>
                                                            @error('name') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row align-items-center pb-3">
                                                        <label for="detail" class="col-lg-5 col-xl-3 control-label text-lg-end">Product Description</label>
                                                        <div class="col-lg-7 col-xl-6">
                                                            <textarea class="form-control form-control-modern" wire:model="description" id="detail" rows="6" placeholder="Ürün açıklaması giriniz">{{ old('detail') }}</textarea>
                                                            @error('description') <label class="error">{{ $message }}</label> @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="form-group row align-items-center pb-3">
                                    <label for="brand_id" class="col-lg-5 col-xl-3 control-label text-lg-end">Product Brand</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <select class="form-control" id="brand_id" wire:model="selectedBrand">
                                            <option selected>Choose here</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('selectedBrand') <label class="error">{{ $message }}</label> @enderror
                                        {{--                                        Selected brand id: {{ $selectedBrand }}--}}
                                    </div>
                                </div>
                                <div class="form-group row align-items-center pb-3">
                                    <label for="brand_id" class="col-lg-5 col-xl-3 control-label text-lg-end">Product Category</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <div id="categoryTree" wire:ignore>
                                            <ul>
                                                @foreach($categories as $category)
                                                    <li id="{{ $category->id }}" wire:model="selectedCategories">
                                                        {{ $category->name }} - {{ $category->children_count }}
                                                        @if($category->children_count > 0)
                                                            {{--                                                                @include('product.category.child', ['category' => $category->children])--}}
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @error('selectedCategories') <label class="error">{{ $message }}</label> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-selection"></i>
                                <h2 class="card-big-info-title">Product Variant</h2>
                                <p class="card-big-info-desc">Select your Product variant. You can add multiple variant.</p>
                            </div>
                            {{--                            @livewire('product.product.variant-select-component')--}}
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center pb-3">
                                    <label for="productVariant" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Variants</label>
                                    <div class="col-lg-7 col-xl-6" wire:ignore>
                                        <select id="productVariant" data-plugin-selectTwo class="product-variant-selection form-control populate" multiple="multiple">
                                            @foreach($selectOpt as $option)
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @foreach($this->selectedAttributes as $selectedAttribute)
                                    <div class="form-group row align-items-center pb-3" wire:ignore>
                                        <label for="{{ $selectedAttribute->name }}-{{ $selectedAttribute->id }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $selectedAttribute->name }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <select id="productOption-{{ $selectedAttribute->id }}" data-plugin-selectTwo class="variant-option-selection form-control populate" multiple="multiple">
                                                @foreach($selectedAttribute->values as $value)
                                                    <option value="{{ $value }}">{{ $value->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <script>
                                        $('#productOption-{{ $selectedAttribute->id }}').select2();
                                        $('#productOption-{{ $selectedAttribute->id }}').on('change', function (e) {
                                            var data = $('#productOption-{{ $selectedAttribute->id }}').select2("val");
                                            @this.set('selectedValues.{{ $selectedAttribute->id }}', data);
                                            @this.emit('setVariationsTable');

                                        });
                                    </script>
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
{{--                                                                                                                    @dd($variants)--}}
                                                @foreach($variants as $key => $variant)

                                                    <tr class="align-middle" wire:key="{{ $key }}">
                                                        <td>#</td>
                                                        <td>
                                                            <input type="text" class="form-control" wire:model="variants.{{ $key }}.sku" value="{{ $variant['sku'] ?? 'Missing SKU' }}" id="sku-{{ $key }}" >
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" wire:model="variants.{{ $key }}.stock" value="{{ $variant['stock'] ?? 'Missing Price' }}" id="stock-{{ $key }}" />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" wire:model="variants.{{ $key }}.price" value="{{ $variant['price'] ?? 'Missing Price' }}" id="price-{{ $key }}" />
                                                            <input type="checkbox">
                                                            <label for="withTax">With Tax</label>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" wire:model="variants.{{ $key }}.status">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-camera"></i>
                                <h2 class="card-big-info-title">Product Image</h2>
                                <p class="card-big-info-desc">Upload your Product image. You can add multiple images</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Image Upload</label>
                                            <input type="file" class="form-control" wire:model="images" multiple>
                                            <div wire:loading wire:target="images">Uploading...</div>
                                            @error('images.*') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        @if ($images)
                                            Photo Preview:
                                            @foreach ($images as $images)
                                                <img width="150px" src="{{ $images->temporaryUrl() }}">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="tabs-modern row" style="min-height: 490px;">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <div class="nav flex-column tabs" id="tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="price-tab" data-bs-toggle="pill" data-bs-target="#price" role="tab" aria-controls="price" aria-selected="true">Price</a>
                                    {{--                                        <a class="nav-link" id="inventory-tab" data-bs-toggle="pill" data-bs-target="#inventory" role="tab" aria-controls="inventory" aria-selected="false">Inventory</a>--}}
                                    {{--                                <a class="nav-link" id="shipping-tab" data-bs-toggle="pill" data-bs-target="#shipping" role="tab" aria-controls="shipping" aria-selected="false">Shipping</a>--}}
                                    {{--                                <a class="nav-link" id="linked-products-tab" data-bs-toggle="pill" data-bs-target="#linked-products" role="tab" aria-controls="linked-products" aria-selected="false">Linked Products</a>--}}
                                    {{--                                        <a class="nav-link" id="attributes-tab" data-bs-toggle="pill" data-bs-target="#attributes" role="tab" aria-controls="attributes">Attributes</a>--}}
                                    {{--                                <a class="nav-link" id="advanced-tab" data-bs-toggle="pill" data-bs-target="#advanced" role="tab" aria-controls="advanced">Advanced</a>--}}
                                </div>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="price-tab">
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0" for="">Buy Price ({{ config('app.currency_sign') }})</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern" wire:model="buyPrice" value="" />
                                                @error('buyPrice') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label for="price" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sale Price ({{ config('app.currency_sign') }})</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern" id="price" wire:model="sellPrice" value="" />
                                                @error('sellPrice') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                                                <div class="row">
                                                    <div class="col">

                                                        <input type="checkbox" wire:model="withTax" id="withTax">
                                                        <label for="withTax">With Tax</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">SKU</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <input type="text" class="form-control form-control-modern" name="sku" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Manage Stock?</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <div class="checkbox">
                                                    <label class="my-2">
                                                        <input type="checkbox" value="">
                                                        Enable stock management at product level
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Stock Status</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <select class="form-control form-control-modern" name="stockStatus">
                                                    <option value="in-stock" selected>In Stock</option>
                                                    <option value="out-of-stock">Out of Stock</option>
                                                    <option value="on-backorder">On Backorder</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Sold Individually</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <div class="checkbox">
                                                    <label class="my-2">
                                                        <input type="checkbox" value="">
                                                        Enable this to only allow one of this item to be bought in a single order
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                    <i class="bx bx-save text-4 me-2"></i> Save Product
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="ecommerce-products-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancel</a>
            </div>
            {{--            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">--}}
            {{--                <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">--}}
            {{--                    <i class="bx bx-trash text-4 me-2"></i> Delete Product--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </div>
    </form>
    <!-- end: page -->
</div>

@push('examplesJs')
    <script>
        $(document).ready(function () {
            $('#productVariant').select2();
            $('#productVariant').on('change', function (e) {
                const data = $('#productVariant').select2("val");
                @this.set('selectedAttributeIds', data);
                $(".variant-option-selection").val('').trigger('change');
            });
        });
    </script>
    <script>
        $('#categoryTree').jstree({
            'core' : {
                'themes' : {
                    'responsive': false
                }
            },
            'types' : {
                'default' : {
                    'icon' : 'fas fa-folder'
                },
                'file' : {
                    'icon' : 'fas fa-file'
                }
            },
            'plugins': ['types', 'checkbox']
        }).on('changed.jstree', function (e, data) {
            @this.set('selectedCategories', data.selected)
        });
    </script>
@endpush
