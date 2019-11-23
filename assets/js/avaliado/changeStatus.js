module.exports =  $('.changeStatus').on('click', function () {
    isChecked = $(this).is(':checked');
    uuid = $(this).data('id');
    url = $(this).data('url');
    console.log(isChecked);
    console.log(uuid)

    $.ajax ({
        url: url,
        type: "DELETE",
        success: function (response) {
            console.log(response)
        }
    })
})