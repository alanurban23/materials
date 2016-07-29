$(document).ready(function () {
    var state = false;

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

    function setUpdatePath(modal, name) {
        var updateURL = modal.find('form').attr('action');      //find path
        modal.find('form').attr('action', updateURL + '/' + name);  //set updated measures to the path route

    }

    $('.group a').click(function () {
        var parent = $(this).closest('li');
        var name = $(this).text();
        var id = parent.attr('id');
        var modal = $('#change-group-modal').find('#name').val(name);

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



});