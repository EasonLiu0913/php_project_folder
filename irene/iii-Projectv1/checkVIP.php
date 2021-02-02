<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script>
    $(document).on('change', 'select#VIP', function() {
        // alert('t');
        // var t = $(this).find('option:selected').html();

        if ($(this).val() == "NO") {
            // console.log('123');
            $('div#VIP_Start_div').hide();
            $('div#VIP_Due_div').hide();

        } else {
            // console.log('456');
            $('div#VIP_Start_div').show();
            $('div#VIP_Due_div').show();
        }
    });
</script>