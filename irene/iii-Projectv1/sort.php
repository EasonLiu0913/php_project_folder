<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
    $(document).on('click', 'input#sort', function() {
        if ($('input#sort').prop("checked")) {
            $('items').sort();
            console.log('123')
        } else {

        }
    });
</script>