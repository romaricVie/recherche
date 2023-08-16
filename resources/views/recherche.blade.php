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
<main>
    <div class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <nav>
           <form 
               class="d-inline"
               method="POST"
               action="{{route('logout')}}" 
               
              >
                 @csrf
                <button class="btn btn-danger" type="submit">Deconnexion</button>
           </form>
           <a href="{{route('presence.index')}}" class="btn btn-primary">Liste de présence</a>
       </nav>

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Recherche électeur</h5>
                    <p class="text-center small">Entrer le code electeur</p>
                  </div>

                  <form 
                     class="row g-3 needs-validation" 
                     method="POST" 
                     action="{{route('search')}}" 
                     novalidate 
                     >
                      @csrf

                     <div class="col-12">
                      <label for="code" class="form-label">Code</label>
                      <input 
                             type="text"
                             name="code"
                             class="form-control" 
                             id="code"
                             placeholder="Entrer le code electeur" 
                             required>
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
</main><!-- End #main -->
@endsection