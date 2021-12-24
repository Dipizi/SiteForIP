window.onload = () => {
    $.ajax({
        method: "GET",
        data: {
            id: GetURLParameter('id')
        },
        url: "get_status.php",
        dateType: 'json',
        success: function(response) {
            if (response) {
                activeTab = $('#'+response);
                activeTab.addClass('active-tab');
            }
        }
    })
}

let activeTab = $('#watch');

$('.menu li').on('click', function(){
    console.log('test');
    changeStatus($(this).prop('id'));
    activeTab.removeClass('active-tab');
    $(this).addClass('active-tab');
    activeTab = $(this);
});

function GetURLParameter(sParam) {
    let sPageURL = window.location.search.substring(1);
    let sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        let sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
            return decodeURIComponent(sParameterName[1]);
    }
    return null;
}

function changeStatus(status, id) {
    $.ajax({
        method: "POST",
        data: {
            status: status,
            id: GetURLParameter('id')
        },
        url: "watch_list.php"
    });
}