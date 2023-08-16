@extends('template/master')
@section('content')
<section>
     @if(session('success'))
                <script type="text/javascript">
                    swal("Félicitations!","{!! session('success') !!}","success",{
                        button:"OK"
                    })
               </script>
           @endif
</section>
<section>
 
   <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <nav> 
              <a href="{{route('index')}}" class="btn btn-danger">Retour</a> 
               <a href="{{route('create')}}" class="btn btn-primary">Ajouter electeur</a> 
           </nav>
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
             

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Recherche par numéro electeur</h5>
                  </div>

                  <form 

                      class="row g-3 needs-validation" 
                      novalidate
                      method="POST" 
                      action="{{route('numelecteur')}}" 

                  >
                    @csrf

                    <div class="col-12">
                      <label for="numelecteur" class="form-label">Numéro electeur</label>
                      <input 
                           type="text" 
                           name="numelecteur" 
                           class="form-control @error('numelecteur') is-invalid @enderror" 
                           id="numelecteur" 
                           placeholder="Entrer le numéro electeur" 
                           required
                           >
                           @error('numelecteur')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer le numero electeur svp!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Rechercher</button>
                    </div>
                  </form>

                </div>
              </div>

             
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Rechercher</h5>
                  </div>

                  <form class="row g-3 needs-validation" 
                  novalidate
                  method="POST" 
                  action="{{route('recherche')}}" 

                  >
                    @csrf

                    <div class="col-12">
                      <label for="nom" class="form-label">Nom</label>
                      <input 
                           type="text" 
                           name="nom" 
                           class="form-control @error('nom') is-invalid @enderror" 
                           id="nom" 
                           placeholder="Entrer votre nom" 
                           required
                           >
                           @error('nom')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer votre nom svp!</div>
                    </div>


                    <div class="col-12">
                      <label for="prenoms" class="form-label">Prénoms</label>
                      <input 
                          type="text"
                          name="prenoms"                         class="form-control @error('prenoms') is-invalid @enderror" 
                          id="prenoms" 
                          placeholder="Entrez votre prenoms" 
                          required>

                           @error('prenoms')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer prenoms!</div>
                    </div>

                    <div class="col-12">
                      <label for="date" class="form-label">Date de naissance</label>
                      <input 
                            type="text" 
                            name="date" 
                            class="form-control @error('date') is-invalid @enderror" 
                            id="date" 
                            placeholder="jj/mm/aaaa" 
                            required>

                       @error('date')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer date de naissance!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Rechercher</button>
                    </div>
                  </form>

                </div>
              </div>

              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


</section>
@endsection