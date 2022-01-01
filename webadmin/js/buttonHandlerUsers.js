//When the document is ready
$(document).ready(function () {
    //Event when button sidebar clicked, trigger sidebar collapse
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
    //Event when btnModal clicked, trigger modal create
    $('#btnModal').on('click', function () {
        $('#createModal').appendTo(".modal-show");
        document.getElementById('modal-body').innerHTML = "<object id='modal-container' width='100%' height='200' data='contents/forms/users/createUserForm.php'> </object>";
    })
    //Event when btnEdit clicked, trigger modal edit
    var btnEdit = document.getElementsByClassName('btn-edit-user')
    for (var i = 0; i < btnEdit.length; i++) {
        btnEdit[i].onclick = function (){
            $('#createModal').appendTo("body");
            document.getElementById('labelModal').innerText = "Edit User";
            document.getElementById('modal-body').innerHTML = "<object id='modal-container' width='100%' height='200' data='contents/forms/users/updateUserForm.php?id="+this.name+"'> </object>";

        }
    }
    //Event when btnDelete clicked, trigger confirmation window
    var btnDelete = document.getElementsByClassName('btn-delete-user')
    for (var i = 0; i < btnDelete.length; i++) {
        btnDelete[i].onclick = function (){
            var answer = window.confirm("Delete Data ?")
            if (answer){
                location.href = "handlers/users/userHandler.php?action=delete&id="+this.name+"";
            }else{

            }
        }
    }
    //Event when btnSearch clicked, add parameter to location
    var btnSearch = document.getElementsByClassName('btn-search-user')
    for (var i = 0; i < btnSearch.length; i++) {
        btnSearch[i].onclick = function (){
            $param = document.getElementById('user-param').value
            location.href = "index.php?page=users&parameter="+ $param;
        }
    }
});