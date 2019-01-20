$(document).ready(function() {
    // call Ajax paginate
    function ajaxPaginate() {
        $('a.page-link').click(function() {

            $('html, body').animate({
                scrollTop: $('#user-table').offset().top
            }, 50);

            // Get page to redirect
            page = $(this).text();
            $('#current-page').val(page);

            filterAjax();
        });
    }

    // Ajax function get products after filtering
    function filterAjax() {
        $.ajax({
            method: "POST",
            url: $("#filter-link").val(),
            data: $('#filterForm').serialize()
        }).done(function(array) {

            // Remove all contents in tbody tag before appending new contents
            $('#users-content').children().remove();
            $('#paginator').children().remove();

            // Get data send from Controller
            array = JSON.parse(array);
            data = array['users'];
            numberPage = array['numberPage'];
            //search = array['description'];
            if(array['currentPage'] == null || numberPage == 1) {
                currentPage = 1;
            }
            else {
                currentPage = array['currentPage'];
            }

            // Show loading icon
//                    $("#loading-icon").css("display", "block");
//                    setTimeout(function() {
//                        $("#loading-icon").css("display", "none");
//                    }, 500);

            // Variable number to count the arrangement of product when paginating
            number = (currentPage - 1) * array['pageSize'];
            for(i = 0; i < data.length; i++) {
                if(data[i].active == 1)
                    status = '<span class="label label-success"> Active </span>';
                else status = '<span class="label label-danger"> Inactive </span>';
                $('#users-content').append(`
                            <tr>
                                 <td>`+ (i + 1 + number) +`</td>
                                 <td>`+ data[i].name +`</td>
                                 <td>`+ data[i].username +`</td>
                                 <td>`+ data[i].email +`</td>
                                 <td>`+ data[i].phone +`</td>
                                 <td class="text-center">`+ status +`</td>
                                 <td class="text-center">
                                      <a href="`+ $("#filter-link").val() +`/edit/`+ data[i].id +`" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                 </td>
                            </tr>
                        `);
            }

            // Change color searching keyword
//                    $(".search-description:contains('"+search+"')").each(function () {
//                        var text = new RegExp(search,'gim');
//                        $(this).html(
//                            $(this).text().replace(text, "<span style='background-color: #d9534f; color: #fff'>"+search+"</span>")
//                        );
//                    });

            // Append paginator
            for(i = 0; i < numberPage; i++) {
                $('#paginator').append(`
                    <li class="page-item">
                        <a class="page-link">` + (i + 1) + `</a>
                    </li>
                `);
            }

            // call Ajax paginate
            ajaxPaginate();

            // Set active current paginate page
            $( ".page-link:contains('"+currentPage+"')" ).filter(function() {
                return $(this).text() == currentPage;
            }).parent().addClass('active');
        });

    }

    // Refresh all filter input
    $('#refreshBtn').on('click', function() {
        $('#filterForm input').not('input[name="_token"]').val('');
        $('#name-sort, #username-sort, #email-sort')
            .removeClass('glyphicon-sort-by-attributes-alt')
            .addClass(' glyphicon-sort-by-attributes')
            .children('input').val('asc')

        filterAjax();
    });

    // Call Ajax function when type in input
    $('#nameInput, #usernameInput, #emailInput, #phoneInput').on('keyup', function() {
        $('#current-page').val(1);
        filterAjax();
    });

    // Call Ajax paginate when click paginator
    ajaxPaginate();

    // Change active select box
    $("#statusInput").on('change', function() {
        $('#current-page').val(1);
        filterAjax();
    });

    // call Ajax function to sort
    $('#name-sort, #username-sort, #email-sort').on('click', function() {
        // Change sort icon after clicking
        $(this).toggleClass('glyphicon-sort-by-attributes glyphicon-sort-by-attributes-alt');
        if($(this).hasClass('glyphicon-sort-by-attributes')) {
            $(this).children('input').val('asc');
        }
        else {
            $(this).children('input').val('desc');
        }
        filterAjax();
    });

});