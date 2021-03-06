<!DOCTYPE html>
<html lang="en-US" ng-app="car">
<head>
    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    <link rel="stylesheet" href="./css/jquery-ui.css">
    <link rel="stylesheet" href="./css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./jss/jq.js"></script>
    <script src="./jss/jquery-ui.js"></script>
    <script src="./jss/jquery.dataTables.min.js"></script>
    <script src="./jss/bootstrap.min.js"></script>


    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular.js">  </script>  
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-route.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

    <!-- AngularJS Application Scripts -->
    <script src="./app/app.js"></script>
    <script src="./app/controllers/manufactureController.js"></script>

    <title>CIS</title>
</head>
<body class="container">
    <div class="jumbotron text-center">
        <h2>Mini Car Inventory System<h2>
    </div>
    <div id="alerts" style="display:none;">
    </div>
    <div id="tabs" ng-controller="manufactureController">
        <ul>
            <li><a href="#manufacturer">Add Manufacturer</a></li>
            <li><a href="#model" onclick="loadManufacturer()">Add Model</a></li>
            <li><a href="#inventory" onclick="loadInventories()">View Inventory</a></li>
        </ul>
        <div id="inventory">
            <table id="inventory-table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Manufacturer Name</th>
                        <th>Model Name</th>
                        <th>Count</th>
                    </tr>
                </thead>
            </table>
            <!-- Trigger the modal with a button -->
            <button style="display:none;" id="model-button" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
        <div id="manufacturer">
            <form action="#">
                <div class="form-group">
                    
                    <form name="frmManufacture" class="form-horizontal" novalidate="">

                                 <div class="form-group error">
                                     <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                     <div class="col-sm-9">
                                         <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="{{name}}" 
                                         ng-model="manufacture.name" ng-required="true">
                                         <span class="help-inline" 
                                         ng-show="frmManufacture.name.$invalid && frmManufacture.name.$touched">Name field is required</span>
                                     </div>
                                 </div>                               
 
                             </form>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmManufacture.$invalid" style="margin: 10px">Save changes</button>
                         </div>
            </form>
        </div>
        <div id="model">
            <form id="model-form" name="frmModel">
                <div>                  


                <div class="form-group">
                        <label for="model-name">Model Name:</label>
                        <input type="text" class="form-control input-sm" id="model-name" name="model-name" placeholder="Model Name" value="{{model-name}}" ng-model="model.name" ng-required="true">
                        <span class="help-inline" 
                                        ng-show="frmModel.model-name.$invalid && frmModel.model-name.$touched">Model Name field is required</span>
                    <div>
                    <div class="form-group">
                        <label for="select-manufacturer">Select Manufacturer:</label>
                        <select class="form-control input-sm" id="select-manufacturer" name="model-manufacturer" ng-model="model.manufacturer">
                        </select>
                        <span class="help-inline" 
                                        ng-show="frmModel.model-manufacturer.$invalid && frmModel.model-manufacturer.$touched">Model Name field is required</span>
                    </div>
                <div>

                <!-- <div class="form-group">
                    <label for="model-color">Color:</label>
                    <input type="text" class="form-control input-sm" id="model-color">
                <div>
                <div class="form-group">
                    <label for="model-year">Manufacturing Year:</label>
                    <input type="text" class="form-control input-sm" id="model-year">
                <div>
                <div class="form-group">
                    <label for="model-reg-no">Registration Number:</label>
                    <input type="text" class="form-control input-sm" id="model-reg-no">
                <div>
                <div class="form-group">
                    <label for="model-note">Note:</label>
                    <input type="text" class="form-control input-sm" id="model-note">
                <div>
                <div class="form-group">
                    <label for="model-count">Count:</label>
                    <input type="number" class="form-control input-sm" id="model-count" min="0" value="0">
                <div>
                <div class="form-group">
                    <label for="image-1">Picture 1:</label>
                    <input type="file" name="image" id="image-1" required>
                </div> -->
                <div class="form-group">
                    <label for="image-2">Picture 1:</label>                    
                    <!-- <input type = "file"  name="model-image" ng-model="model.image" ng-required="true" id="inp_file"  file-input="files" multiple="multiple" /> -->


                    <!-- <button ng-click = "uploadFile()">upload me</button>  ng-click="saveModel(modalstate, id)"   -->
<!--  -->
                   
  
  <input type="file" name="file"  id="photo-upload" file-input="files" ng-model="model.image" onchange="angular.element(this).scope().uploadFile(this)"/>
  <img ng-src="data:image/png;base64,{{model.Logo}}" id="photo-id" style="margin: 10px" />




                    <span class="help-inline" 
                                        ng-show="frmModel.model-image.$invalid && frmModel.model-image.$touched">Model Name field is required</span>
                </div>


                
                <div class="form-group text-center">
                    <button type="button" class="btn btn-default" ng-click="saveModel()" ng-disabled="frmModel.$invalid">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    $( function() {
        $( "#tabs" ).tabs();
    } );
    
</script>
</html>