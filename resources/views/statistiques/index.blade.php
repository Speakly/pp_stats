@extends('layouts.index')

@section('css')
@stop

@section('content')

	<!-- content -->                     
    <div class="row">
        <!-- main col left -->
        @include('layouts.game-nav')
        <div class="col-md-9">
            <div class="DataTables_Table_0_wrapper">
                <p class="text-center stats-title">Stats Saison actuelle</p>
                <table data-toggle="data-table" class="table dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        @include('statistiques.colonne')
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        @include('statistiques.colonne')
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($statistiques as $statsGame)
                        <tr>
                            <td>{{$statsGame->game->name_adverse}}</td>
                            <td>{{$statsGame->minutes}}</td>
                            <td>{{$statsGame->points}}</td>
                            <td>{{$statsGame->passe}}</td>
                            <td>{{$statsGame->trois_points}}</td>
                            <td>{{$statsGame->titulaire}}</td>
                            <td>{{$statsGame->lancer_franc}}</td>
                            <td>{{$statsGame->rebonds}}</td>
                            <td>{{$statsGame->interceptions}}</td>
                            <td>{{$statsGame->fautes}}</td>
                            <td>{{$statsGame->victoire}}</td>
                            <td>{{$statsGame->evaluation}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            



            <!-- Data table -->
            <div class="DataTables_Table_0_wrapper">
                <p class="text-center stats-title">Stats Saisons cumulés</p>
                <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            @include('statistiques.colonne')
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            @include('statistiques.colonne')
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>{{$games}}</td>
                            <td>{{$stats['minutes']}}</td>
                            <td>{{$stats['points']}}</td>
                            <td>{{$stats['passes']}}</td>
                            <td>{{$stats['trois_points']}}</td>
                            <td>{{$stats['titulaire']}}</td>
                            <td>{{$stats['lancer_franc']}}</td>
                            <td>{{$stats['rebonds']}}</td>
                            <td>{{$stats['interceptions']}}</td>
                            <td>{{$stats['fautes']}}</td>
                            <td>{{$stats['victoire']}}</td>
                            <td>{{$stats['evaluation']}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- // Data table -->
        </div>
    </div><!--/row-->

    

    


                      

    
@stop

@section('scripts')
    
    
@stop
