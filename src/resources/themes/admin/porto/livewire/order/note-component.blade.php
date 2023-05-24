<div class="row">
    <div class="col">

        <div class="card card-modern">
            <div class="card-header">
                <h2 class="card-title">@lang('order.show.order_notes') - {{ $notes->count() }}</h2>
            </div>
            <div class="card-body">
                <div class="ecommerce-timeline mb-3">
                    @if($notes->count())
                        <div class="ecommerce-timeline-items-wrapper">
                            @foreach($notes as $note)
                                <div class="ecommerce-timeline-item">
                                    {{--                                        @dd($note->author->name)--}}
                                    <small>{{ $note->created_at }} by {{ $note->author->name }} - <a wire:click="delete({{$note->id}})" class="text-color-danger cur-pointer">Delete note</a></small>
                                    <p>{{ $note->note }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
{{--                <form wire:submit.prevent="addNote()">--}}
                    <div class="form-row">
                        <div class="form-group col pb-1 mb-3">
                            <label>@lang('order.show.order_note')</label>
                            <textarea wire:model="note" class="form-control form-control-modern" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <a wire:click="addNote()" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">@lang('order.show.add_order_note')</a>
                        </div>
                    </div>
{{--                </form>--}}
            </div>
        </div>

    </div>
</div>
