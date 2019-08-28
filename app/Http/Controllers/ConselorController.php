<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConselorCalendar;
use App\Models\ConselorMeeting;
use Illuminate\Support\Facades\DB;
use App\Models\File;

class ConselorController extends Controller {

    public function index() {
        return view('conselor.index');
    }

    //inicio calendario
    public function calendarIndex() {

        //pega data por extenso em portugues
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        //dd(strftime("%A, %d de %B de %Y", strtotime($data)));
        //dd(strtoupper(strftime("%B de %Y", strtotime($data))));

        $eventos = ConselorCalendar::all()->where('ativo', '1')->sortBy('date');

        return view('conselor.calendars.index', compact('eventos'));
    }

    public function calendarCreate() {
        return view('conselor.calendars.create');
    }

    public function calendarStore(Request $request) {

        $calendar = new ConselorCalendar();

        $calendar->org = $request->org;
        $calendar->evento = $request->evento;
        $calendar->date = $request->date;
        $calendar->horario = $request->horario;
        $calendar->local = $request->local;
        $calendar->obs = $request->obs;

        $calendar->save();

        return redirect()->route('conselor.calendars.index')->with('alertSuccess', 'Evento cadastrado com sucesso!');
    }

    public function calendarEdit($id) {
        $calendar = ConselorCalendar::find($id);
        return view('conselor.calendars.update', compact('calendar'));
    }

    public function calendarUpdate(Request $request, $id) {

        $calendar = ConselorCalendar::find($id);

        $calendar->org = $request->org;
        $calendar->evento = $request->evento;
        $calendar->date = $request->date;
        $calendar->horario = $request->horario;
        $calendar->local = $request->local;
        $calendar->obs = $request->obs;

        $calendar->update();

        return redirect()->route('conselor.calendars.index')->with('alertSuccess', 'Evento atualizado com sucesso!');
    }

    public function calendarDestroy($id) {
        $calendar = ConselorCalendar::find($id);

        $calendar->ativo = '0';
        $calendar->update();

        return redirect()->route('conselor.calendars.index')->with('alertDanger', 'Evento Excluído!');
    }

    //fim calendario
    //INICIO FILES
    public function fileIndex() {
        $arquivos = File::all()->sortByDesc('id');
        //$categories = \Illuminate\Support\Facades\Storage::getFacadeApplication();
        return view('conselor.files.index', compact('arquivos'));
    }

    public function fileStore(Request $request) {
        if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
        {
            $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
            $nome = $_FILES['arquivo']['name'];
            $descricao = $request->descricao;
            
            $extensao = strrchr($nome, '.');

            $extensao = strtolower($extensao);

            if(strstr('.jpg;.jpeg;.gif;.png;.pdf;.doc;.docx;.ppt;.pptx;.xml;.xls;.xlsx;.txt;', $extensao))
            {		 
                //$destino = '/storage/categories/' . $nome;
                // Faz o upload:
                $upload = $request->arquivo->storeAs('categories', $nome);
                DB::table('files')->insert([
                    [   
                        'arquivo' => $request->arquivo,
                        'nome' => $nome,
                        'descricao' => $descricao,
                        'destino' => $upload
                    ]
                ]);

                //$query ="INSERT INTO arquivos VALUES('null','$nome','$destino', '$descricao')";
                //$inserir = mysqli_query($link, $query);
                        
                if( @move_uploaded_file( $arquivo_tmp, $arquivo  ))
                {
                    echo "<script>alert('Arquivo salvo com sucesso');window.location.href='novoArquivo.php';</script>";
                }
                else
                    echo "Erro ao salvar o arquivo. O arquivo pode não estar no formato permitido.";
            }
            else
                echo "Erro. O formato deste arquivo não é permitido.";
        }
        else
        {
            echo "Você não enviou nenhum arquivo!";
        }
    }

    // FIM FILES

    public function leaderIndex() {
        return view('conselor.leaders.index');
    }

