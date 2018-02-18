//List ids for fields to edit
var varArray = ['id', 'login', 'pass', 'name', 'lastname'];
var requiredFields = ['login'];

//Variables
var rowsPerPage = 5;
var offset = 0;
var totalPages;
var lastRecID = rowsPerPage + 1;

//TBD End

//Get records
function getRecords(start, num){
    $.ajax({
        method: 'POST',
        url: 'get',
        data: {startRec: start,
               numRecs: num},
        success: function(data){
            $('#table').replaceWith(data);
         }
    });
}

function getPageNum(){
        $.ajax({
        method: 'POST',
        url: 'getCount',
        data:{},
        success: function(data){
            var pageNum = Math.ceil(parseFloat(data / rowsPerPage));
            showPaginationNav(pageNum);
         }
    });
}

//Pagination
function showPaginationNav(totalPages){
    //Destroy if exists
    $('#pagination').twbsPagination('destroy');
    $('#pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: 5,
        prev: '<<',
        next: '>>',
        onPageClick: function (event, page) {
            offset = (page - 1) * rowsPerPage;
            getRecords(offset,rowsPerPage); 
        }
    });
}

//Load records on page load
$(document).ready(getRecords(offset,rowsPerPage));
getPageNum();

//Load records on number of rows per page reset
function changeRowsPerPage() {
    rowsPerPage = document.getElementById("page-num").value;
    getRecords(offset,rowsPerPage);
    getPageNum();
}

//New records
function addRecord(){    
    var fieldsHtml = '<tr id="' + lastRecID + '"><td><form method="post" action="add" id="form-' + lastRecID + '"></form></td>';
    
    for (var i = 1; i < varArray.length; i++) {
        fieldsHtml += '<td id="' + varArray[i] + '-' + lastRecID + '"><input type="text" name="' + varArray[i] + '" class="form-control" form="form-' + lastRecID + '"></td>';
    }
    
    var buttonsHtml = '<td><button type="submit" class="btn btn-outline-success" id="save-' + lastRecID + '" onclick="saveRecord(this.id)"><img src="assets/img/check-square.svg" width=20/></button></td><td><button type="button" class="btn btn-outline-secondary" id="cancel-' + lastRecID + '" onclick="cancelNewRecord(this.id)"><img src="assets/img/x-square.svg" width=20/></button></td></tr>';
    
    $('#table').prepend(fieldsHtml + buttonsHtml);
    lastRecID += 1;
}

function saveRecord(clickedId){
    var recID = clickedId.replace( /^\D+/g, '');
    var form = $('#form-' + recID);
    var action = $(form).attr('action');
    
    var fields = fieldsNotEmpty(requiredFields, recID);
//    console.log(fields);
    if(fields.length == 0) {
        $.ajax({
        method: 'POST',
        url: action,
        data: form.serialize(),
        success: function(data){
            
            if (data.indexOf('error') >= 0) {
                //Pass data to error modal dialog (Bootstrap docs)
                $('#errorModal').modal();
                $('#errorModal').find('.modal-body').html('<p>Ошибка: ' + data + '</p>');
            }
            else {
                changeRecordOnSave(clickedId);
                console.log("Результат сохранения: " + data);
                location.reload();
                }
         }
    });
    }
    
    else {
        for(var i = 0; i < fields.length; i++){
            $('#' + fields[i] + '-' + recID).find('input').addClass('border-danger');
        }
    }
}

function cancelNewRecord(clickedId){
    var recID = clickedId.replace( /^\D+/g, '');
    $('#' + recID).replaceWith('');
}

//Existing records
function editRecord(clickedId){
    
    var recID = clickedId.replace( /^\D+/g, '');
    
    //Generate variables with id values (e.g. idID = id-2)
    for (var i = 0; i < varArray.length; i++) {
        window[varArray[i] + 'ID'] = varArray[i] + '-' + recID;
        //console.log(window[varArray[i] + 'ID']);
    }
    
    //Make fields editable
    for (var i = 0; i < varArray.length; i++) {
        window[varArray[i]] = $('#' + window[varArray[i] + 'ID']).html();
        
        if (i == 0) {
            $('#' + window[varArray[i] + 'ID']).html('<input readonly type="text" class="form-control-plaintext" value="' + window[varArray[i]] + '" data-old="' + window[varArray[i]] + '" form="form-' + recID + '" name="' + [varArray[i]] +'"/>');
            }
        if (i > 0) {
            $('#' + window[varArray[i] + 'ID']).html('<input type="text" class="form-control" value="' + window[varArray[i]] + '" data-old="' + window[varArray[i]] + '" form="form-' + recID + '" name="' + [varArray[i]] +'"/>');
            }
    }
    
    //Change buttons
    changeButtonsToEdit(recID);
}

