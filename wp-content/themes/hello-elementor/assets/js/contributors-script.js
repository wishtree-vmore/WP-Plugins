jQuery(document).ready(function($) {
    // console.log("Hi");

    $('input[name="users[]"]').trigger('change');

    $('input[name="users[]"]').change(function() {
        console.log("Checkbox change event triggered");
        var selectedUsers = [];
        // console.log(this)

        $('input[name="users[]"]:checked').each(function() {
            selectedUsers.push($(this).next('span').text());
        });

        // console.log("array: " + selectedUsers);
        // $('#selected-users-list').html(selectedUsers.join(', '));
        $('#selected-users-ids').val(selectedUsers);
    });

    $(window).on('load', function(){
        $('input[name="users[]"]').trigger('change');
    });
});

