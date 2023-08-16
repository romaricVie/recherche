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
           </nav>
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
             
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Ajouter electeur</h5>
                  </div>

                  <form 

                  class="row g-3 needs-validation" 
                  novalidate
                  method="POST" 
                  action="{{route('store.electeur')}}" 
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
                         >
                         @error('numelecteur')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="invalid-feedback">Entrer le numero electeur nom svp!</div>
                  </div>


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
                          name="prenoms"                   
                          class="form-control @error('prenoms') is-invalid @enderror" 
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
                      <label for="tetepont" class="form-label">Tete de pont</label>
                      <input 
                            type="text" 
                            name="tetepont" 
                            class="form-control @error('tetepont') is-invalid @enderror" 
                            id="tetepont" 
                            placeholder="Entrer la tete de pont" 
                            >

                       @error('tetepont')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer la tete de pont!</div>
                    </div>

                      <div class="col-12">
                        <label for="lieuvote" class="form-label">Lieu de votre <span class="text-danger"> *</span></label>


                         <select
                               class="form-select form-select-sm @error('lieuvote') is-invalid @enderror" 
                               name="lieuvote"  
                               id="lieuvote" 
                               aria-label=".form-select-sm example"
                               
                                 >

                               <option value="">Lieu de vote</option>
                               @foreach($lieuvotes as $lieuvote)
                                  <option value="{{$lieuvote->nom}}">{{$lieuvote->nom}}</option>
                                @endforeach
                              
                            </select>
                   </div>
                      <div class="col-12">
                      <label for="bureauvote" class="form-label">Bureau de vote</label>
                      <input 
                            type="text" 
                            name="bureauvote" 
                            class="form-control @error('bureauvote') is-invalid @enderror" 
                            id="bureauvote" 
                            placeholder="Entrer la tete de pont" 
                            >

                       @error('bureauvote')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer le BV!</div>
                    </div>

                      <div class="col-12">
                      <label for="code" class="form-label">Code</label>
                      <input 
                            type="text" 
                            name="code" 
                            class="form-control @error('code') is-invalid @enderror" 
                            id="code" 
                            placeholder="Code electeur" 
                            >

                       @error('code')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Entrer code electeur!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Ajouter</button>
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