<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap-sortable.css">
    
    <title>Grid</title>
  </head>
  
  <body>
    <!-- Navigation Bar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <span class="navbar-brand mb-0">Grid</span>
     </nav>
    
    <!-- Content -->
    <main role="main" class="container">
         <h2 class="mt-5">Пользователи</h2>
         <p class="lead">Управление учетными записями пользователей</p>
          
         <div>
               <div class="row">
                    <div class="col-sm nopadding">
                        <button type="button" class="btn btn-success" onclick="addRecord()">Новая запись</button>
                    </div>
    
           <!-- Number of rows dropdown-->
               <div class="col-sm col-md-auto">
                  <p class="float-left m-2">Записей на странице:</p>
                   <select class="form-control mb-3 rows-per-page" id="page-num" onchange="changeRowsPerPage()">
                      <option>5</option>
                      <option>10</option>
                      <option>20</option>
                    </select>
                    </div>
                  </div>
        </div>
       
    <!-- Table -->
        <table class="table table-striped sortable" id="user-table">
               <thead>
                 <tr>
                     <th scope="col">#</th>
                     <th scope="col">Логин</th>
                     <th scope="col">Пароль</th>
                     <th scope="col">Имя</th>
                     <th scope="col">Фамилия</th>
                     <th scope="col" width="150px" data-defaultsort="disabled">Редактировать</th>
                     <th scope="col" width="150px" data-defaultsort="disabled">Удалить</th>
                </tr>
              </thead>
              <tbody id="table">    

              </tbody>
        </table>
            
    <!--Pagination-->
        <nav>
               <ul class="pagination" id="pagination"></ul>
        </nav>
            
    <!--End of table-->
    </main>
    
    <!--Delete modal dialog-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Удалить запись</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
            <button type="button" class="btn btn-danger" onclick="deleteRecord(this.id)">Да</button>
          </div>
        </div>
      </div>
    </div>
    
    <!--Error modal dialog-->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ошибка</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- JavaScript -->
    <script>
    //List ids for fields to edit
        var varArray = ['login', 'pass', 'name', 'lastname'];
        var requiredFields = ['login'];  
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-sortable.js"></script>
    <script src="assets/js/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/custom.js"></script>
    
  </body>
</html>