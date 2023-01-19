$(document).ready(function() {
    // Rating a recipe
    $('.rate>input').click(function(e) {
        let id = $(this).parent().find('input[name="id"]').val();
        let rate = $(this).val();
        console.log($(this));
        console.log(id);
        data = {
            id: id,
            note: rate
        }
        $.post({
            url: "index.php?action=rateRecipe",
            data: data,
            success: function(response) {
                console.log(data)
                // location.reload();
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

    //autocomplete search
    $('#search').click(function() {
        $.get({
            url: "/index.php?action=getIngredients",
            success: function(response) {
                let ingredients = JSON.parse(response);
                let ingredientsList = [];
                for (let i = 0; i < ingredients.length; i++) {
                    ingredientsList.push(ingredients[i].name);
                }
                $('#search').autocomplete({
                    source: ingredientsList
                });
            }
        });
    })

    // toggle add recipe
    $('#add-recipe').click(function(e) {
        e.preventDefault();
        $('.popout').toggleClass('active');
    }
    );
    $('#close-popout').click(function(e) {
        e.preventDefault();
        $('.popout').toggleClass('active');
    });
    $('#search,#fete').focus(function(e) {
        e.preventDefault();
        this.type='email';
    });
    $('#search,#fete').blur(function(e) {
        e.preventDefault();
        this.type='text';
    });
});
    