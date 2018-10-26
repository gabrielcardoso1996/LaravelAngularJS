app.controller('companyController', function ($scope, $http) {

    $scope.search = function () {
        $http.get("http://127.0.0.1/api/company", {
            params: {
                title: $scope.company
            }
        }).success(function (response) {
                $scope.company = response;
            });
    };

    // Exibe o formulário em um modal
    $scope.toggle = function () {       
        $('#myModal').modal('show');       
    }
    
    $scope.save = function () {
        var url = "http://127.0.0.1/api/company/inserir";
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.contato),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            location.reload();
        }).error(function (response) {
            console.log(response);
            alert('Erro. Verifique os logs no console.');
        });
    }

});