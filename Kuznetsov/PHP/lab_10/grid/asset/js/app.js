$(function () {
    
    var page = 1;
    
    dbRequest('getUsers', page);

    $('.admin_page').on('click', 'button', function (e) {
        if($(this).attr('class') === 'btn pages') {
            page = $(this).text();
            dbRequest('getUsers', page);
        }
    });

    $('.users_table').on('click', 'button', function (e) {
        
        switch($(this).text()) {
//редактирование по кнопке 
            case 'Edit':
                $(this).parent().siblings('td:not(:eq(0))').each(function() {
                    var val = $(this).text();
                    $(this).html('<input type="text" value="' + val + '">');
                });
                $(this).text('Save');
                $(this).next().text('Cancel');
                break;
//удаление
            case 'Delete':
                var id = $(this).parent().siblings('td:first').text();
                var name = $(this).parent().siblings('td:eq(1)').text();
                var question = confirm('Удалить пользователя ' + name + '?');
                if(question) {
                    var deleting = dbRequest('deleteUsers', page, id);
                    if(deleting !== false) {
                        alert('Удален пользователь ' + name);
                    }
                } else {
                    return;
                }
                break;
//добавление
            case 'Add':
                var name = $('#name').val();
                var login = $('#login').val();
                var age = $('#age').val();
                var email = $('#email').val();
                if(empty(name) || empty(login) || empty(age) || empty(email)) {
                    alert('Заполните поля для добавления пользователя');
                } else {
                    var adding = dbRequest('addUsers', page, id, name, login, age, email);
                    $('#name').val('');
                    $('#login').val('');
                    $('#age').val('');
                    $('#email').val('');
                    if(adding !== false) {
                        alert('Добавлен пользователь ' + name);
                    }
                }
                break;
//сохранение изменений
            case 'Save':
                var id = $(this).parent().siblings('td:first').text();
                var name = $(this).parent().siblings('td:eq(1)').children().val();
                var login = $(this).parent().siblings('td:eq(2)').children().val();
                var age = $(this).parent().siblings('td:eq(3)').children().val();
                var email = $(this).parent().siblings('td:eq(4)').children().val();

                if(empty(name) || empty(login) || empty(age) || empty(email)) {
                    alert('Заполните поля для изменения пользователя');
                } else {
                    var question = confirm('Сохранить изменения?');
                    if(question) {
                        dbRequest('updateUser', page, id, name, login, age, email);
                    }
                }
                break;
//отмена изменений
            case 'Cancel':
                var question = confirm('Отменить изменения?');
                if(question) {
                    dbRequest('getUsers', page, id, name, login, age, email);
                }
                break;
        }

    });
    
//Общая функция------------------------------------------------------------------------------
    function dbRequest(action, page, id=null, n=null, l=null, a=null, e=null) {
        var request = $.ajax({
            method: "POST",
            url: "../backend/controller/controller.php",
            data: {
                route: action,
                id: id,
                name: n,
                login: l,
                age: a,
                email: e,
                page: page
            },
            dataType: "json"
        });
        request.done(function (msg) {

            var result = '';
            for(var i=0; i<msg.length-1; i++) {
                result += '<tr class="rows"><td>'+msg[i]['id_users']
                    +'</td><td>'+msg[i]['name']
                    +'</td><td>'+msg[i]['login']
                    +'</td><td>'+msg[i]['age']
                    +'</td><td>'+msg[i]['email']
                    +'</td><td><button>Edit</button><button>Delete</button></td></tr>';
            }
            
            $('.users_table tr.rows').remove();
            $('.btn').remove();
            $('.admin_page tr.th').after(result);
            
            if(msg[msg.length-1]['count']>10) {
                for(var i=1; i<(msg[msg.length-1]['count']/10)+1; i++) {
                    if(i === +page) {
                        $('.admin_page').append('<button class="btn">>' + i + '<</button>');
                    } else {
                        //console.log('i' + i + 'page' + page);
                        $('.admin_page').append('<button class="btn pages">' + i +'</button>');
                    }
                }
            }  
        });
        request.fail(function (jqXHR, textStatus) {
            console.log('Request failed: ' + textStatus);
        });
    }

//емпти
    function empty( mixed_var ) {
        return ( mixed_var === "" || mixed_var === 0 || mixed_var === "0" || mixed_var === null || mixed_var === false  || mixed_var.length === 0);
    }
});




























