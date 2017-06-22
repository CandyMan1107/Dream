{{-- Background Modal START --}}
<div class="modal fade" id="backgroundModal" tabindex="-1" role="dialog" aria-labelledby="backgroundModalLabel" aria-hidden="true">
    <div class="modal-dialog huge-size">
        <div class="modal-content huge-size">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="backgroundModalLabel"><i class="material-icons">remove_red_eye</i>&nbsp;<span>소설 배경</span></h4>
            </div>
            <div class="modal-body">
                    
                <div class="container-fluid">
                    <div class="row">
                        {{-- BACKGROUND ICON --}}
                        <div class="col-md-1 text-center">
                            {{-- Novel History --}}
                            <div data-toggle="collapse" href="#collapseHistory" aria-expanded="false" aria-controls="collapseHistory">
                                <h1><i class="fa fa-clock-o" aria-hidden="true"></i></h1>
                            </div>
                            {{-- Novel Character-Set --}}
                            <div data-toggle="collapse" href="#collapseCharacter" aria-expanded="false" aria-controls="collapseCharacter">
                                <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                            </div>
                            {{-- Novel Items --}}
                            <div data-toggle="collapse" href="#collapseItem" aria-expanded="false" aria-controls="collapseItem">
                                <h1><i class="fa fa-shopping-cart" aria-hidden="true"></i></h1>
                            </div>
                            {{-- Novel Relation --}}
                            <div data-toggle="collapse" href="#collapseRelation" aria-expanded="false" aria-controls="collapseRelation">
                                <h1><i class="fa fa-users" aria-hidden="true"></i></h1>
                            </div>
                            {{-- Novel Map --}}
                            <div data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">
                                <h1><i class="fa fa-map" aria-hidden="true"></i></h1>
                            </div>
                        </div>

                        {{-- HISTORY CONTEXT --}}
                        <div class="col-md-11 collapse in" id="collapseHistory">
                            History
                            {{-- @php
                            use App\Http\Controllers\NovelController;
                                
                            echo NovelController::backgroundCharacter($data);
                            @endphp --}}
                        </div>
                        {{-- CAHRACTER CONTEXT --}}
                        <div class="col-md-11 collapse" name="backgroundCollapse" id="collapseCharacter">
                            Character
                        </div>
                        {{-- ITEM CONTEXT --}}
                        <div class="col-md-11 collapse" id="collapseItem">
                            Item
                        </div>
                        {{-- RELATION CONTEXT --}}
                        <div class="col-md-11 collapse" id="collapseRelation">
                            Relation
                        </div>
                        {{-- MAP CONTEXT --}}
                        <div class="col-md-11 collapse" id="collapseMap">
                            Map
                        </div>
                    </div>
                </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        {{-- modal-content END --}}
    </div>
    {{-- modal-dialog END --}}
</div>
{{-- Background Modal END --}}