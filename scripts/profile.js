    const contentNode = document.querySelector(".content");
    
    let activeTab = $('#watch');

    $('.status-menu li').on('click', function(){
        getResults($(this).prop('id'));
        activeTab.removeClass('active-tab');
        $(this).addClass('active-tab');
        activeTab = $(this);
    });

    function getResults(status) {
        $.ajax({
            method: "GET",
            data: {
                status: status
            },
            url: "watch_list.php",
            dateType: 'json',
            success: function(response) {
                contentNode.innerHTML = "";
                let list = createList(response);
                console.log(response);
                list.forEach((div) => contentNode.append(div));
            }
        });
    }
    
    function createList(response) {
        let data = JSON.parse(response);
        let list = [];
        for (let i = 0; i < data.length; i++) {
            let div = document.createElement('div');
            div.setAttribute("class", "title");
            let a = document.createElement('a');
            a.setAttribute('href', '/item.php?id='+data[i].id);
            a.innerHTML = data[i].title;
            div.appendChild(a);
            list.push(div);
        }
        return list;
    }
