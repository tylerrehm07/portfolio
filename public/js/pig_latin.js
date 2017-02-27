$(document).ready(function(){
    $('#submission').click(function(){
        var entry = $('#user_entry').val();
        var words = entry.split(' ');

        var word = '<h4><b>Results</b></h4>';
        $.each(words, function( index, value ) {
            var start = value.slice(1);
            var end = value.slice(0,1) + 'ay';
            word += start + '-' + end + ' ';
        });

       $('#conversion').html(word);
    });
});