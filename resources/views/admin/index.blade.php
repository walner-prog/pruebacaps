{{-- @extends('layouts.app') --}}

<section>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
         <!-- Agrega esto en la sección head de tu HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-TCJ6FYD6dMj4wsiWZz6swnVMqB5RW2MaebusGM1h8zE3DlX5C4sG5ndooMU2t7pLzYl5GmMKa9oB/njpy5Ul9w==" crossorigin="anonymous" />

      <!-- Otros elementos del encabezado... -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
 
    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-gradient-info text-white">
            <div class="card-header">
                <h1> <i class="fas fa-home mr-4"></i>PANEL ADMINISTRATIVO</h1>
                 
            </div>
           
         </div> 
        <div class="card-header ">
                       <h3> <i class="fas fa-tools mr-4"></i>Seccion principal</h3> <br>
                        <p>Bienvenido al panel administrativo, {{ Auth::user()->name }}.</p>
        </div>
           <!-- <div class="row">
                  <div class="col-md-6">
                    <div class="card-header bg-gradient-dark opacity-50 " style="max-width: 400px">
                        
                        <ul class=" embed-responsive ">
                            <li class="graficas"><a class=" text-white-50"  href="#graficas">Graficas de estadisticas de registros. </a></li>
                             <li class="graficas"><a class=" text-white-50"  href="#estadisticas">Listado estadisticas generales de usuarios </a></li>
                             <li class="graficas"><a class=" text-white-50"  href="#informes">Informes financieros </a></li>
                             <li class="graficas"><a class=" text-white-50"  href="#alertas">Alertas de consumo </a></li>
                             <li class="graficas"><a class=" text-white-50"  href="#lecturas"> Informes de lecturas </a></li>
                        </ul>
            
                    </div>
                  </div>
                  <div class="col-md-6 ">
                    <div class="card-header bg-dark opacity-50 border-info border-width-2" hidden="true" style="max-width: 400px">
                        
                        <ul class=" embed-responsive">
                            <li class="graficas"><a class=" text-info"  href="#graficas">Graficas de estadisticas generales </a></li>
                             <li class="graficas"><a class=" text-info"  href="#graficas">Graficas de estadisticas generales </a></li>
                             <li class="graficas"><a class=" text-info"  href="#graficas">Graficas de estadisticas generales </a></li>
                             <li class="graficas"><a class=" text-info"  href="#graficas">Graficas de estadisticas generales </a></li>
                             <li class="graficas"><a class=" text-info"  href="#graficas">Graficas de estadisticas generales </a></li>
                        </ul>
            
                    </div>
                  </div>
           </div>-->

        
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">

                <div class="row">
                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-success ">
                            <div class="card-blok  pr-2">
                                <h5 class=" text-left pl-2">Usuarios</h5>
                              
                                @php
                                     use App\Models\User;
                                     $cantidad = User::count();
                                @endphp
                                <h2 class=" text pl-2"><i class=" fas fa-users fa-align-left"></i>
                                    <span class=" text-right float-right">{{ $cantidad }}</span>
                               </h2>
                               @can('ver-usuario')
                                <p class="m-b-0 text-right"><a href="/usuarios" class=" text-white">Ver mas</a></p>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-indigo ">
                            <div class="card-blok pr-2">
                                <h5 class=" text-left pl-2">Roles</h5>
                                @php
                                 use Spatie\Permission\Models\Role;
                                 $cantidad_roles = Role::count();
                                 @endphp
                                <h2 class="pl-2"><i class=" fas fa-users fa-align-left"></i>
                                <span class=" text-right float-right">{{ $cantidad_roles }}</span></h2>
                                @can('ver-rol')
                                <p class="m-b-0 text-right"><a href="/roles" class=" text-white">Ver mas</a></p>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-warning ">
                            <div class="card-blok pr-2 text-white">
                                <h5 class=" text-left pl-2">Registros</h5>
                                @php
                                use App\Models\RegistroAgua;
                                $cantidad_blogs = RegistroAgua::count();
                                 @endphp
                                <h2 class=" pl-2"><i class=" fas fa-users fa-align-left"></i>
                                <span class=" text-right float-right">{{  $cantidad_blogs}}</span></h2>
                                @can('ver-registro-agua')
                                <p class="m-b-0 text-right"><a href="/registro-agua" class=" text-white">Ver mas</a></p>
                                 @endcan
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-dark ">
                            <div class="card-blok pr-2 text-white">
                                <h5 class=" text-left pl-2">Lecturas</h5>
                                @php
                                use App\Models\LecturaMedidor;
                                $cantidad_blogs = LecturaMedidor::count();
                                 @endphp
                                <h2 class=" pl-2"><i class=" fas fa-users fa-align-left"></i>
                                <span class=" text-right float-right">{{  $cantidad_blogs}}</span></h2>
                                @can('ver-lectura')
                                <p class="m-b-0 text-right"><a href="/lecturas" class=" text-white">Ver mas</a></p>
                                 @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-purple ">
                            <div class="card-blok pr-2 text-white">
                                <h5 class=" text-left pl-2">Informes Financieros</h5>
                                @php
                                use App\Models\Ingreso;
                                $cantidad_blogs = Ingreso::count();
                                 @endphp
                                <h2 class=" pl-2"><i class=" fas fa-users fa-align-left"></i>
                                <span class=" text-right float-right">{{  $cantidad_blogs}}</span></h2>
                                @can('ver-ingresoygasto')
                                <p class="m-b-0 text-right"><a href="/ingresos-gastos" class=" text-white">Ver mas</a></p>
                                  @endcan
                            </div>
                        </div>
                    </div>

                    

                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-gradient-orange ">
                            <div class="card-blok pr-2 text-white">
                                <h5 class=" text-left pl-2">Configuraciones</h5>
                                @php
                                use App\Models\AlertasAutomaticas;
                                $cantidad_blogs = AlertasAutomaticas::count();
                                 @endphp
                                <h2 class=" pl-2"><i class=" fas fa-users fa-align-left"></i>
                                <span class=" text-right float-right">{{  $cantidad_blogs}}</span></h2>
                                @can('ver-alerta')
                                <p class="m-b-0 text-right"><a href="/alertas" class=" text-white">Ver mas</a></p>
                                 @endcan
                            </div>
                        </div>
                    </div>
                </div>
                
                

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Estadisticas</h1>
                     </div>
                    <div class="row">
                           
                            
                        <div class="col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInLeft">
                            <div class="card shadow h-100">
                               <div class="card-body border-primary" style="border-left-style: solid">
                                  <div class="row no-gutters align-items-center">
                                     <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                           Total de Registros de Agua:
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-gray-500">
                                           {{ count($registrosAgua) }}
                                        </div>
                                     </div>
                                     <div class="col-auto">
                                        <i class="fas fa-chart-bar fa-2x text-gray-300 text-gray"></i>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                             <style>
                                /* Agrega esto en tu archivo de estilos CSS */
                                .animate__fadeInLeft {
                                    animation-duration: 1s;
                                       }

                             </style>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 ">
                                <div class="card-body border-success"  style="border-left-style: solid" >
                                    <div class="row no-gutters align-items-center ">
                                        <div class="col mr-2" >
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Promedio de Consumo de Agua::</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 ">
                                <div class="card-body border-info " style="border-left-style: solid" >
                                    <div class="row no-gutters align-items-center ">
                                        <div class="col mr-2" >
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Mes con Mayor Consumo::</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $registrosAgua->max('Mes') }} ({{ $registrosAgua->max('ConsumoM3') }} M3)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sort-numeric-up-alt  fa-2x text-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 ">
                                <div class="card-body border-warning " style="border-left-style: solid">
                                    <div class="row no-gutters align-items-center ">
                                        <div class="col mr-2" >
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Mes con Menor Consumo:</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-400">{{ $registrosAgua->min('Mes') }} ({{ $registrosAgua->min('ConsumoM3') }} M3)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-minus fa-2x text-gray"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                </div>
 

                 

                   <div class="row">
                    <div class=" col-md-6 col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> Alertas de Consumo
                                </h6>
                            </div>
                         
                             <div class="card-body ">
                                @foreach($registrosAgua as $registroAgua)
                                @if($registroAgua->ConsumoM3 > 30)
                                <div class="px-3 py-5 bg-gradient-danger text-white mt-2"><strong>Alerta:</strong> Consumo elevado en {{ $registroAgua->Mes }} ({{ $registroAgua->ConsumoM3 }} M3)</div>
                                @endif
                                @endforeach
                                
                            </div>
                        </div>
                     </div>
              
                     <div class=" col-md-6 col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> Alertas de Consumo
                                </h6>
                            </div>
                         
                             <div class="card-body ">
                                @foreach($registrosAgua as $registroAgua)
                                @if($registroAgua->ConsumoM3 > 30)
                                <div class="px-3 py-5 bg-gradient-success text-white mt-2"><strong>Alerta:</strong> Consumo elevado en {{ $registroAgua->Mes }} ({{ $registroAgua->ConsumoM3 }} M3)</div>
                                @endif
                                @endforeach
                                
                            </div>
                        </div>
                   </div>

                   <div class=" col-md-6 col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Alertas de Consumo
                            </h6>
                        </div>
                     
                         <div class="card-body ">
                            @foreach($registrosAgua as $registroAgua)
                            @if($registroAgua->ConsumoM3 > 30)
                            <div class="px-3 py-5 bg-gradient-maroon text-white mt-2"><strong>Alerta:</strong> Consumo elevado en {{ $registroAgua->Mes }} ({{ $registroAgua->ConsumoM3 }} M3)</div>
                            @endif
                            @endforeach
                            
                        </div>
                    </div>
                 </div>
          
                </div>

                           {{-- circulo --}}
                           <div class="row">
                             <div class=" col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInLeft">
                                <div class="card border-left-primary shadow h-100 rounded-circle">
                                   <div class="card-body border-purple rounded-circle" style="border-left-style: solid">
                                      <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-purple text-uppercase mb-1">
                                               Promedio de Consumo de Agua:
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-purple">
                                               {{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3
                                            </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray"></i>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                              </div>

                              <div class="col-lg-4 col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInLeft">
                                <div class="card border-left-primary shadow h-100 rounded-circle">
                                   <div class="card-body border-blue rounded-circle" style="border-left-style: solid">
                                      <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">
                                               Promedio de Consumo de Agua:
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-blue">
                                               {{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3
                                            </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray"></i>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                              </div>
                                   
                              <div class="col-lg-4 col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInLeft">
                                <div class="card border-left-primary shadow h-100 rounded-circle">
                                   <div class="card-body border-maroon rounded-circle" style="border-left-style: solid">
                                      <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-maroon text-uppercase mb-1">
                                               Promedio de Consumo de Agua:
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-maroon">
                                               {{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3
                                            </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray"></i>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                              </div>

                              <div class="col-lg-4 col-xl-3 col-md-6 mb-4 animate__animated animate__fadeInLeft">
                                <div class="card border-left-primary shadow h-100 rounded-circle">
                                   <div class="card-body border-success rounded-circle" style="border-left-style: solid">
                                      <div class="row no-gutters align-items-center">
                                         <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               Promedio de Consumo de Agua:
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                               {{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3
                                            </div>
                                         </div>
                                         <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray"></i>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                              </div>


                           </div>

                           
                         
                         
                        {{-- circulo --}}

                        

                <div class="card w-auto" id="alertas">
                    <div class="card-body">
                        <h3>Alertas de Consumo</h3>
                        <ul>
                            @foreach($registrosAgua as $registroAgua)
                                @if($registroAgua->ConsumoM3 > 30)
                                    <li><strong>Alerta:</strong> Consumo elevado en {{ $registroAgua->Mes }} ({{ $registroAgua->ConsumoM3 }} M3)</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                  

                <div class="card w-auto" id="estadisticas">
                    <h3>Estadísticas Generales</h3>
                    <div class="card-body">
                       <div class="row">
                          <div class="col-md-4">
                              <ul>
                                <li>Total de Registros de Agua: {{ count($registrosAgua) }}</li>
                                <li>Promedio de Consumo de Agua: {{ number_format($registrosAgua->avg('ConsumoM3'), 2) }} M3</li>
                                <li>Mes con Mayor Consumo: {{ $registrosAgua->max('Mes') }} ({{ $registrosAgua->max('ConsumoM3') }} M3)</li>
                                <li>Mes con Menor Consumo: {{ $registrosAgua->min('Mes') }} ({{ $registrosAgua->min('ConsumoM3') }} M3)</li>
                              </ul>
                          </div>
                      </div>
                        
                    </div>
                </div>

                   <!-- Pie Chart -->
                   <div class="row">

                                                   <!-- Project Card Example -->
                                                   <div class="card shadow mb-4 col-md-6">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="small font-weight-bold">Server Migration <span
                                                                class="float-right">20%</span></h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small font-weight-bold">Sales Tracking <span
                                                                class="float-right">40%</span></h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small font-weight-bold">Customer Database <span
                                                                class="float-right">60%</span></h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar" role="progressbar" style="width: 60%"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small font-weight-bold">Payout Details <span
                                                                class="float-right">80%</span></h4>
                                                        <div class="progress mb-4">
                                                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <h4 class="small font-weight-bold">Account Setup <span
                                                                class="float-right">Complete!</span></h4>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                        

                                                <div class="col-xl-4 col-lg-5 col-md-6">
                                                    <div class="card shadow mb-4">
                                                        <!-- Card Header - Dropdown -->
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                                            <div class="dropdown no-arrow">
                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                    aria-labelledby="dropdownMenuLink">
                                                                    <div class="dropdown-header">Dropdown Header:</div>
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Card Body -->
                                                        <div class="card-body">
                                                            <div class="chart-pie pt-4 pb-2">
                                                                <canvas id="myPieChart"></canvas>
                                                            </div>
                                                            <div class="mt-4 text-center small">
                                                                <span class="mr-2">
                                                                    <i class="fas fa-circle text-primary"></i> Direct
                                                                </span>
                                                                <span class="mr-2">
                                                                    <i class="fas fa-circle text-success"></i> Social
                                                                </span>
                                                                <span class="mr-2">
                                                                    <i class="fas fa-circle text-info"></i> Referral
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                   </div>
                  
                   
            </div>
        </div>
    @stop
    
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @stop
    
    @section('js')
    
        <script> console.log('Hi!'); </script>
    @stop
    </section>