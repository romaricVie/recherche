@extends('template/master')
@section('content')

<section>
 
   <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

             
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                    <p class="text-center small">Entrez vos informations pour créer un compte</p>
                  </div>

                  <form class="row g-3 needs-validation" 
                  novalidate
                  method="POST" 
                  action="{{route('store')}}" 

                  >
                    @csrf

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nom utilisateur</label>
                      <input 
                           type="text" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="yourName" 
                           placeholder="Entrer votre nom" 
                           required
                           >
                           @error('name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Votre Email</label>
                      <input 
                          type="email"
                          name="email"
                          class="form-control @error('email') is-invalid @enderror" 
                          id="yourEmail" 
                          placeholder="Entrez votre email" 
                          required>

                           @error('email')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                   

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input 
                            type="password" 
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            id="yourPassword" 
                            placeholder="Entrer votre password" 
                            required>

                       @error('password')
                                  <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                   
                    <div class="col-12">
                      <button class="btn btn-danger w-100" type="submit">Créer compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Avez-vous un compte ? <a href="{{route('login')}}">Connxion</a></p>
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