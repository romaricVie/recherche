@extends('template/master')
@section('content')

<main class="container">
    <div class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

    <div class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
          <div class="row justify-content-center">
            <div class="">
              <div class="card mb-3">
                <div class="card-body">
                   <a href="{{route('presence.index')}}" class="btn btn-danger m-3">Retour</a> 
              @if($electeurs->count()>0)

                 <table class="table table-hover ">
                  <thead>
                    <tr>
                      
                      <th scope="col">Nom</th>
                      <th scope="col">Prenoms</th>
                      <th scope="col">Date</th>
                      <th scope="col">Num electeur</th>
                      <th scope="col">Lieu vote</th>
                      <th scope="col">BV</th>
                      <th scope="col">Tete pont</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($electeurs as $electeur)
                      <tr>
                        
                         <td>{{$electeur->nom ?? 'Non defini'}}</td>
                         <td>{{$electeur->prenoms ?? 'Non defini'}}</td>
                         <td>{{$electeur->date ?? 'Non defini'}}</td>
                         <td>{{$electeur->numelecteur ?? 'Non defini'}}</td>
                         <td>{{$electeur->lieuvote ?? 'Non defini'}}</td>
                         <td>{{$electeur->bureauvote ?? 'Non defini'}}</td>
                         <td>{{$electeur->tetepont ?? 'Non defini'}}</td>
                      </tr>
                     @endforeach
                  </tbody>
             </table>
            
            </div>
          </div>
            @if($electeur->statut==="absent")
                           <form 
                               class="row g-3" 
                               method="POST" 
                               action="{{route('update.present',$electeur)}}" 
                               novalidate 
                                >
                                   @csrf
                                   @method('PATCH')
                                 
                                <div class="col-12">
                                  <label for="prenoms" class="form-label">Tete de pont déclarée</label>
                                  <input 
                                      type="text"
                                      name="tetepontdeclaree"                   
                                      class="form-control @error('tetepontdeclaree') is-invalid @enderror" 
                                      id="prenoms" 
                                      placeholder="Entrez tete de pont déclarée" 

                                      >

                                       @error('tetepontdeclaree')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                      @enderror
                                  <div class="invalid-feedback">Entrer tete de pont déclarée!</div>
                                </div>
                                <div class="col-12">
                                     <button class="btn btn-success w-100" type="submit">Present</button>
                                </div>
                              </form>
                            @else
                             <h5 class="card-title text-center pb-0 fs-4">Electeur déjà présent!</h5>
                          @endif
                @else
                  <h5 class="card-title text-center pb-0 fs-4">Aucun Electeur trouvé!</h5>
                 @endif 
        </div>
    </div>
</main><!-- End #main -->
@endsection