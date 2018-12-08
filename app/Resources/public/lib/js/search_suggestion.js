$(document).ready(function() {
    //$('#search input[name="filter_name"]').attr("x-webkit-speech", "x-webkit-speech")
    $('#search input[name="search"]').autocomplete({
        appendTo: $("#searchbox"),
        source: function(request, response) {
            $.ajax({
                url: 'index.php?route=extension/module/search_suggestion/ajax',
                dataType: 'json',
                data: {
                    keyword: request.term
                },
                success: function(json) {
                    response($.map(json, function(item) {
                        return {
                            fields: item.fields,
                            value: item.href
                        }
                    }));
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            if (ui.item.value == "") {
                return false;
            } else {
                location.href = ui.item.value;
                return fse;
            }
        },
        open: function() {
            $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
        },
        close: function() {
            $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
        },
        focus: function(event, ui) {
            $('#search input[name="filter_name"]').val(ui.item.label);
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        var elements = [];
        $.each(item.fields, function(field_name, field) {
            if (field != undefined && field[field_name] != undefined && field[field_name]) {
                var field_html = '';
                if (field_name == 'price') {
                    if (field.special) {
                        field_html = '<span class="price-old">' + field.price + '</span><span class="price-new">' + field.special + '</span>';
                    } else {
                        field_html = field.price;
                    }
                } else {
                    field_html = field[field_name];
                }
                if (field.label != undefined && field.label.show != undefined && field.label.show) {
                    field_html = '<span class="label">' + field.label.label + '</span>' + field_html;
                }
                if (field.location != undefined && field.location == 'inline') {
                    field_html = '<span class="' + field_name + '">' + field_html + '</span>';
                } else {
                    field_html = '<div class="' + field_name + '">' + field_html + '</div>';
                }
                elements.push({
                    sort: field.sort,
                    html: field_html
                });
            }
        });
        // sort
        elements.sort(function(a, b) {
            return a.sort - b.sort
        });
        // implode
        var elements_html = '';
        $.each(elements, function(index, element) {
            if (element != undefined) {
                elements_html = elements_html + element.html;
            }
        });
        return $("<li></li>")
            .data("item.autocomplete", item)
            .append('<a class="search-suggestion">' + elements_html + '</a>')
            .appendTo(ul);
    };
});