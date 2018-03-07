$(function () {
    $("#jsGrid").jsGrid({
        height: "400px",
        width: "100%",
        inserting: true,
        editing: true,
        sorting: false,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,

        controller: {
            loadData: function() {
                return $.ajax({
                    type: "POST",
                    url: "/Admin/loadData"
                });
            },
            insertItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "/Admin/insertItem",
                    data: item
                });
            },
            updateItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "/Admin/updateItem",
                    data: item
                });
            },
            deleteItem: function(item) {
                return $.ajax({
                    type: "POST",
                    url: "/Admin/deleteItem",
                    data: item
                });
            }
        },

        fields: [
            {name: "login", title: "Login:", type: "text", width: 150},
            {name: "password", title: "Password:", type: "text", width: 150},
            {name: "fullname", title: "Full name:", type: "text", width: 300},
            {name: "email", title: "EMail:", type: "text", width: 150},
            {name: "phone", title: "Phone number:", type: "text", width: 150},
            {type: "control"}
        ]
    });
});