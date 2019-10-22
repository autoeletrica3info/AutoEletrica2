<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\atendimento;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $valores = collect();
        $datas = collect();
        $teste = collect();
        $ganhom = 0;
        $firstday = Carbon::now();
        $firstday->subDays(29);
        $solucionado = 0;
        $emandamento = 0;
        $emespera = 0;
        $ganhod = 0;
        $sum1 = 0;
        $dataAtual = Carbon::now();
        //cod para pegar o ganho mensal e as informações dos dois gráficos
        while($firstday->lessThan($dataAtual)){
            $valor = atendimento::whereDate('data', $firstday->format('Y-m-d'))->count();
            $ganhom = atendimento::whereDate('data', $firstday->format('Y-m-d'))->pluck('valor_total');
            $solucionado = $solucionado + atendimento::where('situacao', 1)->count();
            $emandamento = $emandamento + atendimento::where('situacao', 2)->count();
            $emespera = $emespera + atendimento::where('situacao', 3)->count();
            $valores->push($valor);
            foreach($ganhom as $key1=>$value1){
            $sum1+= $value1;
            }
            
            $firstday->addDay();
        }
        //abaixo do gráfico ta em gambiarras
        $sla = collect();
        $auxdia = Carbon::now()->format('d');
        $auxmes = Carbon::now()->format('M');
        
        for($ia = 0; $ia <=29; $ia++){
            if($auxmes == 'Mar' ||$auxmes == 'May'||$auxmes == 'Jul' ||$auxmes== 'Oct'||$auxmes=='Dec'){
                if($auxdia==0){
                    $auxdia = 30;
                    
                    $sla->push($auxdia);
                    $auxdia--;
                }else{
                    
                    $sla->push($auxdia);
                    $auxdia--;
                }
            }else{
            if($auxdia==0){
                $auxdia = 31;
                
                $sla->push($auxdia);
                $auxdia--;
            }else{
                
                $sla->push($auxdia);
                $auxdia--;
            }
        }
        }
          
        $sla = $sla->reverse();
        
        
        //auxiliar pra somar o numero de atendimentos mensais
        $aux1 = 0;
            foreach($valores as $key2=>$value2){
            $aux1+= $value2;
            }
            //se o nº de atendimentos for 0 ganho mensal é 0
        
        if($aux1 == 0){
            $sum1=0;
        }
        //
        //cálculo de  atendimento diario, funcionando;
        $a = atendimento::whereDate('data', Carbon::now()->format('Y-m-d'))->count(); 
        for($aux = 0;$aux<$a; $aux++){
            $ganhod = atendimento::whereDate('data', Carbon::now()->format('Y-m-d'))->pluck('valor_total');
            $sum = 0;
            foreach($ganhod as $key=>$value){
            $sum+= $value;
        }
        }
        if($a == 0){
            $sum = 0;
        }
        ///
            
        $solucionado = $solucionado/30;
        $emandamento = $emandamento/30;
        $emespera = $emespera/30;
        return view('home',compact('valores','solucionado','emandamento','emespera','sum','sum1','sla'));
    }
}