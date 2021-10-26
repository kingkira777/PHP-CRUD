
window.app = {

    //Initialize Ajax for shorthand uses
    ajaxCb : (url, data, fn) => {
        $.ajax({
            url : url,
            data : data,
            type : 'POST',
            success: fn
        });
    },

    // Set Form values
    setFormValues : (form,formData) => {
        if(formData.length != 0){
            for(var i in form){
                for(var x in formData){
                    if(form[i].name === x){
                        form[i].value = formData[x];
                    }
                }
            }
        }
    },

    //Serialize form data from DOM(HTML)
    serializeForm : (_fromData) => {
        var formData = {};
        for(var i in _fromData){
            if(_fromData[i].value != undefined && _fromData[i].name != ""){
                formData[_fromData[i].name] = _fromData[i].value;
            }
        }
        return formData;
    }

};      