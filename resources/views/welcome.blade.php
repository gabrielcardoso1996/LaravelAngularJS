<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">   
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body ng-controller="companyController">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login')) 
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif                   

        <div role="form">
            <div class="box-body">                
                <input ng-model="company" id="consulta" class="form-control" type="text" placeholder="O que está procurando ?"/>
                <button class="btn btn-primary" ng-click="search()">Procurar</button>
            </div>
            <div class="container"> 
                <h2>Dados de Contatos</h2>
                <!-- Tabela-para-carregar-os-dados -->
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Contato</th>
                            <th>Posição</th>
                            @if (Route::has('login')) 
                                @auth
                                    <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar novo contato</button></th>
                                @endauth    
                            @endif 
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="estab in company">
                            <td><% estab.id %></td>
                            <td><% estab.title %></td>
                            <td><% estab.email %></td>
                            <td><% estab.phone %></td>
                            <td><% estab.city %></td>                            
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>
    
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel"><%form_title%></h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmCompany" class="form-horizontal" novalidate="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="title" name="title" placeholder="Title" value="<%title>%" 
                                        ng-model="contato.title" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmCompany.title.$invalid && frmCompany.title.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="<%phone%>" 
                                        ng-model="contato.phone" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmCompany.phone.$invalid && frmCompany.phone.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Adress</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="adress" name="adress" placeholder="Adress" value="<%adress%>"  
                                        ng-model="contato.adress" ng-required="true">    
                                    <span class="help-inline" 
                                        ng-show="frmCompany.adress.$invalid && frmCompany.adress.$touched">Obrigatório</span>
                                    </div>
                                </div>                                                         

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Zip-Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="cep" name="cep" placeholder="Zip-Code" value="<%cep%>" 
                                        ng-model="contato.cep" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmCompany.email.$invalid && frmCompany.email.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<%city%>" 
                                        ng-model="contato.city" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmCompany.city.$invalid && frmCompany.city.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="state" value="<%state%>" 
                                        ng-model="contato.state" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmCompany.state.$invalid && frmCompany.state.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="description" value="<%description%>" 
                                        ng-model="contato.description" ng-required="true"></textarea>
                                        <span class="help-inline" 
                                        ng-show="frmCompany.email.$invalid && frmCompany.email.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-9">
                                        <select name="category" class="form-control" id="category" ng-model="contato.category_id">
                                            <option value="1">Auto</option>
                                            <option value="2">Beauty and Fitness</option>
                                            <option value="3">Entertainment</option>
                                            <option value="4">Food and Dining</option>
                                            <option value="5">Health</option>
                                            <option value="6">Sports</option>
                                            <option value="7">Travel</option>
                                        </select>
                                        <span class="help-inline" 
                                        ng-show="frmCompany.category.$invalid && frmCompany.category.$touched">Obrigatório.</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save()">Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>    

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>       
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controller/company.js') ?>"></script>

    </body>
</html>
