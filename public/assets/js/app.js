$(document).ready(function () {
    var state = false;
    var sortASC = true;
    const plus = "glyphicon-plus";
    const minus = "glyphicon-minus";

    $('.glyphicon-resize-full').on('click', function () {
        var groupList = $('#group-list');
        var spanExpand = groupList.find('ul > li').find('span.expand');

        if (groupList.hasClass('roll-in')) {
            groupList.find('ul > li > ul').removeClass('hidden');
            groupList.addClass('roll-out').removeClass('roll-in');
            spanExpand.removeClass(plus).addClass(minus);
        }
        else {
            groupList.find('ul > li > ul').addClass('hidden');
            groupList.removeClass('roll-out').addClass('roll-in');
            spanExpand.removeClass(minus).addClass(plus);
        }
    });

    $('.group .glyphicon-plus').on('click',function () {
        var parent = $(this).parent('li');
        var group = parent.find('ul > li');
        var ul;
        var firstSpan = parent.find('span').first();

        if (group.length > 0) {
            ul = group.parent('ul');
            if (ul.first().hasClass('hidden')) {
                ul.children().not('li > ul').parent('ul').removeClass('hidden');
                ul.find('li').find('ul').addClass('hidden');
                firstSpan.removeClass(plus).addClass(minus);
            }
            else {
                ul.addClass('hidden');
                firstSpan.removeClass(minus).addClass(plus);
            }
        }
        else {
            ul = parent.find('ul');
            if (ul.hasClass('hidden')) {
                ul.removeClass('hidden');
                firstSpan.removeClass(plus).addClass(minus);
            }
            else {
                ul.addClass('hidden');
                firstSpan.removeClass(minus).addClass(plus);
            }
        }
    });

    $('.glyphicon-sort-by-alphabet').on('click', function() {
        var group = [];

        var parent = $(this).parent('li');
        var parentChildren = parent.find('ul').children();
        var hasParentChildren = parent.find('ul > li.group');

        if (sortASC) {
            if (hasParentChildren.length > 0) {
                //console.log(parent.find('ul').first());
                parentChildren = parent.find('ul').first().children();

                parentChildren.sort(function(a,b){
                    return a.dataset.name > b.dataset.name
                }).appendTo(parent.find('ul').first());
            }
            else {
                parentChildren.sort(function(a,b){
                    return a.dataset.name > b.dataset.name
                }).appendTo(parent.find('ul'));

            }

            parent.find('span').eq(1).removeClass('glyphicon-sort-by-alphabet-alt').addClass('glyphicon-sort-by-alphabet');
            sortASC = false;
        }
        else {
            if (hasParentChildren.length > 0) {
                parentChildren = parent.find('ul').first().children();

                parentChildren.sort(function(a,b){
                    return a.dataset.name < b.dataset.name
                }).appendTo(parent.find('ul').first());
            }
            else {
                parentChildren.sort(function(a,b){
                    return a.dataset.name < b.dataset.name
                }).appendTo(parent.find('ul'));
            }


            parent.find('span').eq(1).removeClass('glyphicon-sort-by-alphabet').addClass('glyphicon-sort-by-alphabet-alt');
            sortASC = true;
        }

    });

    $('#measures tr a').click('on', function () {
        var row = $(this).closest('tr');
        var td = row.find('td');

        var code = td.first().text();
        var name = td.first().next().text();
        var measure = {code: code, name: name};

        var modal = $('#modal-edit-measure');

        modal.find('#short_name').val(code);   //set code value to input
        modal.find('#name').val(name);   //set name value to input
        modal.attr('data-name', code);

        var updateURL = modal.find('form').attr('action');      //find path
        modal.find('form').attr('action', updateURL + '/' + code);  //set updated measures to the path route

    });

    //$('#group-list').find('ul').addClass('hide');  //rollin all subgroups

    function setUpdatePath(modal, id) {
        var updateURL = modal.find('form').attr('action');      //find path
        modal.find('form').attr('action', updateURL + '/' + id);  //set updated measures to the path route

    }

    $('.group a').click(function () {
        var parent = $(this).closest('li');
        var name = $(this).text();
        var id = parent.attr('id');
        var modal = $('#change-group-modal');
        modal.find('#name').val(name);

        setUpdatePath(modal, id);
    });

    $('#materials a').click(function () {
        var h4 = $(this).find('h4');
        var p = $(this).find('p');
        var modal = $('#modal-update-material');

        var name = h4.find('strong').text();
        var measure = h4.find('small').attr('id');
        var code = p.find('em').text();
        var material_group = p.find('italic').attr('id');

        setUpdatePath(modal, code);

        modal.find('#code').val(code);
        modal.find('#name').val(name);
        modal.find('#measure').val(measure);
        modal.find('#group').val(material_group);
    });

    $('.materials').on('click', 'li', function () {
        var modal = $('#modal-update-material');
        var name = $(this).text();
        var measure = $(this).data('measure-id');
        var code = $(this).data('code');
        var material_group = $(this).data('material_group-id');

        setUpdatePath(modal, code);

        modal.find('#code').val(code);
        modal.find('#name').val(name);
        modal.find('#measure').val(measure);
        modal.find('#group').val(material_group);

        modal.modal('show');
    });

});