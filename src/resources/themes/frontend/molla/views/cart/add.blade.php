<script>
    function addToCart(id) {
        $.ajax({
            url: '{!! route('cart.store') !!}',
            method: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                console.log(response);
            }
        })
    }
</script>
