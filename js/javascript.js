/* Inıtilizations*/
$(document).ready(function () {
    $('.fixed-action-btn').floatingActionButton();
    $('.dropdown-trigger').dropdown();
    $('.tooltipped').tooltip();
    $('.modal').modal({classes: 'rounded'});
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.dropdown-trigger').dropdown();
    $('select').formSelect({
        classes: 'white darken-1 white-text '
    });
});

/*Custom functions*/
