<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // GLobal functions
    function showModal(selector) {
        $('#'+selector).modal('show')
    }

    function hideModal(selector) {
        $('#'+selector).modal('hide')
    }
</script>
