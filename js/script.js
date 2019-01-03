var IMG_BASE_URL = 'https://2dotask.com/mac-world/admin/v1/';

function mouseOut(ele) {
    ele.src = $(ele).data('normal');
}

function mouseEnter(ele) {
    ele.src = $(ele).data('hover');
}

function renderCategory(id) {
    $.ajax({
        url: "admin/v1/get_row_where/categories/Categoyr/ID=" + id,
        success: function (result) {
            $('#category_name_' + id).html(result.result.data.name);
            $('#category_image_' + id).attr('src', IMG_BASE_URL + result.result.data.image);
            $('#category_description_' + id).html(result.result.data.description);
        }
    });
}

function renderSubCategory(id) {
    $.ajax({
        url: "admin/v1/get_row_where/sub_categories/Sub Categoyr/ID=" + id,
        success: function (result) {
            $('#category_name_' + result.result.data.category_id).html(result.result.data.title);
            $('#category_image_' + result.result.data.category_id).attr('src', IMG_BASE_URL + result.result.data.image);
            $('#category_description_' + result.result.data.category_id).html(result.result.data.description);
        }
    });
}