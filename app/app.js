var app = angular.module('car', [])
        .constant('API_URL', 'http://127.0.0.1:8000/api/v1/')        
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





// (function() {
// angular.module("SS.pages").directive("fileModel", fileModel);
//  /** @ngInject */

// })();

        

function loadManufacturer() {
    $.ajax({
        'url':'http://127.0.0.1:8000/api/v1/manufactures',
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

