@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading text-center"><b>Inscrição para CURSO ENGLISH CONNECT</b></div>

                <div class="panel-body">
                    
                    {!! Form::open(['method'=>'POST', 'action'=>'SelfRelianceController@store', 'class'=>'form-horizontal']) !!}
                        
                    <div class="text-left">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="grupo" value="English Connect 1 e 2" required></td>
                                    <td><img src="{!! asset('assets/img/self/english1e2.png') !!}" ></td>
                                </tr>
                                <tr>
                                    <td colspan="2">    
                                            • Liderado por um Instrutor: Um membro local
                                            ou dupla missionária, aproximadamente 30
                                            minutos de preparação semanal <br>
                                            • 25 semanas <br>
                                            • Aulas semanais de 90 minutos <br>
                                            • 60 minutos de prática de Inglês <br>
                                            • 30 minutos para Meu Alicerce (1x em Português e 1x em Inglês) ou uma lição dos missionários <br>
                                            • Prática diária para ganhos reais de
                                            aprendizado (10 horas/semana) <br>
                                            • Acesso a internet e aplicativos é requisito <br>
                                            • Determinação de participação no nível 1 ou 2 <br>
                                            com base em entrevista oral conduzida pelo
                                            instrutor <br>
                                            • Solicitação dos manuais em <a href="http://store.lds.org" target="_blank">store.lds.org</a> ou
                                            download em <a href="http://englishconnect.lds.org" target="_blank">englishconnect.lds.org</a> 
                                    </td>
                                </tr>
                                <!--
                                <tr>
                                    <td><input type="radio" name="grupo" value="Educação para um Emprego Melhor" required></td>
                                    <td><img src="{!! asset('assets/img/self/english1e2.png') !!}" ></td>
                                    <td>Para aqueles que precisam de educação ou treinamento adicional para conseguir um emprego. 
                                        Os membros do grupo vão pesquisar, criar e apresentar planos educacionais e de carreira. 
                                        Eles também despenderão tempo todas as semanas praticando as habilidades que vão ajudá-los 
                                        a serem aprendizes mais eficazes. 
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="grupo" value="Encontrar um Emprego Melhor" required></td>
                                    <td><img src="{!! asset('assets/img/self/emprego.png') !!}" ></td>
                                    <td>Para aqueles que estão buscando trabalho ou um emprego melhor. 
                                        Os membros do grupo vão aprender a identificar oportunidades, criar rede de contatos, 
                                        a se apresentarem profissionalmente e preparar-se para entrevistas de emprego. 
                                        Eles também estabelecerão metas para contatos e entrevistas.
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="grupo" value="Finanças Pessoais" required></td>
                                    <td><img src="{!! asset('assets/img/self/financas.png') !!}" ></td>
                                    <td>Para aqueles que querem controlar melhor suas finanças. Os membros do grupo vão aprender como 
                                        eliminar as dívidas, proteger-se contra dificuldades financeiras e investir no futuro. 
                                        Eles vão criar um plano financeiro e seguir um orçamento. Os cônjuges são incentivados a frequentar juntos. 
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="grupo" value="Iniciar e Melhorar Meu Negócio" required></td>
                                    <td><img src="{!! asset('assets/img/self/negocio.png') !!}" ></td>
                                    <td>Este grupo de autossuficiência vai ajudá-lo a aprender a tomar decisões comerciais sábias 
                                        ao iniciar e melhorar um negócio próprio. O objetivo do grupo não é somente ajudá-lo em seu negócio; 
                                        mas também ajudá-lo a agir com mais obediência e fé no Senhor e receber as bênçãos de autossuficiência 
                                        material e espiritual que Ele prometeu. Os membros aprendem habilidades importantes, 
                                        assuntos como: identificar as necessidades do cliente, encontrar clientes e a manutenção de registros 
                                        de bons negócios. 
                                    </td>
                                </tr>
                            -->
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a href="{{route('self-reliances.index')}}" class="btn btn-default btn-xs">
                            <i class="fas fa-angle-left"></i> voltar
                        </a>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Realizar Inscrição', ['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


