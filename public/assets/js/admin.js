function showLoading()
{
    $('#preloader').show();
}

function hideLoading()
{
    $('#preloader').hide();
}


function goToByScroll(id)
{
    $('html,body').animate({
            scrollTop: ($("#"+id).offset().top - 100)},
        'slow');
}

function fillFormStatus(type, data)
{
    var statusHtml = '<div class="alert alert-' + type + '"><ul>';;

    $.each( data, function( key, value ) {
        statusHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
    });
    statusHtml += '</ul></di>';

    $( '#form-status' ).html( statusHtml ); //appending to a <div id="form-errors"></div> inside form
}

function fillCategoryFormStatus(type, data)
{
    var statusHtml = '<div class="alert alert-' + type + '"><ul>';;

    $.each( data, function( key, value ) {
        statusHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
    });
    statusHtml += '</ul></di>';

    $( '#category-form-status' ).html( statusHtml ); //appending to a <div id="form-errors"></div> inside form
}

function getAdminResults()
{
    if ($('#admin-results').length) {
        $.ajax({
                method: "GET",
                url: $('#admin-results').attr('data-href'),
            })
            .done(function( result ) {
                $('#admin-results').html(result);
                addSortable();
            });
    }
}

function getCategoryResults()
{
    if ($('#category-results').length) {
        $.ajax({
                method: "GET",
                url: $('#category-results').attr('data-href'),
            })
            .done(function( result ) {
                $('#category-results').html(result);
            });
    }
}

function getPhotoList(type, id)
{
    var data = {'type' : type};
    if (id != 'null') {
        data.id = id;
    }
    $.ajax({
            method: "GET",
            url: '/admin/photos',
            data : data
        })
        .done(function( result ) {
            $('#photo-results').html(result);
        });
}

function clearPhotoList()
{
    $('#photo-results').html('');
}

$(document).on('change', '.file-upload', function() {
    $(this).next('input').val($(this).val());
});

$(document).on('submit', 'form#adminAjaxForm', function(event){
    event.preventDefault();

    $( '#form-status' ).html('')

    var formData = new FormData($(this)[0]);

    $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data){
            fillFormStatus('success', data);
            if ($('form#adminAjaxForm').hasClass('create-form')) {
                $('form#adminAjaxForm')[0].reset();
                clearPhotoList();
            }
            getAdminResults();
        })
        .fail(function(jqXhr){
            if( jqXhr.status === 401 ) {//redirect if not authenticated user.
                window.location.replace('/login');
            }

            if( jqXhr.status === 422 ) {
                $errors = jqXhr.responseJSON.errors; //this will get the errors response data.
            } else {
                $errors = {"something": {0:"Something went wrong... Please try again!"}}
            }

            fillFormStatus('danger', $errors);

        });

    return false;
});

$(document).on('submit', 'form#categoryAjaxForm', function(event){
    event.preventDefault();

    $( '#category-form-status' ).html('')

    var formData = new FormData($(this)[0]);

    $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(data){
            fillCategoryFormStatus('success', data);
            if ($('form#categoryAjaxForm').hasClass('create-form')) {
                $('form#categoryAjaxForm')[0].reset();
                clearPhotoList();
            }
            getCategoryResults();
        })
        .fail(function(jqXhr){
            if( jqXhr.status === 401 ) {//redirect if not authenticated user.
                window.location.replace('/login');
            }

            if( jqXhr.status === 422 ) {
                $errors = jqXhr.responseJSON.errors; //this will get the errors response data.
            } else {
                $errors = {"something": {0:"Something went wrong... Please try again!"}}
            }

            fillCategoryFormStatus('danger', $errors);

        });

    return false;
});

$(document).on('click', '.hasToConfirm', function() {
    return confirm('Are you sure?');
});

$(document).on('click', '.photo-delete', function() {
    if (confirm('Are you sure?')) {
        var photoId = $(this).attr('data-id');
        var itemId = $(this).attr('data-itemId');
        var type = $(this).attr('data-type');
        $.ajax({
                method: "GET",
                url: "/admin/photos/delete/"+photoId,
            })
            .done(function( result ) {
                $('#photo-' + photoId).remove();
                getPhotoList(type, itemId);
            });
    }
});

$(document).on('click', '.btn-item-delete', function(event) {
    event.preventDefault();

    var type = 'admin';
    if ($(this).attr('data-type') == 'category') {
        type = 'category';
    }

    if (confirm('Are you sure?')) {
        $.ajax({
                method: "GET",
                url: $(this).attr('href'),
            })
            .done(function( result ) {
                if (type == 'category') {
                    getCategoryResults();
                } else {
                    getAdminResults();
                }
            });
    }
});


$(document).on('click', '.btn-form', function(event) {
    event.preventDefault();
    event.stopPropagation();

    var btnDelete = $('.btn-item-delete');

    if (btnDelete.is(event.target) || btnDelete.has(event.target).length > 0) {
        return false;
    }

    var type = '';
    if ($(this).attr('data-type') == 'category') {
        type = '-category';
    }

    var pageUrl = $(this).attr('href');

    $.ajax({
            method: "GET",
            url: pageUrl,
        })
        .done(function( result ) {
            $('#form-edit' + type).html(result);
            $('#form-collapse' + type).collapse('show');
            history.pushState({url: pageUrl}, 'View Details', pageUrl);
            goToByScroll('form-edit' + type);
            addSortable();
            addCkeditor();
        });
});

$(document).on('click', '.btn-form-cancel', function(event) {
    event.preventDefault();
    var type = '';
    if ($(this).attr('data-type') == 'category') {
        type = '-category';
    }
    $('#form-collapse' + type).collapse('hide');
});

