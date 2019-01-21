$(document).ready(function() {
    var itemsTable = $('#rtr-items-table');
    var currentPageValue = $('#rtr-current-page');
    var filterLink = $("#rtr-filter-link");
    var filterForm = $('#rtr-filter-form');
    var itemsContent = $('#rtr-items-content');
    var paginatorBar = $('#rtr-paginator');
    var listFilterInput = $("input[id^='rtr-input-']:not('#rtr-input-active')");
    var listFieldSort = $("[id^='rtr-sort-']");
    var activeInput = $("#rtr-input-active");
    var refreshButton = $('#rtr-refresh-btn');
    var changePageSizeInput = $('#rtr-page-size');
    var changePageSizeForm = $('#rtr-page-size-form');

    // Show loading icon
    function showLoadingIcon()
    {
        $("#loading-icon").css("display", "block");
        setTimeout(function() {
            $("#loading-icon").css("display", "none");
        }, 500);
    }

    // Call Ajax paginate
    function ajaxPaginate() {
        $('a.page-link').click(function() {
            $('html, body').animate({
                scrollTop: itemsTable.offset().top
            }, 50);

            // Get page to redirect
            page = $(this).text();
            currentPageValue.val(page);

            filterAjax();
        });
    }

    // Ajax function get items after filtering
    function filterAjax() {
        $.ajax({
            method: "POST",
            url: filterLink.val(),
            data: filterForm.serialize()
        }).done(function(array) {
            // Remove all contents in tbody tag before appending new contents
            itemsContent.children().remove();
            paginatorBar.children().remove();

            // Get data send from Controller
            array = JSON.parse(array);
            var data = array['items'];
            var numberPage = array['numberPage'];

            if(array['currentPage'] == null || numberPage == 1)
                currentPage = 1;
            else
                currentPage = array['currentPage'];
            showLoadingIcon();

            // Variable number to count the arrangement of product when paginating
            var number = (currentPage - 1) * array['pageSize'];

            for(var i = 0; i < data.length; i++) {
                var index = i + 1 + number;
                var editUrl = filterLink.val() +`/edit/`+ data[i].id;
                itemsContent.append(renderItemRow(index, data[i], editUrl));
            }

            // Append paginator
            for(var i = 0; i < numberPage; i++) {
                paginatorBar.append(`
                        <li class="page-item">
                            <a class="page-link">` + (i + 1) + `</a>
                        </li>	
                `);
            }

            // call Ajax paginate
            ajaxPaginate();

            // Set active current paginate page
            $( ".page-link:contains('"+ currentPage +"')" ).filter(function() {
                return $(this).text() == currentPage;
            }).parent().addClass('active');
        });
    }

    function renderItemRow(index, dataArray, editUrl, removeUrl = null)
    {
        var content = '';
        var removeBtn = '';

        for(var key in dataArray)
        {
            if(key == 'id')
                content += '';
            else if(key != 'active')
                content += `<td>`+ dataArray[key] +`</td>`;
            else
                content += `<td class="text-center">`+ renderActiveLabel(dataArray[key]) +`</td>`;
        }

        if(removeUrl)
            removeBtn = `<a href="`+ removeUrl +`" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>`;
        return `
            <tr>
                <td>`+ index +`</td>
                `+ content +`
                <td class="text-center">
                     <a href="`+ editUrl +`" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                     `+ removeBtn +`
                </td>
            </tr>
        `;
    }

    function renderActiveLabel(isActive)
    {
        if(isActive == 1)
            return '<span class="label label-success"> Active </span>';
        else return '<span class="label label-danger"> Inactive </span>';
    }

    // Refresh all filter input
    refreshButton.on('click', function() {
        $('#rtr-filter-form input').not('input[name="_token"]').val('');
        listFieldSort
            .removeClass('glyphicon-sort-by-attributes-alt')
            .addClass(' glyphicon-sort-by-attributes')
            .children('input').val('asc')

        filterAjax();
    });

    // Call Ajax function when type in input
    listFilterInput.on('keyup', function() {
        currentPageValue.val(1);
        filterAjax();
    });

    // Change active select box
    activeInput.on('change', function() {
        currentPageValue.val(1);
        filterAjax();
    });

    // call Ajax function to sort
    listFieldSort.on('click', function() {
        // Change sort icon after clicking
        $(this).toggleClass('glyphicon-sort-by-attributes glyphicon-sort-by-attributes-alt');
        if($(this).hasClass('glyphicon-sort-by-attributes'))
            $(this).children('input').val('asc');
        else
            $(this).children('input').val('desc');
        filterAjax();
    });

    // Change page size
    changePageSizeInput.on('change', function() {
        $.get(
            changePageSizeForm.attr('action'),
            changePageSizeForm.serialize(),
            function (data) {
                location.reload();
            }
        );
    });

    // Call Ajax paginate when click paginator
    ajaxPaginate();
});