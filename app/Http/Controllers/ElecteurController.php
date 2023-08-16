<?php

namespace App\Http\Controllers;

use App\Models\Electeur;
use App\Models\Lieuvote;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class ElecteurController extends Controller
{
    //

   
    public function index():View
    {
        return view('index');
    }
   

    public function create():View
    {
        $lieuvotes = Lieuvote::all();

        return view('create',[
                   
                   'lieuvotes' => $lieuvotes

          ]);
    }
   

     
    public function store(Request $request):RedirectResponse
    {
        //
        
       //dd($request->all());
         $validated = $request->validate([
                
                        'numelecteur' => ['string','nullable'],
                        'nom' => ['required', 'string'],
                        'prenoms' => ['required', 'string'],
                        'date' =>  ['required', 'string'],
                        'lieuvote' => ['string','nullable'],
                        'tetepont' => ['string','nullable'],
                        'bureauvote' => ['string','nullable'],
                        'code' =>  ['required', 'string'],

                    ]);
 
                  if($validated){

                    Electeur::create([

                            "numelecteur" => $validated["numelecteur"],
                            "nom" => $validated["nom"],
                            "prenoms" => $validated["prenoms"],
                            "date" => $validated["date"],
                            "lieuvote" => $validated["lieuvote"],
                            "tetepont" => $validated["tetepont"],
                            "bureauvote" => $validated["bureauvote"],
                            "code" => $validated["code"],


                     ]);

                  }


          session()->flash('success', 'Electeur enregistré avec succès!');
          return redirect()->back();
    }

    public function search(Request $request)
    {
        //dd(Request()->all()); recherche

        //ur = Electeur::where('code',$request->code)->get();
        $electeur = Electeur::where('code',$request->code)->first();
        
         return view('resultat',[
                             "electeur" => $electeur
                   ]);
    }

    public function numelecteur(Request $request)
    {
      //    dd(Request()->all());

        //ur = Electeur::where('code',$request->code)->get();
        $electeurs = Electeur::where('numelecteur',$request->numelecteur)->get();
        // dd($electeurs);

           return view('show',[
                             "electeurs" => $electeurs
               ]);

    }

 

    public function update(Request $request, Electeur $electeur):RedirectResponse
    {
        //ur = Electeur::where('code',$request->code)->get();
       //dd(Auth()->user()->name);
       // dd($electeur);
       $electeur->update([

                        "etat" => "paye",
                        "admin_code" => auth()->user()->id,
                         ]);
         session()->flash('success', 'Operation effectuée avec succes!');
        return redirect()->route('index');
       
    }

   
    
     
    public function recherche(Request $request)
    {
          // dd(Request()->all());

        //ur = Electeur::where('code',$request->code)->get();
        $electeurs = Electeur::where('nom','like','%'.$request->nom.'%')
                              ->where('prenoms','like','%'.$request->prenoms.'%')
                              ->where('date','like','%'.$request->date.'%')   
                              ->get();

             return view('show',[
                             "electeurs" => $electeurs
                   ]);

    }

    public function present(Request $request, Electeur $electeur):RedirectResponse
    {
         //  dd($electeur);

        //ur = Electeur::where('code',$request->code)->get();
        $electeur->update([

                        "statut" => "present",
                        "tetepontdeclaree" => $request->tetepontdeclaree,

                         ]);
        
         session()->flash('success', 'Electeur present!');
         return redirect()->route('presence.index');
    }




}