$(document).on('click', '.btn-photo-upload', function(event) {
    event.preventDefault();
    var data = new FormData();
    var type = $(this).attr('data-type');

    $.each($('#input-file')[0].files, function(i, file) {
        data.append('photos['+i+']', file);
    });
    data.append('type', $(this).attr('data-type'));

    $.ajax({
        method: 'POST',
        url: '/admin/photos',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()}
    }).done(function(data){
        getPhotoList(data.type, data.id);
    });

});

$(document).on('click', '.btn-prices-upload', function(event) {
    event.preventDefault();
    var data = new FormData();

    $.each($('#input-file-price')[0].files, function(i, file) {
        data.append('prices', file);
    });
    showLoading();
    $.ajax({
        method: 'POST',
        url: '/admin/products/' + $(this).attr('data-product') + '/import',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()}
    }).done(function(data){
        $('#options-list-holder').html(data);
    }).always(function(){
        hideLoading();
    });

});

$(document).on('click', '.btn-prices-parse', function(event) {
    event.preventDefault();
    var data = new FormData();

    $.each($('#input-file-price')[0].files, function(i, file) {
        data.append('prices', file);
    });
    showLoading();
    $.ajax({
        method: 'POST',
        url: '/admin/products/parse',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-Token': $('input[name="_token"]').val()}
    }).done(function(data){
        $('#options-panel').show();
        $('#options-list-holder').html(data);
    }).always(function(){
        hideLoading();
    });

});

$(document).on('click', '.btn-add-parameter', function(event) {
    event.preventDefault();

    var type = $(this).attr('data-type');
    var buttonElement = $('#' + type +'-button-field').detach();

    $('#' + type +'-holder .hidden').removeClass('hidden');

    $('<div class="row"><div class="form-group col-md-8"></div></div>').appendTo('#' + type +'-holder');

    var rowCount = $('#' + type +'-holder .row').length;

    var $lastRow = $('#' + type +'-holder .row').last();
    $lastRow.html( $('#' + type +'-repeatable-row').html() );
    $lastRow.find('.col-remove').addClass('hidden');
    $lastRow.find('input').each(function () {
        $(this).val('').attr('name', $(this).attr('name').replace('new', 'new' + rowCount));
    });
    $lastRow.append(buttonElement);

});

$(document).on('change', '#colour_group_id_select', function(event) {
    event.preventDefault();

    var groupId = $(this).val();
    if (!groupId) {
        $('#colour_prices_field').html('');
        return;
    }

    showLoading();
    $.ajax({
        method: 'GET',
        url: '/admin/colourgroups/' + groupId + '/colours',
    }).done(function(data){
        $('#colour_prices_field').html(data);
    }).always(function(){
        hideLoading();
    });
});

$(document).on('change', '#ending_group_id_select', function(event) {
    event.preventDefault();

    var groupId = $(this).val();
    showLoading();
    $.ajax({
        method: 'GET',
        url: '/admin/endinggroups/' + groupId + '/endings',
    }).done(function(data){
        $('#ending_prices_field').html(data);
    }).always(function(){
        hideLoading();
    });
});

$(document).on('click', '.btn-delete-parameter', function(event) {
    event.preventDefault();
    $(this).closest('.row').remove();
});

$(document).on('click', '.btn-panel-show', function(event) {
    event.preventDefault();
    $(this).closest('.panel').find('.panel-body').show();
    $(this).removeClass('btn-success btn-panel-show').addClass('btn-warning btn-panel-hide').html('Hide');
});

$(document).on('click', '.btn-panel-hide', function(event) {
    event.preventDefault();
    $(this).closest('.panel').find('.panel-body').hide();
    $(this).removeClass('btn-warning btn-panel-hide').addClass('btn-success btn-panel-show').html('Show');
});

$(document).on('click', '.btn-update-order', function (event) {
    event.preventDefault();
    var entity = $(this).attr('data-target');
    var count = 0;
    var orders = [];

    $('[data-list="'+entity+'"] tr').each(function() {
        count++;
        orders.push({ id: $(this).attr('data-id'), index : count });
    });
    $('[data-list="'+entity+'"] .row-sortable').each(function() {
        count++;
        orders.push({ id: $(this).attr('data-id'), index : count });
    });
    showLoading();
    $.ajax({
        method: 'POST',
        url: '/admin/ordering',
        data: {
            entity: entity,
            orders: orders
        },
        headers: {'X-CSRF-Token': $('#global_csrf_token').val()}
    }).done(function(data){
        $('.'+entity+'-success').show();
    }).fail(function(data) {
        $('.'+entity+'-danger').show();
    }).always(function(){
        hideLoading();
    });
});

$(document).on('click', '#groupedColoursList .groupedColoursList__toggle', function (event) {
    $(event.target).next().find('.table').toggle();
});


$(document).ready(function(){
    getAdminResults();
    getCategoryResults();
    hideLoading();
    addSortable();
});

function addSortable() {
    $('.table-sortable').sortable({
        handle: '.drag-handle'
    })
}

function addCkeditor() {
    $('.ckeditor').each(function(e){
        CKEDITOR.replace(this.id, {
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;div',
            versionCheck: false,
        });
    });

    $('.ckeditorExtended').each(function(e){
        CKEDITOR.replace(this.id, {
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;div',
            versionCheck: false,
            allowedContent: true,
            height: '800px',
            indent: true,
            breakBeforeOpen: true,
            breakAfterOpen: false,
            breakBeforeClose: false,
            breakAfterClose: true
        });
    });
}
