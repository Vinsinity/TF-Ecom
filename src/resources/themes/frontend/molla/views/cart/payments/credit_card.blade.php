<label>Name Surname *</label>
<input wire:model="fullname" type="text" class="form-control">

<label>Card Number *</label>
<input wire:model="card_number" type="text" class="form-control">
<div class="row">
    <div class="col-sm-6">
        <label>MM / YY *</label>
        <input wire:model="last_date" type="text" class="form-control">
    </div><!-- End .col-sm-6 -->

    <div class="col-sm-6">
        <label>CVV2 *</label>
        <input wire:model="cvv" type="text" class="form-control">
    </div><!-- End .col-sm-6 -->
</div><!-- End .row -->
