@extends('layouts.template')
@section('title')
Settings | Online Store 
@endsection

@section ('content')

<br></br>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background-color:#2e4057;width:150%;height:110%;font-size:20px">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="color:white">Editar Informação da Conta</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="color:white">Endereços</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" style="color:white">Encomendas</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent" style="position:relative;left:15%">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h1 style="color:black">Alterar Password</h1><a type="button" class="btn btn-dark" href = "http://homestead.test/projeto/customer/account/novapw.php" style="background-color:#2e4057">Alterar Palavra-Passe</a>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Endereço Definido</label>
                            <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <button type="button" class="btn btn-dark" style="background-color:#2e4057;position:relative;top:20%;"> Alterar Morada</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        Vai conter uma tabela com as encomendas do cliente
                    </div>
                </div>
            </div>
        </div>
        <br></br>
        @endsection