function changeRecordOnSave(clickedId) {
    //Make fields non-editable
    var recID = clickedId.replace( /^\D+/g, '');
    
    for (var i = 0; i < varArray.length; i++) {
        var val = $('#' + varArray[i] + '-' + recID).find('input').val();
        
        $('#' + varArray[i] + '-' + recID).replaceWith('<td class="align-middle" id="' + varArray[i] + '-' + recID + '" data-value="' + val + '">' + val + '</td>');     
    }
    
    //Change buttons
    changeButtonsToNormal(recID);
}

function cancelRecord(clickedId) {
    //Make fields non-editable
    var recID = clickedId.replace( /^\D+/g, '');
    
    for (var i = 0; i < varArray.length; i++) {
        var dataOld = $('#' + varArray[i] + '-' + recID).children('input').attr('data-old');
        
        $('#' + varArray[i] + '-' + recID).replaceWith('<td class="align-middle" id="' + varArray[i] + '-' + recID + '" data-value="' + dataOld + '">' + dataOld + '</td>'); 
    }
    
    //Change buttons
    changeButtonsToNormal(recID);
}

function changeButtonsToNormal(recID){
    var login = $('#login-' + recID).html();
        
        //Change edit button
        $('#save-' + recID).replaceWith('<button type="button" class="btn btn-outline-warning" id="edit-' + recID + '" onclick="editRecord(this.id)"><img src="assets/img/edit.svg" width=20/></button>');
        
        //Change cancel button
        $('#cancel-' + recID).replaceWith('<button type="button" id="delete-' + recID + '" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-login="' + login + '" data-id="' + recID + '"><img src="assets/img/trash.svg" width=20/></button>');
}

function changeButtonsToEdit(recID){
    
    //Change edit button
    $('#edit-' + recID).replaceWith('<button type="button" class="btn btn-outline-success" id="save-' + recID + '" onclick="saveRecord(this.id)"><img src="assets/img/check-square.svg" width=20/></button>');
    
    //Change delete button
    $('#delete-' + recID).replaceWith('<button type="button" class="btn btn-outline-secondary" id="cancel-' + recID + '" onclick="cancelRecord(this.id)"><img src="assets/img/x-square.svg" width=20/></button>');
}

function deleteRecord(clickedId){    
    //console.log(clickedId);
    $.ajax({
        method: 'POST',
        url: 'delete',
        data: {'id': clickedId},
        success: function(data){
            
            if (data.indexOf('error') >= 0) {
                //Pass data to error modal dialog (Bootstrap docs)
                $('#errorModal').modal();
                $('#errorModal').find('.modal-body').html('<p>Не могу удалить запись: ' + data + '</p>');
            }
            else {
                $('#' + clickedId).replaceWith('');
                $('#deleteModal').modal('hide');
                console.log("Результат удаления: " + data);
                }
         }
    });
    
}

//Check if input fields are empty (auxiliary)
function fieldsNotEmpty(fields, id){
    var emptyFieldsArray = [];
    for (var i = 0; i < fields.length; i++) {
        var val = $('#' + fields[i] + '-' + id).find('input').val();
        if (val == '') {
            emptyFieldsArray.push(fields[i]);
            }
    }
    
    return emptyFieldsArray;
    
}

//Pass data to the delete modal dialog (Bootstrap docs)
$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var recID = button.data('id'); 
    var user = $('#login-' + recID).html();
    var modal = $(this);
    
    modal.find('.modal-body').html('<p>Вы уверены, что хотите удалить пользователя ' + user + '?</p>');
    modal.find('.btn-danger').attr('id', recID);
});

