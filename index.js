$(document).ready(function() {
    // Rating a recipe
    $('.rate>input').click(function(e) {
        e.preventDefault();
        let id = $(this).parent().find('input[name="id"]').val();
        console.log(id)
        let data = $(this).val();
        data = {
            id: id,
            note: data
        }
        $.post({
            url: "/index.php/rateRecipe",
            data: data,
            success: function(response) {
                location.reload();
            }
        });
    })

    // Filter
    $('#filter-btn').click(function(e) {
        e.preventDefault();
        $('.filter-container').toggleClass('active');
    });

    // Auth
    $('#login-switch').click(function(e) {
        e.preventDefault();
        $('.login').removeClass('active');
        $('.register').addClass('active');
    });
    $('#register-switch').click(function(e) {
        e.preventDefault();
        $('.login').addClass('active');
        $('.register').removeClass('active');
    });
    
});