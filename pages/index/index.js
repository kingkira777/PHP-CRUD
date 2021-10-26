"use strict";



var Index = function(){
    var url = "pages/index/index.class.php";
    var id = '';

    //Initialize Index Page
    let _initIndex = () => {
        console.log("Index Page");
    };

    //DELETE 
    let _btnEditDelete = () => {


        //DELETE
        $("#infoTable").on("click",".delete",(e)=>{
            var xid = $(e.target).attr("data-id");
            var data = {
                deleteuser : "delteusers",
                id : xid
            };
            app.ajaxCb(url,data,(e)=>{
                alert(e);
                _userList();
            });
        }); 

        
        //EDIT
        $("#infoTable").on("click",".edit",(e)=>{
            var xid = $(e.target).attr("data-id");
            var form = document.getElementById("infoFrom").elements;
            var data = {
                edituses : "edituser",
                id : xid
            };
            app.ajaxCb(url,data,(e)=>{
                var formData = JSON.parse(e);
                id = xid;
                app.setFormValues(form,formData);
            });
        }); 


    };



    // USER LIST
    let _userList = () => {
        var data  = {
            guserlist : "getuserlist"
        };
        
        app.ajaxCb(url,data,(e)=>{
            var data = JSON.parse(e);
            _tableInfo(data);
        });
    };


    // SAVE UPDATE
    let _saveUpdate = () => {
        $("#infoFrom").submit(e=>{
            var formId = $(e.target).attr("id");
            var formEl = document.getElementById(formId).elements;
            var formData = app.serializeForm(formEl);

            if(formData.lastname === ""){
                alert("Lastname is Empty!");
            }else{
                var data = {
                    saveupdate : "saveUpadteinfo",
                    id : id,
                    formdata : JSON.stringify(formData)
                };

                app.ajaxCb(url,data,(e)=>{
                    alert(e);
                    _userList();
                    id = '';
                    $("#infoFrom").trigger("reset");
                });
            }
            return e.preventDefault();
        });
    };


    // USER INFO TABLE
    let _tableInfo = (data) => {
        $("#infoTable").DataTable({
            data : data,
            columns : [
                {data : 'lastname', sTitle : "Lastname"},
                {data : 'firstname', sTitle : "Firstname"},
                {data : 'dob', sTitle : "DOB"},
                {data : null, sTitle : "Options",render:(e)=>{
                    return `
                        <a data-id="`+e.id+`" role="button" class="edit">Edit</a>
                        <a data-id="`+e.id+`" role="button" class="delete">Delete</a>
                    `;
                }},
            ],
            bDestroy : true
        });
    };


    return {
        initIndex : () => {
            _initIndex();
            _userList();
            _saveUpdate();
            _btnEditDelete();
        }
    }
}();


document.addEventListener("DOMContentLoaded",()=>{
    Index.initIndex();
});