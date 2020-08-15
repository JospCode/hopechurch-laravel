@extends('layouts.auths')

@section('content')
<section class="bannerlay">
    <div class="banner-layer">
        <div class="container">

            <div class="row justify-content-center">
                <div class="card col-md-6 cardlog">
                    <div class="card-header headcard">
                        <h3>Cadastre-se</h3>
                    </div>
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend inpgrpr">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmação de Senha">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn float-right logn_btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            <a href="{{ route('login') }}">Voltar</a>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>

    <!-- cep -->
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
      //Limpa valores do formulário de cep.
      document.getElementById('endereco').value=("");
      document.getElementById('bairro').value=("");
      document.getElementById('cidade').value=("");
      document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('endereco').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.localidade);
          document.getElementById('uf').value=(conteudo.uf);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
    }
        
    function pesquisacep(valor) {
      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

          //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('endereco').value="...";
          document.getElementById('bairro').value="...";
          document.getElementById('cidade').value="...";
          document.getElementById('uf').value="...";

          //Cria um elemento javascript.
          var script = document.createElement('script');

          //Sincroniza com o callback.
          script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

          //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);

        } //end if.
          else {
              //cep é inválido.
              limpa_formulário_cep();
              alert("Formato de CEP inválido.");
          }
      } //end if.
        else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
        }
    };

    </script>
    <!-- cep -->
</section>
@endsection
