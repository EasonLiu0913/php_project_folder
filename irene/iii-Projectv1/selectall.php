<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script>
    $(document).on('click', 'input#allchecked', function() {
        if ($('input#allchecked').prop("checked")) {
            $('input.box').prop("checked", true)
        } else {
            $('input.box').prop("checked", false)
        }
    })
    $(document).on('click', 'input.box', function() {
        if ($(this).is(":checked")) {
            $('input.box').each(function() {
                if (!this.checked) {
                    $('input#allchecked').prop("checked", false);
                } else {
                    $('input#allchecked').prop("checked", true);
                    exit();
                }
            });
        } else {
            $('input#allchecked').prop("checked", false);
        }
    });
</script>