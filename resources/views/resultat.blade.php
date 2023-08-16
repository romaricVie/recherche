@extends('template/master')
@section('content')

<main>
  <section>
    
  </section>
          
    <div class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <nav> 
              <a href="{{route('index')}}" class="btn btn-danger mb-3">Retour</a> 
        </nav>
          <div class="row justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
              @if($electeur)
                <div class="pt-4 pb-2">
                     <h5 class="card-title text-center pb-0 fs-4">Informations électeur</h5>
                     <span class="fw-bold">Nom :</span>{{$electeur->nom}}<br>
                     <span class="fw-bold">Prenoms :</span>{{$electeur->prenoms}}<br>
                     <span class="fw-bold">Date de naissance :</span>{{$electeur->date}}<br>
                     <span class="fw-bold">Etat:</span><span class="badge text-bg-<?= $electeur->etat== 'paye' ? 'success' : 'danger'?>">{{$electeur->etat}}</span><br>
                  </div>
                  
                  @if($electeur->etat==="non_paye")
                  <form 
                     class="row g-3" 
                     method="POST" 
                     action="{{route('update.electeur',$electeur)}}" 
                     novalidate 
                     >
                       @csrf
                       @method('PATCH')
                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit">Payer</button>
                    </div>
                  </form>
                  @endif
                </div>

                @else
                  <h5 class="card-title text-center pb-0 fs-4">Aucun electeur trouvé!</h5>
                 @endif
              </div>
          </div>
        </div>
    </div>
</main><!-- End #main -->
@endsection