    //
    public function stakeIndex() {
        return view('conselor.stakes.index');
    }

    // INÍCIO AGENDAS
    public function meetingIndex() {
        $agendas = ConselorMeeting::all();
        return view('conselor.meetings.index', compact('agendas'));
    }

    public function meetingCreate() {
        return view('conselor.meetings.create');
    }

    public function meetingStore(Request $request) {

        $agenda = new ConselorMeeting();

        $agenda->data = $request->data;
        $agenda->reuniao = $request->reuniao;
        $agenda->presidindo = $request->presidindo;

        $agenda->participante1 = $request->participante1;
        $agenda->participante2 = $request->participante2;
        $agenda->participante3 = $request->participante3;
        $agenda->participante4 = $request->participante4;
        $agenda->participante5 = $request->participante5;
        $agenda->participante6 = $request->participante6;
        $agenda->participante7 = $request->participante7;
        $agenda->participante8 = $request->participante8;
        $agenda->participante9 = $request->participante9;
        $agenda->participante10 = $request->participante10;
        $agenda->participante11 = $request->participante11;
        $agenda->participante12 = $request->participante12;
        $agenda->participante13 = $request->participante13;
        $agenda->participante14 = $request->participante14;
        $agenda->participante15 = $request->participante15;
        $agenda->participante16 = $request->participante16;
        $agenda->participante17 = $request->participante17;
        $agenda->participante18 = $request->participante18;
        $agenda->participante19 = $request->participante19;
        $agenda->participante20 = $request->participante20;

        $agenda->chamado1 = $request->chamado1;
        $agenda->chamado2 = $request->chamado2;
        $agenda->chamado3 = $request->chamado3;
        $agenda->chamado4 = $request->chamado4;
        $agenda->chamado5 = $request->chamado5;
        $agenda->chamado6 = $request->chamado6;
        $agenda->chamado7 = $request->chamado7;
        $agenda->chamado8 = $request->chamado8;
        $agenda->chamado9 = $request->chamado9;
        $agenda->chamado10 = $request->chamado10;
        $agenda->chamado11 = $request->chamado11;
        $agenda->chamado12 = $request->chamado12;
        $agenda->chamado13 = $request->chamado13;
        $agenda->chamado14 = $request->chamado14;
        $agenda->chamado15 = $request->chamado15;
        $agenda->chamado16 = $request->chamado16;
        $agenda->chamado17 = $request->chamado17;
        $agenda->chamado18 = $request->chamado18;
        $agenda->chamado19 = $request->chamado19;
        $agenda->chamado20 = $request->chamado20;

        $agenda->participacao1 = $request->participacao1;
        $agenda->participacao2 = $request->participacao2;
        $agenda->participacao3 = $request->participacao3;
        $agenda->participacao4 = $request->participacao4;
        $agenda->participacao5 = $request->participacao5;
        $agenda->participacao6 = $request->participacao6;
        $agenda->participacao7 = $request->participacao7;
        $agenda->participacao8 = $request->participacao8;
        $agenda->participacao9 = $request->participacao9;
        $agenda->participacao10 = $request->participacao10;
        $agenda->participacao11 = $request->participacao11;
        $agenda->participacao12 = $request->participacao12;
        $agenda->participacao13 = $request->participacao13;
        $agenda->participacao14 = $request->participacao14;
        $agenda->participacao15 = $request->participacao15;
        $agenda->participacao16 = $request->participacao16;
        $agenda->participacao17 = $request->participacao17;
        $agenda->participacao18 = $request->participacao18;
        $agenda->participacao19 = $request->participacao19;
        $agenda->participacao20 = $request->participacao20;

        $agenda->ata = $request->ata;

        $agenda->save();

        return redirect()->route('conselor.meetings.index')->with('alertSuccess', 'Agenda salva com sucesso!');
    }

    public function meetingEdit($id) {
        $agenda = ConselorMeeting::find($id);
        //dd($agenda);
        return view('conselor.meetings.update', compact('agenda'));
    }

