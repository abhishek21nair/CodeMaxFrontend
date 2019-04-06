app.controller('manufactureController', function($scope, $http, API_URL) {

     

    $scope.toggle = function(modalstate, id) {
        console.log("inside");
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + 'employees/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.employee = response;
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }



    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "manufacture";
        console.log($scope.manufacture.name);
        var data = {"name":$scope.manufacture.name};
        console.log(data);
        
        
        
        $http({
            method: 'POST',
            url: url,
            //data: $.param($scope.employee),
            //data:"name:"+$scope.manufacture.name,
            data:data,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            //location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }


$scope.saveModel = function(modalstate,id){ 

var url = API_URL + "addModel";    
       


         var input = document.getElementById("photo-upload");
            

            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);

                reader.onload = function (e) {


                    $('#photo-id').attr('src', e.target.result);                    
                    var canvas = document.createElement("canvas");
                    var imageElement = document.createElement("img");

                    imageElement.setAttribute = $('<img>', { src: e.target.result });
                    var context = canvas.getContext("2d");
                    
                    var data64 = imageElement.setAttribute.on('load',(function()
                    {

                        //debugger;
                        canvas.width = this.width;
                        canvas.height = this.height;


                        context.drawImage(this, 0, 0);
                        var base64Image = canvas.toDataURL("image/png");

                        var data = base64Image.replace(/^data:image\/\w+;base64,/, "");
                                            

                        $scope.model.Logo = data;
                        return data;
                       
                    }));
                    var modeldata = {
                        "nameOfModel":$scope.model.name,
                        "manufactureId":$scope.model.manufacturer,
                        "imageBase64String": data64,
                        "nameOfImage":$scope.files[0].name,
                        "sizeOfImage":$scope.files[0].size,
                        "typeOfImage":$scope.files[0].type
                    };

                    $http({
                            method: 'POST',
                            url: url,
                            //data: $.param($scope.employee),
                            //data:"name:"+$scope.manufacture.name,
                            data:modeldata,
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        }).success(function(response) {
                            //console.log(response);
                            location.reload();
                        }).error(function(response) {
                            //console.log(response);
                            alert('This is embarassing. An error has occured. Please check the log for details');
                        });
                    
                }


    }







}


 $scope.uploadFile = function (input) {
    
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {

                    $('#photo-id').attr('src', e.target.result);                    
                    var canvas = document.createElement("canvas");
                    var imageElement = document.createElement("img");

                    imageElement.setAttribute = $('<img>', { src: e.target.result });
                    var context = canvas.getContext("2d");
                    imageElement.setAttribute.on('load',(function()
                    {
                        //debugger;
                        canvas.width = this.width;
                        canvas.height = this.height;


                        context.drawImage(this, 0, 0);
                        var base64Image = canvas.toDataURL("image/png");

                        var data = base64Image.replace(/^data:image\/\w+;base64,/, "");

                       

                        $scope.model.Logo = data;
                        $scope.base64=data;
                    }));



                }


            }
        }

        
});
