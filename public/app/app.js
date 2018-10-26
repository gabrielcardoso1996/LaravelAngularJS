var app = angular.module('app', [])
        .constant('API_URL', 'http://127.0.0.1/api/company');
  
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});