    public function meetingUpdate(Request $request, $id) {

        $agenda = ConselorMeeting::find($id);

        $agenda->data = $request->data;
        $agenda->reuniao = $request->reuniao;
        $agenda->presidindo = $request->presidindo;

        $agenda->participante1 = $request->participante1;
        $agenda->participante2 = $request->participante2;
        $agenda->participante3 = $request->participante3;
        $agenda->participante4 = $request->participante4;
        $agenda->participante5 = $request->participante5;
        $agenda->participante6 = $request->participante6;
        $agenda->participante7 = $request->participante7;
        $agenda->participante8 = $request->participante8;
        $agenda->participante9 = $request->participante9;
        $agenda->participante10 = $request->participante10;
        $agenda->participante11 = $request->participante11;
        $agenda->participante12 = $request->participante12;
        $agenda->participante13 = $request->participante13;
        $agenda->participante14 = $request->participante14;
        $agenda->participante15 = $request->participante15;
        $agenda->participante16 = $request->participante16;
        $agenda->participante17 = $request->participante17;
        $agenda->participante18 = $request->participante18;
        $agenda->participante19 = $request->participante19;
        $agenda->participante20 = $request->participante20;

        $agenda->chamado1 = $request->chamado1;
        $agenda->chamado2 = $request->chamado2;
        $agenda->chamado3 = $request->chamado3;
        $agenda->chamado4 = $request->chamado4;
        $agenda->chamado5 = $request->chamado5;
        $agenda->chamado6 = $request->chamado6;
        $agenda->chamado7 = $request->chamado7;
        $agenda->chamado8 = $request->chamado8;
        $agenda->chamado9 = $request->chamado9;
        $agenda->chamado10 = $request->chamado10;
        $agenda->chamado11 = $request->chamado11;
        $agenda->chamado12 = $request->chamado12;
        $agenda->chamado13 = $request->chamado13;
        $agenda->chamado14 = $request->chamado14;
        $agenda->chamado15 = $request->chamado15;
        $agenda->chamado16 = $request->chamado16;
        $agenda->chamado17 = $request->chamado17;
        $agenda->chamado18 = $request->chamado18;
        $agenda->chamado19 = $request->chamado19;
        $agenda->chamado20 = $request->chamado20;

        $agenda->participacao1 = $request->participacao1;
        $agenda->participacao2 = $request->participacao2;
        $agenda->participacao3 = $request->participacao3;
        $agenda->participacao4 = $request->participacao4;
        $agenda->participacao5 = $request->participacao5;
        $agenda->participacao6 = $request->participacao6;
        $agenda->participacao7 = $request->participacao7;
        $agenda->participacao8 = $request->participacao8;
        $agenda->participacao9 = $request->participacao9;
        $agenda->participacao10 = $request->participacao10;
        $agenda->participacao11 = $request->participacao11;
        $agenda->participacao12 = $request->participacao12;
        $agenda->participacao13 = $request->participacao13;
        $agenda->participacao14 = $request->participacao14;
        $agenda->participacao15 = $request->participacao15;
        $agenda->participacao16 = $request->participacao16;
        $agenda->participacao17 = $request->participacao17;
        $agenda->participacao18 = $request->participacao18;
        $agenda->participacao19 = $request->participacao19;
        $agenda->participacao20 = $request->participacao20;

        $agenda->ata = $request->ata;

        $agenda->update();

        return redirect()->route('conselor.meetings.index')->with('alertSuccess', 'Agenda atualizada com sucesso!');
    }

    public function meetingShow($id) {

        $agenda = ConselorMeeting::find($id);

        return view('conselor.meetings.show', compact('agenda'));
    }

    public function meetingDestroy($id) {
        ConselorMeeting::find($id)->delete();

        return redirect()->route('conselor.meetings.index')->with('alertDanger', 'Agenda excluída!');
    }

    // FIM AGENDA
}
