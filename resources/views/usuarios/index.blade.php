@extends('layouts.app')

@section('content')
    <section class="section"> <a class="nav-link" href="/usuarios"></a>
        <div class="section-header">
            <h3 class="page__heading">Usuarios..</h3>
        </div>
        <div class="section-body"> <a class="nav-link" href="/usuarios"></a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body"> <!-- aca es el archivo base-->
                            <h3 class="text-center">Dashboard Content</h3>
                                  <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                           <table id="show_all_usuarios" class="table table-striped mt-2"> <!--Creacion de la tabla-->
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Rol</th>
                                  <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario) <!-- Recorrer los usuarios-->
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td> <!-- Traer nonbre y correos-->
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames())) <!-- Ir a buscar los roles-->
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                      @endif
                                    </td>

                                    <td>   <!-- Boton de editar-->
                                      <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>  <!-- Boton de editar-->

                                      <!-- html Collective-->
                                      <!-- ejecuta un submit para eliminar -->
                                      {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>


                        </div> <!-- aca termina la plantilla-->
                    </div>
                </div>
            </div>
        </div>



    </section>
    <script>

        $(document).ready(function() {
            $('#show_all_usuarios').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
            });
        } );
        </script>
@endsection
