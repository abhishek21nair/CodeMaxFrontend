var app = angular.module('car', [])
        .constant('API_URL', 'http://www.codemaxb.raigadkabaddi.in/api/v1/')        
        .directive('fileInput', ['$parse', function($parse) {
            return {
                restrict: 'A',
                link: function(scope, elm, attrs,https,http) {
                        elm.bind('change', function() {
                            $parse(attrs.fileInput)
                            .assign(scope, elm[0].files)
                            scope.$apply()
                        });
                }
            }
        }

        ]);

        

function loadManufacturer() {
    $.ajax({
        'url':'http://www.codemaxb.raigadkabaddi.in/api/v1/manufactures',
        method: "GET",
        success: function(data) {            
            var manufacturer = "<option>Select Manufacturer</option>";
            console.log(data.length);
            console.log(data);
            for(i=0; i < data.length; i++) {
                manufacturer += "<option value='"+data[i].id+"'>"+ data[i].name +"</option>";
            }
            $('#select-manufacturer').html(manufacturer);
        }
    });
}



function loadInventories() {
    if ($.fn.DataTable.isDataTable("#inventory-table")) {
        $('#inventory-table').DataTable().clear().destroy();
    }

    $('#inventory-table').DataTable( {
        "ajax": {
                    "url" : "http://www.codemaxb.raigadkabaddi.in/api/v1/showmodels",
                    dataSrc : ''
                },
        rowId: 'id',
        "columns" : [ 
            {"data" : "id"}, 
            {"data" : "model_name"}, 
            {"data" : "manufacturer_name"}, 
            {"data" : "count"}
        ],
        "rowCallback": function( row, data ) {
        
        }
    } );    
}